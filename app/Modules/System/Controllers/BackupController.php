<?php

namespace App\Modules\System\Controllers;

use App\Controllers\BaseController;
use App\Modules\System\Models\BackupModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\Exceptions\FileNotFoundException;
use Config\Services;

class BackupController extends BaseController
{
    public $viewPath = "Backup/";
    public function index()
    {
        $log_message = "{$this->session->name} access backup ";
        Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);

        $view = $this->viewPath . "v_index";
        $title = "Database Backup";

        $bm = new BackupModel();

        $list_backup = $bm->getBackup();


        $content = [
            'list_backup' => $list_backup,
        ];

        $js = [];
        _render($view, $title, $content, $js);
    }

    public function add()
    {
        $log_message = "{$this->session->name} trying backup ";
        Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);

        sleep(2);

        // Services::writeLog()
        $output = '';
        // turn on implicit flush
        ob_implicit_flush();
        // checking if the binary can be executed
        $lookupCommand = PHP_OS_FAMILY === 'Windows'
            ? 'where mysqldump 2>NUL'
            : 'command -v mysqldump 2>/dev/null';
        $mysql_dump_path = function_exists('shell_exec') ? shell_exec($lookupCommand) : null;
        $mysql_dump_path = trim((string) $mysql_dump_path);
        $mysql_dump_path = strtok($mysql_dump_path, "\\r\\n") ?: '';

        if ($mysql_dump_path === '' || !function_exists('exec')) {
            $log_message = 'Backup gagal: mysqldump tidak ditemukan atau fungsi exec/shell_exec dinonaktifkan oleh hosting.';
            slim_alert('error', $log_message);
            Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);
            return redirect()->to('sistem/backups');
        }

        $time2append = date("Ymd_His");

        $backupPath = WRITEPATH . 'backup';
        $fullPath = $backupPath . DS . "backup_{$time2append}.sql";

        $exist_dir = false;
        $writable_dir = false;
        // Cek apakah folder 'backup' ada
        if (!is_dir($backupPath)) {
            // Jika tidak ada, buat folder dengan izin akses bisa ditulis
            if (mkdir($backupPath, 0750, true)) {
                $exist_dir = true;
                $writable_dir = true;
            }
        } else {
            // Jika ada, cek apakah bisa ditulis
            if (!is_writable($backupPath)) {
                // Jangan mengubah permission produksi menjadi 0777.
                $exist_dir = true;
                $writable_dir = false;
            } else {
                $writable_dir = true;
                $exist_dir = true;
            }
        }

        if ($exist_dir === true &&  $writable_dir === true) {
            $db_host = $this->db->hostname;
            $db_name = $this->db->database;
            $db_user = $this->db->username;
            $db_password = $this->db->password;

            // Simpan kredensial sementara di luar webroot agar password tidak tampil di daftar proses.
            $credentialsFile = tempnam($backupPath, '.db-auth-');
            if ($credentialsFile === false) {
                $log_message = 'Backup gagal: tidak dapat membuat berkas kredensial sementara.';
                slim_alert('error', $log_message);
                Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);
                return redirect()->to('sistem/backups');
            }

            $escapeOption = static function ($value): string {
                $value = str_replace(["\\", "\"", "\r", "\n"], ["\\\\", "\\\"", '', ''], (string) $value);
                return '"' . $value . '"';
            };
            $clientConfig = "[client]\n"
                . 'user=' . $escapeOption($db_user) . "\n"
                . 'password=' . $escapeOption($db_password) . "\n"
                . 'host=' . $escapeOption($db_host) . "\n"
                . 'port=' . (int) $this->db->port . "\n";

            if (file_put_contents($credentialsFile, $clientConfig, LOCK_EX) === false || !chmod($credentialsFile, 0600)) {
                @unlink($credentialsFile);
                $log_message = 'Backup gagal: berkas kredensial sementara tidak dapat diamankan.';
                slim_alert('error', $log_message);
                Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);
                return redirect()->to('sistem/backups');
            }

            $command = escapeshellarg($mysql_dump_path)
                . ' --defaults-extra-file=' . escapeshellarg($credentialsFile)
                . ' --single-transaction --quick --databases ' . escapeshellarg((string) $db_name)
                . ' > ' . escapeshellarg($fullPath) . ' 2>&1';

            exec($command, $output, $status);
            @unlink($credentialsFile);

            if ($status === COMMAND_SUCCESS && is_file($fullPath) && filesize($fullPath) > 0) {

                $user_id = $this->session->user_id;
                $backup_time = date("Y-m-d H:i:s");

                $data = [
                    'user_id' => $user_id,
                    'backup_time' => $backup_time,
                    'backup_file' => $fullPath,
                ];

                $output = "Backup SUCCESSFUL, backup files saved to {$backupPath} !";

                if (!preg_match('@^WIN.*@i', PHP_OS)) {
                    // get current directory path
                    $curr_dir = getcwd();
                    // change current PHP working dir
                    @chdir($backupPath);
                    // compress the backup using tar gz

                    $archivePath = $backupPath . DS . "backup_{$time2append}.sql.tar.gz";
                    $command = 'tar -czf ' . escapeshellarg($archivePath)
                        . ' -C ' . escapeshellarg($backupPath)
                        . ' ' . escapeshellarg(basename($fullPath));

                    exec($command, $outputs, $status);
                    if ($status === COMMAND_SUCCESS && is_file($archivePath) && filesize($archivePath) > 0) {
                        @unlink($fullPath);
                        $output .= "File dikompresi dalam format tar.gz";
                        $fullPath = $archivePath;
                        $data['backup_file'] = $archivePath;
                    }
                    // return to previous PHP working dir
                    @chdir($curr_dir);
                }

                $b = new BackupModel();

                $this->db->transBegin();

                $b->insert($data);


                if ($this->db->transStatus() === false) {
                    $this->db->transRollback();
                    slim_alert('error', $this->db->error());
                    $log_message = "{$this->session->name} backup failed : {$this->db->error}";
                } else {
                    $this->db->transCommit();
                    slim_alert('success', "Backup database success, {$this->db->escapeString($output)}");
                    $log_message = "{$this->session->name} backup success}";
                }
            } else {
                if (is_file($fullPath)) {
                    @unlink($fullPath);
                }
                $log_message = 'Backup gagal: mysqldump mengembalikan status error atau berkas backup kosong. Periksa kredensial database dan log server.';
                slim_alert('error', $log_message);
            }
        } else {
            $log_message = "Backup FAILED! The Backup directory is not exists or not writeable";
            $log_message .= "Contact System Administrator for the right path of backup directory";

            slim_alert('error', $log_message);
        }

        Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);
        return redirect()->to('sistem/backups');
    }

    function download($id)
    {

        $backup = new BackupModel();

        $backupFile = $backup->find($id);

        if ($backupFile === null) {
            throw PageNotFoundException::forPageNotFound();
        } else {

            $filePath = $backupFile->backup_file;

            if (file_exists($filePath)) {

                $log_message = "Download backup file";
                Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);

                return $this->response->download($filePath, null);
            } else {

                $log_message = "Download backup file failed";
                Services::writeLog(getTypeUser($this->session->user_type), $this->session->user_id, 'Backup', $log_message);

                slim_alert('error', "File not found : {$filePath}");
                return redirect()->to('sistem/backups');
            }
        }
    }
}
