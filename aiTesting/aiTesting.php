<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client();
$client = new Client([
    'verify' => false
]); //disabilita il certificato SSL (non raccomandabile per l'ambiente di produzione)

$response = $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/conversationgpt4', [
    'body' => '{
    "messages": [
        {
            "role": "user",
            "content": "give me a json with minumun and suggested hardware specifications of Counter Strike 2"
        }
    ],
    "system_prompt": "",
    "temperature": 0.9,
    "top_k": 5,
    "top_p": 0.9,
    "max_tokens": 256,
    "web_access": false
}',
    'headers' => [
        'X-RapidAPI-Host' => 'chatgpt-42.p.rapidapi.com',
        'X-RapidAPI-Key' => 'c8c6664ed4msh0ad00afe8990309p16b23fjsn04e721adc1ba',
        'content-type' => 'application/json',
    ],
]);

echo $response->getBody();
?>