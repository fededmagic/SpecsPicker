<?php
/*
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
            "content": "give me a json with minumun and suggested hardware specifications of Counter Strike 2 without \n"
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
$stringResponse = $response->getBody();
$unpackedData = json_decode($stringResponse);
$specs = $unpackedData["result"];

$json2 = json_encode($specs, JSON_PRETTY_PRINT);
echo '<pre>' . $json2 . '</pre>';
*//*
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new \GuzzleHttp\Client();
$client = new Client([
    'verify' => false
]); //disabilita il certificato SSL (non raccomandabile per l'ambiente di produzione)

$response = $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/conversationgpt4', [
	'body' => '{
    "messages": [
        {
            "role": "user",
            "content": "give me a json without \n with minumun and suggested hardware specifications of Counter Strike 2"
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
		'X-RapidAPI-Key' => '4ac7ad12edmsh68893b14d13e403p13b433jsnb8329201aca7',
		'content-type' => 'application/json',
	],
]);
*/
$response = '{"result":"Here is the JSON format for minimum and suggested hardware specifications for playing Counter Strike 2:\n```json\n{\n \"game_name\": \"Counter Strike 2\",\n \"minimum_requirements\": {\n \"os\": {\"windows\": \"Windows 7 (SP1)\", \"macOS\": \"MacOS X 10.9, Ubuntu 12.04\"},\n \"cpu\": {\"model\": \"Intel Core 2 Duo E6600 or AMD Phenom X3 8750 processor or better\"},\n \"memory\": {\"ram\": \"2 GB\"},\n \"graphics\": {\"gpu\": \"Video card must be 256 MB or more and should be a DirectX 9-compatible with support for Pixel Shader 3.0\"},\n \"storage\": {\"hard_drive\": \"15 GB available space\"}\n },\n \"suggested_requirements\": {\n \"os\": {\"windows\": \"Windows 10\", \"macOS\": \"MacOS X 10.14+, Ubuntu 18.04+\"},","status":true,"server_code":1}';


//$stringResponse = $response->getBody();
$stringResponse = $response;
$unpackedData = json_decode($stringResponse);
//$specs = $unpackedData["result"];

$json2 = json_encode($unpackedData, JSON_PRETTY_PRINT);
echo '<pre>' . $json2 . '</pre>';

?>
