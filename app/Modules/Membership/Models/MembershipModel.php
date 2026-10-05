<?php

namespace App\Modules\Membership\Models;

use App\Models\BaseModel;

class MembershipModel extends BaseModel
{
    protected $table         = 'member';
    protected $primaryKey    = 'member_id';
    protected $returnType    = 'object';
    protected $protectFields = false;

    protected $useTimestamps = true;
    protected $createdField  = 'input_date';
    protected $updatedField  = 'last_update';

    /**
     * Jumlah anggota aktif
     */
    public function getActiveMembers()
    {
        $now = date('Y-m-d');

        $sql = "SELECT COUNT(member_id) AS total_member
                FROM {$this->table}
                WHERE expire_date > ?";

        $row = $this->db
            ->query($sql, [$now])
            ->getRow();

        return (int) ($row->total_member ?? 0);
    }

    /**
     * Jumlah anggota kadaluarsa
     */
    public function getExpiredMembers()
    {
        $now = date('Y-m-d');

        $sql = "SELECT COUNT(member_id) AS total_member
                FROM {$this->table}
                WHERE expire_date < ?";

        $row = $this->db
            ->query($sql, [$now])
            ->getRow();

        return (int) ($row->total_member ?? 0);
    }

    /**
     * Jumlah anggota berdasarkan tipe
     */
    public function getMemberByType()
    {
        $now = date('Y-m-d');

        $sql = "SELECT
                    mt.member_type_name AS member_name,
                    COUNT(m.member_id) AS total
                FROM mst_member_type AS mt
                LEFT JOIN member AS m
                    ON mt.member_type_id = m.member_type_id
                    AND m.expire_date > ?
                GROUP BY mt.member_type_id
                ORDER BY COUNT(m.member_id) DESC";

        return $this->db
            ->query($sql, [$now])
            ->getResult();
    }

    /**
     * Daftar tipe anggota
     */
    public function getMstMemberType()
    {
        return $this->db
            ->table('mst_member_type')
            ->orderBy('member_type_id', 'ASC')
            ->get()
            ->getResult();
    }

    /**
     * Simpan anggota baru.
     *
     * Tidak membuat transaksi di sini.
     * Transaksi dikontrol oleh Controller.
     */
    public function insertMember(array $data)
    {
        try {
            /*
             * Jika member_id sudah digunakan,
             * buat ID baru.
             */
            if (!empty($data['member_id'])) {

                $existingMember = $this
                    ->where('member_id', $data['member_id'])
                    ->first();

                if ($existingMember) {
                    $data['member_id'] = generateRandomID();
                }
            } else {
                $data['member_id'] = generateRandomID();
            }

            /*
             * Insert menggunakan Model CI4.
             */
            $result = $this->insert($data);

            if ($result === false) {

                log_message(
                    'error',
                    'MembershipModel::insertMember gagal: ' .
                    json_encode($this->errors())
                );

                return false;
            }

            return true;

        } catch (\Throwable $e) {

            log_message(
                'error',
                'MembershipModel::insertMember exception: ' .
                $e->getMessage()
            );

            return false;
        }
    }
}