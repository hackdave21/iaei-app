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
        return view('frontend.about');
    }

    public function divisions()
    {
        return view('frontend.divisions');
    }


    public function faq()
    {
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function diaspora()
    {
        return view('frontend.diaspora');
    }

    public function mentionsLegales()
    {
        return view('frontend.mentions-legales');
    }
}
