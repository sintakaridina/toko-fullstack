<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first(); 

        return view('profil.index', ['user' => $user]); 
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->nama;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->update();
 
        return redirect()->route('edit-profil')
                        ->with('success','Berhasil ubah informasi profil!');
    }
}
