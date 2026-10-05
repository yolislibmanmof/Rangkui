<?php
/**
 * DIFOSS Integrity Helper — Forensic Text Analysis (Pure PHP, Zero API)
 * Algoritma: N-gram shingling, Jaccard similarity, Shannon entropy,
 *            Burstiness, Type-Token Ratio, Lexical Density.
 */

if (!function_exists('integrity_normalize')) {
    /** Normalisasi teks: lowercase, hapus tanda baca berlebihan, trim */
    function integrity_normalize(string $text): string
    {
        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text);
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }
}

if (!function_exists('integrity_tokenize')) {
    /** Tokenisasi teks menjadi array kata */
    function integrity_tokenize(string $text): array
    {
        $clean = integrity_normalize($text);
        if ($clean === '') return [];
        return preg_split('/\s+/u', $clean, -1, PREG_SPLIT_NO_EMPTY);
    }
}

if (!function_exists('integrity_sentences')) {
    /** Pecah teks menjadi array kalimat */
    function integrity_sentences(string $text): array
    {
        $sentences = preg_split('/(?<=[.!?])\s+/u', trim($text), -1, PREG_SPLIT_NO_EMPTY);
        return array_filter(array_map('trim', $sentences));
    }
}

if (!function_exists('integrity_ngrams')) {
    /** Bangun n-gram (potongan N kata berurutan) */
    function integrity_ngrams(array $tokens, int $n = 3): array
    {
        $ngrams = [];
        $len = count($tokens);
        for ($i = 0; $i <= $len - $n; $i++) {
            $ngrams[] = implode(' ', array_slice($tokens, $i, $n));
        }
        return $ngrams;
    }
}

if (!function_exists('integrity_signature')) {
    /** Bangun signature hash set untuk fingerprinting cepat */
    function integrity_signature(string $text, int $n = 4): array
    {
        $tokens = integrity_tokenize($text);
        if (count($tokens) < $n) return [];
        $ngrams = integrity_ngrams($tokens, $n);
        // Hash setiap n-gram untuk menghemat ruang
        $hashes = array_map(fn($ng) => substr(hash('sha256', $ng), 0, 16), $ngrams);
        return array_values(array_unique($hashes));
    }
}

if (!function_exists('integrity_jaccard')) {
    /** Jaccard Similarity = |A ∩ B| / |A ∪ B| */
    function integrity_jaccard(array $setA, array $setB): float
    {
        if (empty($setA) || empty($setB)) return 0.0;
        $hashA = array_flip($setA);
        $hashB = array_flip($setB);
        $intersection = count(array_intersect_key($hashA, $hashB));
        $union = count(array_flip(array_merge($setA, $setB)));
        return $union > 0 ? ($intersection / $union) : 0.0;
    }
}

if (!function_exists('integrity_entropy')) {
    /** Shannon Entropy — mengukur keacakan/keteraturan teks */
    function integrity_entropy(string $text): float
    {
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $total = count($chars);
        if ($total === 0) return 0.0;
        $freq = array_count_values($chars);
        $entropy = 0.0;
        foreach ($freq as $count) {
            $p = $count / $total;
            if ($p > 0) $entropy -= $p * log($p, 2);
        }
        return $entropy;
    }
}

if (!function_exists('integrity_ttr')) {
    /** Type-Token Ratio = kata unik / total kata */
    function integrity_ttr(string $text): float
    {
        $tokens = integrity_tokenize($text);
        if (empty($tokens)) return 0.0;
        return count(array_unique($tokens)) / count($tokens);
    }
}

if (!function_exists('integrity_burstiness')) {
    /** Burstiness = std deviasi panjang kalimat (AI = rendah, manusia = tinggi) */
    function integrity_burstiness(string $text): float
    {
        $sentences = integrity_sentences($text);
        if (count($sentences) < 2) return 0.0;
        $lengths = array_map(fn($s) => count(integrity_tokenize($s)), $sentences);
        $mean = array_sum($lengths) / count($lengths);
        $variance = array_sum(array_map(fn($l) => pow($l - $mean, 2), $lengths)) / count($lengths);
        return sqrt($variance);
    }
}

if (!function_exists('integrity_avg_sentence')) {
    function integrity_avg_sentence(string $text): float
    {
        $sentences = integrity_sentences($text);
        if (empty($sentences)) return 0.0;
        $lengths = array_map(fn($s) => count(integrity_tokenize($s)), $sentences);
        return array_sum($lengths) / count($lengths);
    }
}

