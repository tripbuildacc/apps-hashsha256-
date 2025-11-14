<?php
header("Content-Type: application/json");

// cek parameter
if (!isset($_GET['hash']) || !isset($_GET['text'])) {
    echo json_encode([
        "output" => "error",
        "message" => "parameter 'hash' dan 'text' required"
    ], JSON_PRETTY_PRINT);
    exit;
}

$hash = $_GET['hash'];
$text = $_GET['text'];

// hash ulang teks
$rehash = hash("sha256", $text);

// cocokkan
$result = ($rehash === strtolower($hash));

echo json_encode([
    "output" => "work",
    "content" => [
        "text" => $text,
        "hash" => $hash,
        "result" => $result
    ]
], JSON_PRETTY_PRINT);