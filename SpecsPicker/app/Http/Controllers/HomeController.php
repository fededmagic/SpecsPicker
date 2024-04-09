<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData['title'] = 'SpecsPicker';
        $viewData['subtitle'] = 'Search the minimum hardware specs for a software!';
        $viewData['result'] = "";

        $request->validate([
            'txtInput' => "required | max:255",
        ]);

        $viewData = $request->input('txtInput');
        return view('home.index')->with("viewData", $viewData);
    }
}