if (!function_exists('integrity_lexical_density')) {
    /** Lexical Density = kata konten / total kata */
    function integrity_lexical_density(string $text): float
    {
        $tokens = integrity_tokenize($text);
        if (empty($tokens)) return 0.0;
        // Stopwords umum (simplified)
        $stops = ['yang','di','ke','dari','dan','atau','untuk','dengan','pada','adalah','akan','tidak','ini','itu','sudah','telah','juga','hanya','jika','karena','oleh','sebagai','saat','agar','bisa','dapat','ada','mereka','kami','kita','saya','anda','dia','ia','nya','mu','ku','kau','tersebut','sangat','paling','lebih','kurang','seperti','tapi','tetapi','namun','bahwa','maka','jika','supaya','ketika','sehingga','selama','setelah','sebelum','antara','terhadap','serta'];
        $content = array_diff($tokens, $stops);
        return count($content) / count($tokens);
    }
}

if (!function_exists('integrity_ai_markers')) {
    /** Deteksi frasa khas AI (Indonesian & English) */
    function integrity_ai_markers(string $text): array
    {
        $markers = [
            'secara signifikan','oleh karena itu','di sisi lain','dalam konteks ini',
            'perlu dicatat bahwa','berdasarkan analisis','lebih lanjut','selanjutnya',
            'secara keseluruhan','dalam hal ini','dapat disimpulkan bahwa','mengingat bahwa',
            'penting untuk dipahami','dengan demikian','secara fundamental',
            'it is important to note','furthermore','moreover','in conclusion',
            'it is worth noting','in this context','on the other hand','as a result'
        ];
        $lower = mb_strtolower($text, 'UTF-8');
        $hits = [];
        $total = 0;
        foreach ($markers as $m) {
            $count = substr_count($lower, $m);
            if ($count > 0) { $hits[$m] = $count; $total += $count; }
        }
        $wordCount = count(integrity_tokenize($text));
        $density = $wordCount > 0 ? ($total / $wordCount) * 100 : 0;
        return ['hits' => $hits, 'total' => $total, 'density_per_100' => round($density, 3)];
    }
}

if (!function_exists('integrity_full_profile')) {
    /** Profil lengkap untuk disimpan sebagai fingerprint */
    function integrity_full_profile(string $text): array
    {
        $tokens = integrity_tokenize($text);
        return [
            'word_count' => count($tokens),
            'unique_words' => count(array_unique($tokens)),
            'ttr' => round(integrity_ttr($text), 4),
            'entropy' => round(integrity_entropy($text), 4),
            'burstiness' => round(integrity_burstiness($text), 4),
            'avg_sentence_len' => round(integrity_avg_sentence($text), 2),
            'lexical_density' => round(integrity_lexical_density($text), 4),
            'ai_markers' => integrity_ai_markers($text),
            'text_hash' => hash('sha256', integrity_normalize($text)),
            'signature' => integrity_signature($text, 4),
        ];
    }
}

if (!function_exists('integrity_ai_risk_score')) {
    /** Hitung skor risiko AI 0-100 berdasarkan indikator stylometry */
    function integrity_ai_risk_score(array $profile): array
    {
        $scores = [];
        // 1. Burstiness rendah = AI (AI sangat seragam)
        $b = $profile['burstiness'] ?? 0;
        $scores['burstiness'] = $b < 3 ? min(100, (3 - $b) * 25) : max(0, 20 - ($b - 3) * 2);

        // 2. TTR menengah-tinggi khas AI
        $ttr = $profile['ttr'] ?? 0;
        $scores['ttr'] = ($ttr > 0.55 && $ttr < 0.75) ? 60 + ($ttr - 0.55) * 200 : max(0, 40 - abs($ttr - 0.65) * 100);

        // 3. Entropy khas (~4.0 untuk teks Indonesia AI)
        $e = $profile['entropy'] ?? 0;
        $scores['entropy'] = abs($e - 4.0) < 0.3 ? 70 + (0.3 - abs($e - 4.0)) * 100 : max(0, 30 - abs($e - 4.0) * 50);

        // 4. AI marker density tinggi = AI
        $density = $profile['ai_markers']['density_per_100'] ?? 0;
        $scores['ai_markers'] = min(100, $density * 40);

        // 5. Panjang kalimat seragam (rendah std dev relatif)
        $avg = $profile['avg_sentence_len'] ?? 0;
        $cv = $avg > 0 ? $b / $avg : 0; // coefficient of variation
        $scores['uniformity'] = $cv < 0.3 ? 70 + (0.3 - $cv) * 100 : max(0, 40 - ($cv - 0.3) * 50);

        // Bobot: burstiness & uniformity paling penting
        $weights = [
            'burstiness' => 0.30,
            'ttr' => 0.15,
            'entropy' => 0.15,
            'ai_markers' => 0.20,
            'uniformity' => 0.20,
        ];
        $total = 0;
        foreach ($scores as $k => $v) { $total += $v * ($weights[$k] ?? 0); }
        return ['scores' => $scores, 'final' => round($total, 1)];
    }
}