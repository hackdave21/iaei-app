<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.placeholder');
    }

    public function divisions()
    {
        return view('frontend.placeholder');
    }

    public function clients()
    {
        return view('frontend.placeholder');
    }

    public function projects()
    {
        return view('frontend.placeholder');
    }

    public function faq()
    {
        return view('frontend.placeholder');
    }
}
