<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NavLogo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainIndex(){
        $navlogo=NavLogo::latest()->get();
        return view('frontend.master',compact('navlogo'));
    }
}
