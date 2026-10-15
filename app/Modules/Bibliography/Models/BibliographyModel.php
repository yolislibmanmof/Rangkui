<?php

namespace App\Modules\Bibliography\Models;

use App\Models\BaseModel;
use PharIo\Manifest\Author;

class BibliographyModel extends BaseModel
{
    protected $protectFields = false;
    protected $table         = 'biblio';
    protected $primaryKey    = 'biblio_id';


    public function __construct()
    {
        parent::__construct();
    }

    public function insertBiblio(array $data)
    {
        $this->db->transBegin();
        try {
            $this->table('biblio')->insert($data);
            $lastId = $this->insertID();
            $this->db->transCommit();
            return $lastId;
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());
            return 0;
        }
    }
    public function updateBiblio(int $biblio_id, array $data)
    {
        $return = 0;
        $this->db->transBegin();
        try {
            $this->table('biblio')->update($biblio_id, $data);
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                $return = false;
            } else {
                $this->db->transCommit();
                $return = TRUE;
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());
            $return = false;
        }
        return $return;
    }
    public function insertBilioSub($biblio_id, array $postData, bool $fr = false)
    {
        $relations = [
            'author'      => ['biblio_author', 'author_id'],
            'contributor' => ['biblio_contributor', 'contributor_id'],
            'supervisor'  => ['biblio_supervisor', 'supervisor_id'],
            'examiner'    => ['biblio_examiner', 'examiner_id'],
            'topic'       => ['biblio_topic', 'topic_id'],
        ];

        $this->db->transBegin();

        try {
            if ($fr) {
                foreach ($relations as [$table, $idColumn]) {
                    $deleted = $this->db->table($table)->where('biblio_id', $biblio_id)->delete();
                    if ($deleted === false) {
                        throw new \\RuntimeException('Gagal menghapus relasi lama dari tabel ' . $table);
                    }
                }
            }

            foreach ($relations as $postKey => [$table, $idColumn]) {
                $ids = $postData[$postKey] ?? [];
                if (!is_array($ids)) {
                    $ids = ($ids === '' || $ids === null) ? [] : [$ids];
                }

                foreach (array_unique($ids, SORT_REGULAR) as $id) {
                    if ($id === '' || $id === null || !is_scalar($id)) {
                        continue;
                    }

                    $row = [
                        'biblio_id' => $biblio_id,
                        $idColumn   => $id,
                        'level'     => 1,
                    ];

                    $inserted = $this->db->table($table)->insert($row);
                    if ($inserted === false) {
                        throw new \\RuntimeException('Gagal menyimpan relasi ke tabel ' . $table);
                    }
                }
            }

            if ($this->db->transStatus() === false) {
                throw new \\RuntimeException('Transaksi penyimpanan relasi bibliografi gagal.');
            }

            $this->db->transCommit();
            return true;
        } catch (\\Throwable $e) {
            $this->db->transRollback();
            log_message('error', 'insertBilioSub gagal untuk biblio_id ' . $biblio_id . ': ' . $e->getMessage());
            return false;
        }
    }

    public function insertFiles(array $data)
    {
        $this->db->transBegin();
        $this->db->table('files')->insert($data);
        $lastId = $this->db->insertID();
        if ($this->db->transStatus() === true) {
            $this->db->transCommit();
            return $lastId;
        }
        return false;
    }
    public function insertBiblioFiles(array $data)
    {
        $this->db->transBegin();
        $this->db->table('biblio_attachment')->insert($data);

        if ($this->db->transStatus() === true) {
            $this->db->transCommit();
            return true;
        }
        $this->db->transRollback();
        return false;
    }
    public function attDelete($biblio_id, $file_id)
    {
        $this->db->transBegin();

        // Hapus dari tabel biblio_attachment
        $result1 = $this->db->table('biblio_attachment')->delete(['biblio_id' => $biblio_id, 'file_id' => $file_id]);

        $builder  = $this->db->table('files');
        $fileName = $builder->select('file_name')
            ->where('file_id', $file_id)
            ->get()
            ->getRow();
        // hapus file gambar
        $hapusImage = delImage('repository', $fileName->file_name);
        if ($hapusImage == 0 || $hapusImage == '-1') {
            log_message('error', 'File Not Exist');
        }
        // Hapus dari tabel files
        $result2 = $this->db->table('files')->delete(['file_id' => $file_id]);

        // Cek hasil dan commit atau rollback
        if ($result1 && $result2) {
            $this->db->transCommit();
            return true;
        } else {
            $this->db->transRollback();
            return false;
        }
    }
    public function getMstBio()
    {
        $resultAuthor      = $this->db->table('mst_author')->orderBy('author_id', 'ASC')->get()->getResult();
        $resultContributor = $this->db->table('mst_contributor')->orderBy('contributor_id', 'ASC')->get()->getResult();
        $resultSupervisor  = $this->db->table('mst_supervisor')->orderBy('supervisor_id', 'ASC')->get()->getResult();
        $resultLicense     = $this->db->table('mst_license')->orderBy('license_id', 'ASC')->get()->getResult();
        $resultExaminer    = $this->db->table('mst_examiner')->orderBy('examiner_id', 'ASC')->get()->getResult();
        $resultCopyright   = $this->db->table('mst_copyright')->orderBy('copyright_id', 'ASC')->get()->getResult();
        $resultPublisher   = $this->db->table('mst_publisher')->orderBy('publisher_id', 'ASC')->get()->getResult();
        $resultPlace       = $this->db->table('mst_place')->orderBy('place_id', 'ASC')->get()->getResult();
        $resultLanguage    = $this->db->table('mst_language')->orderBy('language_id', 'ASC')->get()->getResult();
        $resultMinistry    = $this->db->table('mst_code_ministry')->orderBy('code_ministry', 'ASC')->get()->getResult();
        $resultGmd         = $this->db->table('mst_gmd')->orderBy('gmd_id', 'ASC')->get()->getResult();
        $resultItem_type   = $this->db->table('mst_item_type')->orderBy('item_type_id', 'ASC')->get()->getResult();
        $resultTopic       = $this->db->table('mst_topic')->orderBy('topic_id', 'ASC')->get()->getResult();


        $data['mst_authors']     = $resultAuthor;
        $data['mst_supervisor']  = $resultSupervisor;
        $data['mst_license']     = $resultLicense;
        $data['mst_examiner']    = $resultExaminer;
        $data['mst_contributor'] = $resultContributor;
        $data['mst_copyright']   = $resultCopyright;
        $data['mst_publisher']   = $resultPublisher;
        $data['mst_place']       = $resultPlace;
        $data['mst_language']    = $resultLanguage;
        $data['mst_ministry']    = $resultMinistry;
        $data['mst_gmd']         = $resultGmd;
        $data['mst_item_type']   = $resultItem_type;
        $data['mst_topic']       = $resultTopic;

        return $data;
    }


    public function getData($biblio_id)
    {
        $sql = "SELECT
                    b.biblio_id,
                     IFNULL(JSON_ARRAYAGG(b.gmd_id),JSON_ARRAY()) AS gmd_id,
                     IFNULL(JSON_ARRAYAGG(b.item_type_id),JSON_ARRAY()) AS item_type_id,
                    b.title,
                     IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    ba.author_id
                            )
                        FROM 
                            biblio_author ba 
                        WHERE 
                            ba.biblio_id = b.biblio_id
                    ), JSON_ARRAY()) AS uthors,
                    b.student_id ,
                    b.cp_email,
                    IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    bs.supervisor_id
                            ) 
                        FROM
                            biblio_supervisor bs 
                        WHERE 
                            bs.biblio_id = b.biblio_id 
                    ), JSON_ARRAY()) AS supervisor,
                    IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    be.examiner_id
                            ) 
                        FROM
                            biblio_examiner be 
                        JOIN
                            mst_examiner me
                            ON be.examiner_id = me.examiner_id
                        WHERE 
                            be.biblio_id = b.biblio_id 
                    ), JSON_ARRAY()) AS examiner,
                    IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    bc.contributor_id
                            ) 
                        FROM
                            biblio_contributor bc 
                        WHERE 
                            bc.biblio_id = b.biblio_id 
                    ), JSON_ARRAY()) AS contributor,
                    IFNULL(JSON_ARRAYAGG(b.code_ministry), JSON_ARRAY()) AS code_ministry,
                    IFNULL(JSON_ARRAYAGG(b.edition), JSON_ARRAY()) AS edition,
                    b.spec_detail_info,
                    b.departement,
                    'legalization',
                    b.publisher_id,
                    b.publish_year,
                    IFNULL(JSON_ARRAYAGG(b.publish_place_id), JSON_ARRAY()) AS publish_place_id,
                    b.`collation` ,
                    IFNULL(JSON_ARRAYAGG(b.language_id), JSON_ARRAY()) AS language_id,
                    IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    mcr.copyright_id
                            ) 
                        FROM
                            mst_copyright mcr
                        WHERE 
                            mcr.copyright_id = b.copyright_id
                    ), JSON_ARRAY()) AS copyright,
                    IFNULL((
                        SELECT 
                            JSON_ARRAYAGG(
                                    ml.license_id
                            ) 
                        FROM
                            mst_license ml
                        WHERE 
                            ml.license_id = b.license_id
                    ), JSON_ARRAY()) AS license,
                    b.image,
                    IFNULL((
                       SELECT 
                            JSON_ARRAYAGG(
                                JSON_OBJECT(
                                    'biblio_id', ba.biblio_id,
                                    'file_id', ba.file_id,
                                    'file_title', f.file_title,
                                    'file_name',f.file_name,
                                    'access_type', ba.access_type,
                                    'access_limit', ba.access_limit
                                ) 
                            ) 
                        FROM
                            biblio_attachment ba 
                        JOIN
                            files f
                            ON ba.file_id = f.file_id
                        WHERE 
                            ba.biblio_id = b.biblio_id 
                    ), JSON_ARRAY()) AS attachment,
                    IFNULL((
                       SELECT 
                             JSON_ARRAYAGG(
                                    bt.topic_id
                            ) 
                        FROM
                            biblio_topic bt 
                        JOIN
                            mst_topic mt
                            ON bt.topic_id = mt.topic_id
                        WHERE 
                            bt.biblio_id = b.biblio_id 
                    ), JSON_ARRAY()) AS topic,
                    b.notes,
                    b.classification ,
                    b.call_number ,
                    b.url_crossref ,
                    b.cp_email 
                FROM
                    biblio b 
                WHERE biblio_id = :value: ;";
        $query = $this->db->query($sql, ['value' => $biblio_id]);
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        } else {
            $result =  [];
        }
        return $result;
    }
}
