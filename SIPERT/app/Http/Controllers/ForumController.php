<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Request $request){
        if($request->has('keyword')) {
            $saran = Saran::latest()->get();
        }
        else{
            $saran = Saran::latest()->get();
        }
        return view('page.web.dashboard.forum',[ 'saran'=>$saran]);
    }

    public function input_saran(Request $request)
    {
        $request->validate([
            'saran' => 'required',
        ]);
       $saran = new Saran;
       $saran->name = Auth::user()->name;
       $saran->saran = $request->saran;
       $saran->save();
       $saran = Saran::latest()->get();


       return view('page.web.dashboard.forum',[ 'saran'=>$saran]);
    }

}
