<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\JadwalExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UpdateJadwalRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $collection = Jadwal::orderBy('id', 'DESC')->paginate(10);
            $jadwal = Jadwal::orderBy('id','DESC')->first();
        }else{
            $collection = Jadwal::where('nama_petugas','=',Auth::user()->name)->paginate(10);
            $jadwal = Jadwal::orderBy('id','DESC')->first();
        }
        return view('page.web.jadwal.jadwal', compact('collection','jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.web.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJadwalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'lokasi' => 'required',
            'nama_petugas' => 'required',
            'tugas' => 'required',
        ]);
        
        $jadwal = new Jadwal;
        $jadwal->tanggal = Carbon::Parse($request->tanggal)->format('y-m-d');
        $jadwal->lokasi = $request->lokasi;
        $jadwal->nama_petugas = $request->nama_petugas;
        $jadwal->tugas = $request->tugas;
        $jadwal->save();
        return redirect('jadwal')->with('success', 'Jadwal mendaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        return view('page.web.jadwal.show',['jadwal'=> $jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('page.web.jadwal.edit',['jadwal'=> $jadwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadwalRequest  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required',
            'lokasi' => 'required',
            'nama_petugas' => 'required',
            'tugas' => 'required',
        ]);

        $jadwal->tanggal = Carbon::Parse($request->tanggal)->format('y-m-d');
        $jadwal->lokasi = $request->lokasi;
        $jadwal->nama_petugas = $request->nama_petugas;
        $jadwal->tugas = $request->tugas;
        $jadwal->save();
        return redirect('jadwal')->with('success', 'Jadwal mendaftar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect('jadwal')->with('delete', 'Jadwal berhasil dihapus');
    }
    public function export_excel()
	{
		return Excel::download(new JadwalExport, 'Jadwal Pemeliharaan Taman '.date('m-y').'.xlsx');
	}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAllApi(Request $request)
    {
        $ids = $request->ids;
        DB::table("jadwal")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Jadwal berhasil dihapus."]);
    }
 
}
