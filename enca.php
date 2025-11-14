<?php
header("Content-Type: application/json");

if (!isset($_GET['text'])) {
    echo json_encode([
        "output" => "error",
        "message" => "parameter 'text' required"
    ], JSON_PRETTY_PRINT);
    exit;
}

$text = $_GET['text'];
$hash = hash("sha256", $text);

echo json_encode([
    "output" => "work",
    "content" => [
        "real_text" => $text,
        "hash_convert" => $hash
    ]
], JSON_PRETTY_PRINT);