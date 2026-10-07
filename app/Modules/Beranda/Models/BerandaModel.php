<?php

namespace App\Modules\Beranda\Models;

use MongoDB\Client;
use Config\Services;
use App\Models\BaseModel;

use function PHPSTORM_META\map;
use MongoDB\Exception\Exception;

class BerandaModel extends BaseModel
{


    public function biblio($biblio_id = null, $limit = null)
    {
        $where = $lm = '';
        if (!is_null($biblio_id)) {
            $where  = " WHERE b.biblio_id = $biblio_id ";
            $result = false;
        } else {
            $result = [];
        }
        if (!is_null($limit)) {
            $lm = " LIMIT $limit ";
        }
        $sql = "SELECT
                    b.*,
                    (SELECT mg.gmd_name FROM mst_gmd mg WHERE mg.gmd_id = b.gmd_id LIMIT 1) gmd,
                    (SELECT ml.language_name FROM mst_language ml WHERE ml.language_id = b.language_id LIMIT 1) language,
                    (SELECT mcm.name_prodi FROM mst_code_ministry mcm WHERE mcm.code_ministry = b.code_ministry LIMIT 1) ministry,
                    (SELECT mp.publisher_name FROM mst_publisher mp WHERE mp.publisher_id = b.publisher_id LIMIT 1) publisher,
                    (SELECT mp.place_name FROM mst_place mp WHERE mp.place_id = b.publish_place_id LIMIT 1) publisher_place,
                    (SELECT ml.license_name FROM mst_license ml WHERE ml.license_id = b.license_id LIMIT 1) licence,
                    (SELECT mc.copyright_name FROM mst_copyright mc WHERE mc.copyright_id = b.copyright_id LIMIT 1) copyright,
                    (SELECT mit.item_type_name FROM mst_item_type mit WHERE mit.item_type_id = b.item_type_id LIMIT 1) item_type
                FROM
                    biblio b 
                 $where ORDER BY b.biblio_id DESC 
                 $lm;";
        $query  = $this->db->query($sql);
        if ($query->getNumRows() > 0) {
            if (!is_null($biblio_id)) {
                $result = $query->getRow();
            } else {
                $result = $query->getResult();
            }
        }
        return $result;
    }
    function biblio_author($biblio_id)
    {
        $sql = "SELECT
                ba.`level` ,
                ma.*
            FROM
                biblio_author ba
            JOIN mst_author ma ON
                ma.author_id = ba.author_id
            WHERE
                ba.biblio_id =$biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }

