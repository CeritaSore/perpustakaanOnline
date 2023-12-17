<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $title = 'home';
        return view('frontend.home', compact('title'));
    }
    public function feature() {
        $title = 'feature';
        return view('frontend.feature', compact('title'));
        
    }
    public function popular() {
        $title = 'popular';
        return view('frontend.pop', compact('title'));
        
    }
    public function about() {
        $title = 'about';
        return view('frontend.about', compact('title'));
        
    }
}
