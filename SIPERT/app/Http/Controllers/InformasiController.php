<?php

namespace App\Http\Controllers;

use App\Models\saran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index(Request $request){
        return view('page.web.dashboard.informasi');
    }
}
