<?php

namespace App\Http\Controllers;

//require 'vendor/autoload.php';
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{

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

        return $response->getBody();
    }

    private static function makeRequest($client, $inputSoftware) {

        return $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/conversationgpt4', [
            'body' => '{
            "messages": [
                {
                    "role": "user",
                    "content": "give me a json without \n with minumun and suggested hardware specifications of ' 
                    . $inputSoftware . '"
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
    }
}
