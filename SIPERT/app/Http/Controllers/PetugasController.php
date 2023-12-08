<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class PetugasController extends Controller
{
    public function index()
    {
        $collection = User::where('role','=','user')->paginate(10);
        return view('page.web.petugas.petugas', compact('collection'));
    }

    public function create()
    {
        return view('page.web.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $petugas = new User;
        $petugas->name = $request->name;
        $petugas->username = $request->username;
        $petugas->email = $request->email;
        $petugas->password = Hash::make($request->password);
        $petugas->save();
        return redirect('petugas')->with('success', ' Petugas Terdaftar');
    }

    public function show(User $user)
    {
       //
    }

    public function edit(User $petuga)
    {
        return view('page.web.petugas.edit',['user'=> $petuga]);
    }

    public function update(Request $request, User $petuga)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $petuga->name = $request->name;
        $petuga->username = $request->username;
        $petuga->email = $request->email;
        $petuga->password = Hash::make($request->password);
        $petuga->save();
        return redirect('petugas')->with('success', 'Petugas Terdaftar');
    }

    public function destroy(User $petuga)
    {
        $petuga->delete();
        return redirect('petugas')->with('delete', 'Petugas berhasil dihapus');
    }
}
