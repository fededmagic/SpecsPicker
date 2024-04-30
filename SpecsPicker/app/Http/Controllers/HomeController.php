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
        $viewData['result'] = array();
        $viewData['fields'] = [];

        return view('home.index')->with("viewData", $viewData);
    }

    public function search(Request $request) {

        $viewData = [];
        $viewData['title'] = 'SpecsPicker';
        $viewData['subtitle'] = 'Search the minimum hardware specs for a software!';
        $viewData['result'] = array();
        $viewData['fields'] = ["CPU", "Memory", "GPU", "Operating system"];
        
        $request->validate([
            'txtInput' => "required | max:255"
        ]);

        $inputSoftware = $request->input('txtInput');
        
        $viewData["result"] = HomeController::apiRequest($inputSoftware);
        //$viewData["result"] = $result["minimum"];
        return view('home.index')->with("viewData", $viewData);
    }

    private static function apiRequest($inputSoftware) {

        $client = new \GuzzleHttp\Client();
        $client = new Client([
            'verify' => false
        ]); //disabilita il certificato SSL

        $response = HomeController::makeRequest($client, $inputSoftware);

        return HomeController::parseBody($response);
    }

    private static function makeRequest($client, $inputSoftware) {

        return $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/conversationgpt4', [
            'body' => '{
            "messages": [
                {
                    "role": "user",
                    "content": "give me a json with only the fields Operating system, CPU, Memory, GPU, Storage with minumun and suggested hardware specifications of' .  $inputSoftware . ' formatted in the following way, with the value of the key with only 20 characters, following the exact same formatting: {\"minumum\":{\"Operating system\":\"Operating system\", \"CPU\":\"CPU\", \"Memory\":\"Memory\", \"GPU\":\"GPU\"}, \"suggested\":{\"Operating system\":\"Operating system\", \"CPU\":\"CPU\", \"Memory\":\"Memory\", \"GPU\":\"GPU\"}}"
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
                'X-RapidAPI-Key' => 'b08cfc8cdemsh4fa841c5710a053p1efa2bjsn04fd2f2ec701',
                'content-type' => 'application/json',
            ],
        ])->getBody();
    }

    private static function makeFakeRequest($client, $inputSoftware) {

        //return '{"result":"Here is the JSON format for The Last of Us hardware specifications:```json{    \"Operating System\": {        \"Minimum\": \"Windows 7 (64-bit)\",        \"Recommended\": \"Windows 10 (64-bit)\"    },    \"CPU\": {        \"Minimum\": \"Intel Core i3-560 @ 3.3GHz or AMD Phenom II X4 945\",        \"Recommended\": \"Intel Core i5-2500K @ 3.3GHz or AMD FX-8320 @ 3.5GHz\"    },    \"Memory\": {        \"Minimum\": \"4 GB RAM\",        \"Recommended\": \"8 GB RAM\"    },    \"GPU\": {        \"Minimum\": \"NVIDIA GeForce GTX 660 / AMD Radeon HD 7870 (2GB VRAM)\",        \"Recommended\": \"NVIDIA GeForce GTX 970 (4GB) / AMD Radeon R","status":true,"server_code":1}';
        return '{"result":"Here is the JSON you requested for Counter Strike 2 with minimum and suggested hardware specifications:```json{    \"minimum\": {        \"Operating system\": \"Windows 7 (32/64-bit)\",        \"CPU\": \"Intel Core Duo E6600 or AMD Phenom X3 8750 processor or better\",        \"Memory\": \"2 GB RAM\",        \"GPU\": \"Video card must be 256 MB or more and should be a DirectX 9-compatible with support for Pixel Shader 3.0\",        \"Storage\": \"15 GB available space\"    },    \"suggested\": {        \"Operating system\": \"Windows 10 (64-bit)\",        \"CPU\": \"Intel i5 3rd generation / AMD FX-8350 or equivalent\",        \"Memory\": \"8 GB RAM\",        \"GPU\": \"NVIDIA GeForce GTX 960 / ATI Radeon HD 7950 with 2GB VRAM or better\",        \"Storage\":"a"}}';
    }

    public static function parseBody($inputString) {
        
        $inputString = explode("```json", $inputString)[1];
        
        $inputString = explode("```", $inputString)[0];

        $inputString = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $inputString);
        $inputString = str_replace('\n', '', $inputString);
        $inputString = stripslashes($inputString);
        $inputString = str_replace('  ', '', $inputString);
        //$inputString = preg_replace('/(?<!\\\\)":\s*(?<!\\\\)"|\s*\\\\n\s*/', '', $inputString);


        //return $inputString;
        $decodedJson = json_decode($inputString, true);

        return $decodedJson;
    }
}
