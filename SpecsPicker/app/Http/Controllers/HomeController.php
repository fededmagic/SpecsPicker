<?php

namespace App\Http\Controllers;

//require 'vendor/autoload.php';
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public static string $message = "give me a json formatted with the fields
        Operating system, CPU, Memory, GPU, Storage with minumun and 
        suggested hardware specifications of ";

    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'SpecsPicker';
        $viewData['subtitle'] = 'Search the minimum hardware specs for a software!';
        $viewData['result'] = "";
        return view('home.index')->with("viewData", $viewData);
    }

    public function search(Request $request) {

        $viewData = [];
        $viewData['title'] = 'SpecsPicker';
        $viewData['subtitle'] = 'Search the minimum hardware specs for a software!';
        $viewData['result'] = "";

        
        $request->validate([
            'txtInput' => "required | max:255"
        ]);

        $inputSoftware = $request->input('txtInput');

        $viewData["result"] = HomeController::apiRequest($inputSoftware);
        return view('home.index')->with("viewData", $viewData);
    }

    private static function apiRequest($inputSoftware) {

        $client = new \GuzzleHttp\Client();
        $client = new Client([
            'verify' => false
        ]); //disabilita il certificato SSL (non raccomandabile per l'ambiente di produzione)

        $response = HomeController::makeRequest($client, $inputSoftware);

        return HomeController::parseBody($response);
    }

    private static function makeRequest($client, $inputSoftware) {

        return $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/conversationgpt4', [
            'body' => '{
            "messages": [
                {
                    "role": "user",
                    "content": "give me a json formatted with only the fields Operating system, CPU, Memory, GPU, Storage with minumun and suggested hardware specifications of' .  $inputSoftware . '"
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
        ])->getBody();
    }

    private static function makeFakeRequest($client, $inputSoftware) {

        return '{"result":"Here is the JSON format for The Last of Us hardware specifications:```json{    \"Operating System\": {        \"Minimum\": \"Windows 7 (64-bit)\",        \"Recommended\": \"Windows 10 (64-bit)\"    },    \"CPU\": {        \"Minimum\": \"Intel Core i3-560 @ 3.3GHz or AMD Phenom II X4 945\",        \"Recommended\": \"Intel Core i5-2500K @ 3.3GHz or AMD FX-8320 @ 3.5GHz\"    },    \"Memory\": {        \"Minimum\": \"4 GB RAM\",        \"Recommended\": \"8 GB RAM\"    },    \"GPU\": {        \"Minimum\": \"NVIDIA GeForce GTX 660 / AMD Radeon HD 7870 (2GB VRAM)\",        \"Recommended\": \"NVIDIA GeForce GTX 970 (4GB) / AMD Radeon R","status":true,"server_code":1}';
    }

    public static function parseBody($inputString): string {

        $inputString = str_replace('\ ', '', $inputString);
        $inputString = str_replace('\n', '', $inputString);

        return $inputString;
    }
}
