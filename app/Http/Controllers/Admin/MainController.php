<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function login(){
        return view('admin.master');
    }

    public function dashboard(){
        return view('admin.layout.layout');
    }
}
