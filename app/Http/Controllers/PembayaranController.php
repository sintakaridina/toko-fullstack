<?php
 
namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use DB;
use Auth;
 
 
class PembayaranController extends Controller
{
	public function __construct()
    {
       $this->middleware('auth');
    }
	public function upload(){
		$gambar = DB::table('pembayarans')
            ->join('pesanans', 'pembayarans.pesanan_id', '=', 'pesanans.id')
            ->where('pembayarans.user_id', Auth::user()->id)
			->get();
		$pembayaran=Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->get();

		return view('verif.index',['gambar' => $gambar], ['pembayaran' => $pembayaran]);
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploads';
		$file->move($tujuan_upload,$nama_file);
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
		Pembayaran::create([
            'file' => $nama_file,
            'user_id' => Auth::user()->id,
            'pesanan_id' => $pesanan->id,
		]);
 
		return redirect()->back();
	}
	public function delete($id)
{
    // menghapus data berdasarkan id yang dipilih
    $gambar         = Pembayaran::where('user_id', Auth::user()->id)->first();
    $gambar->delete();
	// alihkan halaman ke halaman
    return redirect('/verif')
    ->with('success','Gambar dihapus.');;
}
}