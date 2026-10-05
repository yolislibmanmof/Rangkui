<?php
// GANTI DENGAN API KEY ANDA
$apiKey = 'AQ.Ab8RN6I-C91GPR8_0c03aZtyxJwPxcalK6eHXM6GRvMnJxnoiQ';

$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . $apiKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Status: " . $httpCode . "\n\n";

$data = json_decode($response, true);

if (isset($data['models'])) {
    echo "Model yang tersedia untuk generateContent:\n\n";
    foreach ($data['models'] as $model) {
        $name = str_replace('models/', '', $model['name']);
        $supported = implode(', ', $model['supportedGenerationMethods'] ?? []);
        if (strpos($supported, 'generateContent') !== false) {
            echo "- " . $name . "\n";
        }
    }
} else {
    echo "Error Response:\n";
    print_r($data);
    echo "\n\nJika error 'API key not valid' atau HTTP 403, periksa pengaturan API Key di Google AI Studio.";
}