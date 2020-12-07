<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang', 'harga', 'stok', 'gambar', 'keterangan'
    ];
    public function pesanan_detail()
{
   return $this->hasMany('App\PesananDetail','barang_id','id');
}
public function cart()
{
   return $this->hasMany('App\Cart','barang_id','id');
}
}
