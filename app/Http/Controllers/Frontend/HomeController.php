<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){
        return view('frontend.layouts.home');
    }

    public function aboutPage(){
        return view('frontend.pages.about');
    }

    public function jobPage(){
        return view('frontend.pages.job-list');
    }

    public function blogPage(){
        return view('frontend.pages.blog');
    }

    public function contactPage(){
        return view('frontend.pages.contact');
    }
}
