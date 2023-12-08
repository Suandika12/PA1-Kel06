<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporPertamanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporPertamananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = LaporPertamanan::paginate(10);
   
        return view('page.web.lapor.lapor', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.web.lapor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'judul' => 'required',
            'Isi_Keluhan' => 'required',
            'Choose_File' => 'required',
        ]);
        
        $file = $request->file('Choose_File');
        $namafile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';
        

        $file->move($tujuanFile,$namafile);
        if(Auth::check()){
        $lapor = new LaporPertamanan;
        $lapor->id_user = Auth::user()->id;
        $lapor->judul = $request->judul;
        $lapor->Isi_Keluhan = $request->Isi_Keluhan;
        $lapor->Choose_File = $namafile;
        $lapor->save();
         }else{
            $lapor = new LaporPertamanan;
            $lapor->judul = $request->judul;
            $lapor->Isi_Keluhan = $request->Isi_Keluhan;
            $lapor->Choose_File = $namafile;
            $lapor->save();
         }
        return redirect('lapor')->with('success', 'Laporan Telah Dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporPertamanan  $laporPertamanan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporPertamanan $lapor)
    {
        return view('page.web.lapor.show',['lapor'=> $lapor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporPertamanan  $laporPertamanan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporPertamanan $laporPertamanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporPertamanan  $laporPertamanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporPertamanan $laporPertamanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporPertamanan  $laporPertamanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporPertamanan $lapor)
    {
        $lapor->delete();
        return redirect('lapor')->with('delete', 'Laporan  berhasil dihapus');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAllApi(Request $request)
    {
        $ids = $request->ids;
        DB::table("lapor_pertamanan")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
    }
}
