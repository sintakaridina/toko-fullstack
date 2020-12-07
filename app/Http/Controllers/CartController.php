<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Cart;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        
    if (empty($carts)){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
    return view('cart.index', ['carts' => $carts]);
    }
    else{
    $carts = Cart::where('user_id', Auth::user()->id)->first();
    $cartsBarang = DB::table('carts')
            ->join('barangs', 'carts.barang_id', '=', 'barangs.id')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->get();
    return view('cart.index', ['cartsBarang' => $cartsBarang]);
    }
    }

    public function add(Request $request, $id)
{
$cart    = Cart::where('user_id', Auth::user()->id);
$barang  = Barang::where('id', $id)->first();
$tanggal = Carbon::now();
// validasi apakah melebihi stock
if($request->jumlah_pesan > $barang->stok) {
return redirect('pesan/'.$id);
}
// cek validasi
$cek_cart = Cart::where('barang_id', $barang->id)->first();
// simpan ke database pesanan
if (empty($cek_cart)) {
$cart                = new Cart;
$cart->user_id       = Auth::user()->id;
$cart->barang_id     = $barang->id;
$cart->jumlah_barang = $request->jumlah_pesan;
$cart->jumlah_harga  = $barang->harga;
$cart->save();
return redirect()->route('cart')
                        ->with('success','Barang berhasil ditambahkan ke keranjang.');
}
else {
    $cart         = Cart::where('barang_id', $barang->id)->where('id', $cek_cart->id)->first();
    $cart->jumlah_barang = $cart->jumlah_barang+$request->jumlah_pesan;
    // harga sekarang
    $harga_cart_baru    = $barang->harga*$request->jumlah_pesan;
    $cart->jumlah_harga = $cart->jumlah_harga+$harga_cart_baru;
    $cart->update();
    return redirect()->route('cart')
                        ->with('success','Barang berhasil ditambahkan ke keranjang.');
    }
// // jumlah total
// $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
// $pesanan->jumlah_harga = $pesanan->jumlah_harga+ $barang->harga*$request->jumlah_pesan;
// $pesanan->update();
// return redirect('home');
}

public function checkout()
{
    $tanggal = Carbon::now();
    // menghapus data berdasarkan id yang dipilih
    $cart         = Cart::where('user_id', Auth::user()->id)->get();
    $x=$cart->count();
    for($i = 1;$i<=$x;$i++){
        $cart         = Cart::where('user_id', Auth::user()->id)->first();
        $barang  = Barang::where('id', $cart->barang_id)->first();
    $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
    // simpan ke database pesanan
    if (empty($cek_pesanan)) {
    $pesanan = new Pesanan;
    $pesanan->user_id = Auth::user()->id;
    $pesanan->tanggal = $tanggal;
    $pesanan->status = 0;
    $pesanan->jumlah_harga = 0;
    $pesanan->save();
    }
    // simpan ke database pesanan detail
$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
// cek pesanan detail
$cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
if (empty($cek_pesanan_detail)) {
$pesanan_detail = new PesananDetail;
$pesanan_detail->barang_id = $barang->id;
$pesanan_detail->pesanan_id = $pesanan_baru->id;
$pesanan_detail->jumlah = $cart->jumlah_barang;
$pesanan_detail->jumlah_harga = $barang->harga*$cart->jumlah_barang;
$pesanan_detail->save();
} else {
$pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
$pesanan_detail->jumlah = $pesanan_detail->jumlah+$cart->jumlah_barang;
// harga sekarang
$harga_pesanan_detail_baru = $barang->harga*$cart->jumlah_barang;
$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
$pesanan_detail->update();
}
// jumlah total
$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
$pesanan->jumlah_harga = $pesanan->jumlah_harga+ $barang->harga*$cart->jumlah_barang;
$pesanan->update();

    }
    $cart         = Cart::where('user_id', Auth::user()->id);
    $cart->delete();
	// alihkan halaman ke halaman
	return redirect('/home');
}
public function delete($id)
{
    // menghapus data berdasarkan id yang dipilih
    $cart         = Cart::where('barang_id', $id);
    $cart->delete();
	// alihkan halaman ke halaman
    return redirect('/cart')
    ->with('success','Barang berhasil dihapus.');;
}
}
