<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.auth.login');
    }

    
    public function plugin(){
        return view('company.plugin.index');
    }
}
