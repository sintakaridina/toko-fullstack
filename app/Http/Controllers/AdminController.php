<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
{
   $this->middleware('auth:admin');
}
// protected $guard = 'admin';
    public function home()
    {
    return view('admin.home');
    }

    public function index()
    {
        $posts = Barang::latest()->paginate(5);
 
        return view('admin.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('admin.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
            'keterangan' => 'required',
        ]);
 
        Barang::create($request->all());
 
        return redirect()->route('post.index')
                        ->with('success','Barang berhasil ditambahkan.');
    }
 
    public function show(Barang $post)
    {
        return view('admin.show',compact('post'));
    }
 
    public function edit(Barang $post)
    {   
        return view('admin.edit',compact('post'));
    }
 
    public function update(Request $request, Barang $post)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('post.index')
                        ->with('success','Barang berhasil diupdate!');
    }
 
    public function destroy(Barang $post)
    {
        $post->delete();
 
        return redirect()->route('post.index')
                        ->with('success','Barang berhasil dihapus.');
    }
}
