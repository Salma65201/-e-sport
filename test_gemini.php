<?php

echo "cURL activé : " . (function_exists('curl_init') ? "OUI" : "NON") . "\n";
echo "Version PHP : " . phpversion() . "\n";

$apiKey = 'AIzaSyAnPUDE0TWHvGcKEAByflNGD9pi7gZPNN4';

$url = 'https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash-lite:generateContent?key=' . $apiKey;

$body = json_encode([
    'contents' => [
        ['role' => 'user', 'parts' => [['text' => 'Dis bonjour en français']]]
    ]
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$result = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

echo "CURL ERROR : " . ($error ?: "aucune") . "\n";
echo "RÉPONSE : " . $result . "\n";