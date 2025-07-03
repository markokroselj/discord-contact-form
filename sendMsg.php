<?php
$headers = [
    'Content-Type: application/json'
];

if(!isset($_POST['msg']) || $_POST['msg'] == ''){
    http_response_code(400);
    echo('<p class="text-red-500">Message required ⚠</p>');
    die();
}

$webhookUrl = getenv('webhook');

if(!isset($webhookUrl) || $webhookUrl == ''){
    http_response_code(500);
    die();
}
$messageContent = $_POST['msg'];

$payload = json_encode([
    'content' => $messageContent
]);



$ch = curl_init($webhookUrl);


curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);


echo '<p class="text-emerald-500">Message send ✔</p>';