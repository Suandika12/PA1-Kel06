<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('page.web.dashboard.main');
    }
    public function about(){
        return view('page.web.dashboard.about');
    }
    public function about1(){
        return view('page.web.dashboard.about1');
    }
    public function about2(){
        return view('page.web.dashboard.about2');
    }
    public function forum(){
        return view('page.web.dashboard.forum');
    }
    public function contact(){
        return view('page.web.dashboard.contact');
    }
}