        return $result;
    }
    function biblio_supervisor($biblio_id)
    {
        $sql = "SELECT
                    bs.`level` ,
                    ms.*
                FROM
                    biblio_supervisor bs
                JOIN mst_supervisor ms ON
                    bs.supervisor_id = ms.supervisor_id
                WHERE
                    bs.biblio_id = $biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }
        return $result;
    }
    function biblio_examiner($biblio_id)
    {
        $sql = "SELECT
                    be.`level`,
                    me.*
                FROM
                    biblio_examiner be
                JOIN mst_examiner me ON
                    be.examiner_id = me.examiner_id
                WHERE
                    be.biblio_id = $biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }
        return $result;
    }
    function biblio_contributor($biblio_id)
    {
        $sql = "SELECT
                    bc.`level`,
                    mc.*
                FROM
                    biblio_contributor bc 
                JOIN mst_contributor mc ON
                    bc.contributor_id = mc.contributor_id 
                WHERE
                    bc.biblio_id = $biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }
        return $result;
    }
    function biblio_topic($biblio_id)
    {
        $sql = "SELECT 
                    bt.`level`,
                    mt.* 
                FROM biblio_topic bt
                JOIN mst_topic mt ON
                    bt.topic_id = mt.topic_id 
                WHERE
                    bt.biblio_id = $biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }
        return $result;
    }
    function biblio_attachment($biblio_id)
    {
        $sql = "SELECT
                    ba.access_type,
                    ba.access_limit,
                    f.*
                FROM
                    biblio_attachment ba
                JOIN files f ON
                    f.file_id = ba.file_id
                WHERE
                    ba.biblio_id = $biblio_id";
        $query  = $this->db->query($sql);
        $result = [];
        if ($query->getNumRows() > 0) {
            $result = $query->getResult();
        }
        return $result;
    }

    function biblio_location($biblio_id)
    {
        $sql = "SELECT 
                    i.item_code, 
                    i.call_number, 
                    stat.item_status_name, 
                    loc.location_name, 
                    stat.rules, 
                    i.site 
                FROM 
                    item AS i
                LEFT JOIN 
                    mst_item_status AS stat ON i.item_status_id = stat.item_status_id
                LEFT JOIN 
                    mst_location AS loc ON i.location_id = loc.location_id
                WHERE 
                    i.biblio_id = :biblio_id:";
        $query = $this->db->query($sql, ['biblio_id' => $biblio_id]);
        $result = [];

        if ($query->getNumRows() > 0) {
            $result = $query->getResultArray();
        }

        return $result;
    }
    function search_biblio($get)
    {
        $result     = [];
        $index_type = env('INDEX_TYPE', 'mysql');
        if ($index_type == "mysql") {

            $search_column = ['title', 'author', 'topic'];
            $filter = '';
            foreach ($search_column as $key => $column) {
                if ($key > 0) {
                    $filter .= " OR ";
                }
                $filter .= " $column LIKE '%$get%' ";
            }
            $sql = "SELECT
                    *
                FROM
                    search_biblio
                WHERE $filter
                ORDER BY biblio_id DESC";
            $query  = $this->db->query($sql);
            if ($query->getNumRows() > 0) {
                $result = $query->getResult();
            }
        } else {
            $mongo = Services::mongo();
            //check avaibility mongodb
            $output = "";
            exec("php -i | grep -i mongodb", $output);

            $filteredArray = array_filter($output, function ($item) {
                return strpos($item, 'MONGO_URL') === false;
            });

            if ($filteredArray !== "" || $filteredArray == true) {
                $packageMongo = \Composer\InstalledVersions::getPrettyVersion('mongodb/mongodb');

                if (!is_null($packageMongo)) {
                    $collection = $mongo->biblio;


                    try {
                        $filter = [
                            '$or' => [
                                ['author' => ['$regex' => $get, '$options' => 'i']],
                                ['title'  => ['$regex' => $get, '$options' => 'i']],
                                ['topic'  => ['$regex' => $get, '$options' => 'i']],
                            ]
                        ];
                        $result_array = $collection->find($filter)->toArray();
                        $result       = json_decode(json_encode($result_array), FALSE);
                    } catch (Exception $e) {

                        return $result = [];
                    }
                }
            }
        }
        return $result;
    }
    function search_biblio_specific($column, $get)
    {
        $get        = rawurldecode($get);
        $result     = [];
        $index_type = $_ENV['INDEX_TYPE'];
        if ($index_type == "mysql") {

            $sql = "SELECT
                    *
                FROM
                    search_biblio
                WHERE $column LIKE '%$get%' 
                ORDER BY biblio_id DESC";
            $query  = $this->db->query($sql);
            if ($query->getNumRows() > 0) {
                $result = $query->getResult();
            }
        } else {
            $mongo = Services::mongo();
            //check avaibility mongodb
            $output = "";
            exec("php -i | grep -i mongodb", $output);

            $filteredArray = array_filter($output, function ($item) {
                return strpos($item, 'MONGO_URL') === false;
            });

            if ($filteredArray !== "" || $filteredArray == true) {
                $packageMongo = \Composer\InstalledVersions::getPrettyVersion('mongodb/mongodb');

                if (!is_null($packageMongo)) {
                    $collection = $mongo->biblio;
                    $filter = [
                        '$or' => [
                            [$column => ['$regex' => $get, '$options' => 'i']],
                        ]
                    ];
                    $result_array = $collection->find($filter)->toArray();
                    $result       = json_decode(json_encode($result_array), FALSE);
                }
            }
        }
        return $result;
    }

    // ================= FITUR 2: PROFIL PENULIS CERDAS =================
    function author_profile($author_id)
    {
        $author_id = (int)$author_id;
        $sql = "SELECT * FROM mst_author WHERE author_id = $author_id";
        $query = $this->db->query($sql);
        return $query->getNumRows() > 0 ? $query->getRow() : null;
    }

    function author_works($author_id)
    {
        $author_id = (int)$author_id;
        $sql = "SELECT b.biblio_id, b.title, b.publish_year, b.image,
                    (SELECT COUNT(*) FROM biblio_count bc WHERE bc.biblio_id = b.biblio_id) AS downloads
                FROM biblio_author ba
                JOIN biblio b ON b.biblio_id = ba.biblio_id
                WHERE ba.author_id = $author_id
                ORDER BY b.publish_year DESC, b.biblio_id DESC";
        $query = $this->db->query($sql);
        return $query->getNumRows() > 0 ? $query->getResult() : [];
    }

    function author_yearly($author_id)
    {
        $author_id = (int)$author_id;
        $sql = "SELECT b.publish_year AS y, COUNT(*) AS total
                FROM biblio_author ba
                JOIN biblio b ON b.biblio_id = ba.biblio_id
                WHERE ba.author_id = $author_id AND b.publish_year IS NOT NULL AND b.publish_year <> ''
                GROUP BY b.publish_year
                ORDER BY b.publish_year ASC";
        $query = $this->db->query($sql);
        return $query->getNumRows() > 0 ? $query->getResult() : [];
    }

    function author_collaborators($author_id)
    {
        $author_id = (int)$author_id;
        $sql = "SELECT ma.author_id, ma.author_name, COUNT(*) AS total
                FROM biblio_author ba
                JOIN biblio_author ba2 ON ba2.biblio_id = ba.biblio_id AND ba2.author_id <> ba.author_id
                JOIN mst_author ma ON ma.author_id = ba2.author_id
                WHERE ba.author_id = $author_id
                GROUP BY ma.author_id, ma.author_name
                ORDER BY total DESC LIMIT 12";
        $q1 = $this->db->query($sql);
        $co = $q1->getNumRows() > 0 ? $q1->getResult() : [];

        $sql2 = "SELECT ms.supervisor_id, ms.supervisor_name, COUNT(*) AS total
                FROM biblio_author ba
                JOIN biblio_supervisor bs ON bs.biblio_id = ba.biblio_id
                JOIN mst_supervisor ms ON ms.supervisor_id = bs.supervisor_id
                WHERE ba.author_id = $author_id
                GROUP BY ms.supervisor_id, ms.supervisor_name
                ORDER BY total DESC LIMIT 12";
        $q2 = $this->db->query($sql2);
        $sp = $q2->getNumRows() > 0 ? $q2->getResult() : [];

        return ['coauthor' => $co, 'supervisor' => $sp];
    }

    // ================= FITUR 3: GALAKSI RISET =================
    function galaxy_data()
    {
        // 1. Bintang = penulis + jumlah karya
        $sql1 = "SELECT ma.author_id AS id, ma.author_name AS name, COUNT(ba.biblio_id) AS works
                 FROM mst_author ma
                 LEFT JOIN biblio_author ba ON ba.author_id = ma.author_id
                 GROUP BY ma.author_id, ma.author_name
                 HAVING works > 0
                 ORDER BY works DESC LIMIT 150";
        $authors = $this->db->query($sql1)->getResult();

        // 2. Nebula = topik + jumlah karya
        $sql2 = "SELECT mt.topic_id AS id, mt.topic AS name, COUNT(bt.biblio_id) AS works
                 FROM mst_topic mt
                 LEFT JOIN biblio_topic bt ON bt.topic_id = mt.topic_id
                 GROUP BY mt.topic_id, mt.topic
                 HAVING works > 0
                 ORDER BY works DESC LIMIT 60";
        $topics = $this->db->query($sql2)->getResult();

        // 3. Garis co-author (penulis yang menulis karya yang sama)
        $sql3 = "SELECT ba1.author_id AS from_id, ba2.author_id AS to_id, COUNT(*) AS weight
                 FROM biblio_author ba1
                 JOIN biblio_author ba2 ON ba2.biblio_id = ba1.biblio_id AND ba2.author_id > ba1.author_id
                 GROUP BY ba1.author_id, ba2.author_id
                 HAVING weight > 0
                 LIMIT 600";
        $coauthor = $this->db->query($sql3)->getResult();

        // 4. Garis penulis → topik
        $sql4 = "SELECT ba.author_id AS author_id, bt.topic_id AS topic_id, COUNT(*) AS weight
                 FROM biblio_author ba
                 JOIN biblio_topic bt ON bt.biblio_id = ba.biblio_id
                 GROUP BY ba.author_id, bt.topic_id
                 HAVING weight > 0
                 LIMIT 800";
        $authorTopic = $this->db->query($sql4)->getResult();

        return [
            'authors'     => $authors,
            'topics'      => $topics,
            'coauthor'    => $coauthor,
            'authorTopic' => $authorTopic
        ];
    }

    // ================= FITUR 5: RANGKUI AI =================
    function ai_search($query, $limit = 5)
    {
        $limit = (int)$limit;
        $q = $this->db->escapeLikeString($query);

        // Cari hanya di kolom yang PASTI ada: title, notes, departement
        $sql = "SELECT b.biblio_id, b.title, b.notes, b.publish_year, b.image, b.departement,
                       (SELECT GROUP_CONCAT(ma.author_name SEPARATOR ', ')
                        FROM biblio_author ba
                        JOIN mst_author ma ON ma.author_id = ba.author_id
                        WHERE ba.biblio_id = b.biblio_id) AS authors
                FROM biblio b
                WHERE b.title LIKE '%$q%'
                   OR b.notes LIKE '%$q%'
                   OR b.departement LIKE '%$q%'
                ORDER BY b.biblio_id DESC
                LIMIT $limit";
        try {
            $res = $this->db->query($sql);
            $result = $res->getNumRows() > 0 ? $res->getResult() : [];
        } catch (\Exception $e) {
            $result = [];
        }

        // Fallback: bila tak cocok, kembalikan dokumen terbaru
        if (empty($result)) {
            $sql2 = "SELECT b.biblio_id, b.title, b.notes, b.publish_year, b.image, b.departement,
                           (SELECT GROUP_CONCAT(ma.author_name SEPARATOR ', ')
                            FROM biblio_author ba
                            JOIN mst_author ma ON ma.author_id = ba.author_id
                            WHERE ba.biblio_id = b.biblio_id) AS authors
                    FROM biblio b
                    ORDER BY b.biblio_id DESC
                    LIMIT $limit";
            try {
                $res = $this->db->query($sql2);
                $result = $res->getNumRows() > 0 ? $res->getResult() : [];
            } catch (\Exception $e) {
                $result = [];
            }
        }

        return $result;
    }

    /**
     * ✅ RICH SEARCH: kembalikan dokumen + metadata lengkap untuk AI context
     */
    public function ai_search_rich($query, $limit = 6)
    {
        $db = \Config\Database::connect();
        $q = trim($query);
        if ($q === '') return [];

        $keywords = preg_split('/\s+/', $q);
        $keywords = array_filter($keywords, fn($w) => strlen($w) > 2);

        $builder = $db->table('biblio b')
            ->select('b.biblio_id, b.title, b.notes, b.publish_year, b.departement, 
                      b.student_id, b.classification, b.collation, b.input_date,
                      g.gmd_name,
                      (SELECT GROUP_CONCAT(a.author_name SEPARATOR ", ") 
                       FROM biblio_author ba 
                       JOIN mst_author a ON ba.author_id = a.author_id 
                       WHERE ba.biblio_id = b.biblio_id) AS authors,
                      (SELECT GROUP_CONCAT(sv.supervisor_name SEPARATOR ", ") 
                       FROM biblio_supervisor bs 
                       JOIN mst_supervisor sv ON bs.supervisor_id = sv.supervisor_id 
                       WHERE bs.biblio_id = b.biblio_id) AS supervisors,
                      (SELECT GROUP_CONCAT(t.topic SEPARATOR ", ") 
                       FROM biblio_topic bt 
                       JOIN mst_topic t ON bt.topic_id = t.topic_id 
                       WHERE bt.biblio_id = b.biblio_id) AS topics')
            ->join('mst_gmd g', 'b.gmd_id = g.gmd_id', 'left')
            ->where('b.opac_hide', 0);

        $searchTerms = array_map(fn($k) => '%' . $db->escapeLikeString($k) . '%', $keywords);

        $builder->groupStart();
        foreach ($searchTerms as $term) {
            $builder->orGroupStart()
                ->like('b.title', $term)
                ->orLike('b.notes', $term)
                ->orLike('b.departement', $term)
                ->groupEnd();
        }
        $builder->groupEnd();

        return $builder->orderBy('b.input_date', 'DESC')->limit($limit)->get()->getResult();
    }

    /**
     * ✅ STATS: jawab pertanyaan analitik (tren, top authors, dll)
     */
    public function ai_stats()
    {
        $db = \Config\Database::connect();

        $topAuthors = $db->query("
            SELECT a.author_name, COUNT(ba.biblio_id) as total_karya
            FROM biblio_author ba 
            JOIN mst_author a ON ba.author_id = a.author_id
            JOIN biblio b ON ba.biblio_id = b.biblio_id AND b.opac_hide = 0
            GROUP BY a.author_id, a.author_name
            ORDER BY total_karya DESC LIMIT 10
        ")->getResultArray();

        $yearTrend = $db->query("
            SELECT publish_year, COUNT(*) as total
            FROM biblio
            WHERE publish_year >= YEAR(CURDATE()) - 5
              AND opac_hide = 0
              AND publish_year IS NOT NULL
            GROUP BY publish_year
            ORDER BY publish_year ASC
        ")->getResultArray();

        $topDept = $db->query("
            SELECT departement, COUNT(*) as total
            FROM biblio
            WHERE departement IS NOT NULL AND departement != ''
              AND opac_hide = 0
            GROUP BY departement
            ORDER BY total DESC LIMIT 10
        ")->getResultArray();

        return [
            'total_docs'       => (int) $db->table('biblio')->where('opac_hide', 0)->countAllResults(),
            'total_authors'    => $topAuthors ?: [],
            'year_trend'       => $yearTrend,
            'top_departments'  => $topDept,
            'latest_year'      => !empty($yearTrend) ? max(array_column($yearTrend, 'publish_year')) : date('Y')
        ];
    }

    /**
     * ✅ FIND BY ID/NIM/NAMA: untuk pertanyaan "dokumen #X" atau "karya NIM Y"
     */
    public function ai_find_specific($query)
    {
        $db = \Config\Database::connect();
        $results = [];

        // Pola 1: "dokumen #123" atau "id 123"
        if (preg_match('/(?:#|id\s*|biblio\s*)(\d+)/i', $query, $m)) {
            $id = (int) $m[1];
            if ($id > 0) {
                $doc = $db->table('biblio b')
                    ->select('b.biblio_id, b.title, b.publish_year, b.departement, b.student_id, b.notes,
                        (SELECT GROUP_CONCAT(a.author_name SEPARATOR ", ") 
                         FROM biblio_author ba JOIN mst_author a ON ba.author_id = a.author_id 
                         WHERE ba.biblio_id = b.biblio_id) AS authors,
                        (SELECT GROUP_CONCAT(sv.supervisor_name SEPARATOR ", ") 
                         FROM biblio_supervisor bs JOIN mst_supervisor sv ON bs.supervisor_id = sv.supervisor_id 
                         WHERE bs.biblio_id = b.biblio_id) AS supervisors,
                        (SELECT GROUP_CONCAT(t.topic SEPARATOR ", ") 
                         FROM biblio_topic bt JOIN mst_topic t ON bt.topic_id = t.topic_id 
                         WHERE bt.biblio_id = b.biblio_id) AS topics')
                    ->where('b.biblio_id', $id)
                    ->where('b.opac_hide', 0)
                    ->get()->getRow();
                if ($doc) $results[] = $doc;
            }
        }

        // Pola 2: "NIM 01023621722004"
        if (preg_match('/NIM\s*(\d{8,20})/i', $query, $m)) {
            $nim = $m[1];
            $docs = $db->table('biblio b')
                ->select('b.biblio_id, b.title, b.publish_year, b.departement, b.student_id, b.notes,
                    (SELECT GROUP_CONCAT(a.author_name SEPARATOR ", ") 
                     FROM biblio_author ba JOIN mst_author a ON ba.author_id = a.author_id 
                     WHERE ba.biblio_id = b.biblio_id) AS authors,
                    (SELECT GROUP_CONCAT(sv.supervisor_name SEPARATOR ", ") 
                     FROM biblio_supervisor bs JOIN mst_supervisor sv ON bs.supervisor_id = sv.supervisor_id 
                     WHERE bs.biblio_id = b.biblio_id) AS supervisors')
                ->where('b.student_id', $nim)
                ->where('b.opac_hide', 0)
                ->limit(5)->get()->getResult();
            foreach ($docs as $d) $results[] = $d;
        }

        // Pola 3: "karya dari [nama]"
        if (preg_match('/(?:karya|tulisan|riset)\s+(?:dari|oleh)\s+([A-Za-z\s]+)/i', $query, $m)) {
            $authorName = trim($m[1]);
            $docs = $db->query("
                SELECT DISTINCT b.biblio_id, b.title, b.publish_year, b.departement, b.notes,
                    GROUP_CONCAT(DISTINCT a.author_name SEPARATOR ', ') AS authors
                FROM biblio b
                JOIN biblio_author ba ON b.biblio_id = ba.biblio_id
                JOIN mst_author a ON ba.author_id = a.author_id
                WHERE a.author_name LIKE ? AND b.opac_hide = 0
                GROUP BY b.biblio_id
                LIMIT 5
            ", ['%' . $authorName . '%'])->getResult();
            foreach ($docs as $d) $results[] = $d;
        }

        return $results;
    }
}