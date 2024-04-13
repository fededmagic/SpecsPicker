<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $viewData["result"] = $request->input('txtInput');
        return view('home.index')->with("viewData", $viewData);
    }
}
