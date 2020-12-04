<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {
        $pesananVerif = Pesanan::where('status', '1')->get(); 
        $pesananNonVerif = Pesanan::where('status', '0')->get(); 

        return view('admin.verifikasi', ['pesananNonVerif' => $pesananNonVerif , 'pesananVerif' => $pesananVerif]); 
    }

    public function update($id, Request $request)
{
 
    $pesanan = Pesanan::find($id);
    $pesanan->status = 1;
    $pesanan->save();
    return redirect()->route('admin/verifikasi')
                        ->with('success','Berhasil Verifikasi!');
}
}
