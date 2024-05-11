<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetStartedController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'SpecsPicker';
        $viewData['subtitle'] = 'Search the minimum hardware specs for a software!';

        return view('getstarted.index')->with("viewData", $viewData);
    }
}
