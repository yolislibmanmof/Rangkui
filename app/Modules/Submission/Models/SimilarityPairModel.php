<?php

namespace App\Modules\Submission\Models;

use App\Models\BaseModel;

class SimilarityPairModel extends BaseModel
{
    protected $table         = 'xu_similarity_pairs';
    protected $primaryKey    = 'pair_id';
    protected $protectFields = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Simpan pasangan similarity
     */
    public function savePair($biblio_a, $biblio_b, $jaccard_score, $ngram_overlap, $shared_fragments)
    {
        // Cek duplikasi (A-B atau B-A)
        $exists = $this->db->table('xu_similarity_pairs')
            ->groupStart()
                ->where('biblio_a', $biblio_a)->where('biblio_b', $biblio_b)
            ->groupEnd()
            ->groupStart()
                ->where('biblio_a', $biblio_b)->where('biblio_b', $biblio_a)
            ->groupEnd()
            ->get()->getRow();

        if (!$exists) {
            return $this->db->table('xu_similarity_pairs')->insert([
                'biblio_a'         => $biblio_a,
                'biblio_b'         => $biblio_b,
                'jaccard_score'    => $jaccard_score,
                'ngram_overlap'    => $ngram_overlap,
                'shared_fragments' => $shared_fragments,
                'compared_at'      => date('Y-m-d H:i:s')
            ]);
        }
        return false;
    }

    /**
     * Ambil dokumen yang mirip dengan dokumen tertentu (di atas threshold)
     */
    public function getSimilarDocuments($biblio_id, $min_score = 0.30)
    {
        return $this->db->table('xu_similarity_pairs')
            ->groupStart()
                ->where('biblio_a', $biblio_id)
                ->orWhere('biblio_b', $biblio_id)
            ->groupEnd()
            ->where('jaccard_score >=', $min_score)
            ->orderBy('jaccard_score', 'DESC')
            ->get()->getResult();
    }
}