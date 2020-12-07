<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id', 'barang_id', 'jumlah_barang', 'jumlah_harga'
  ];
    public function barang()
{
   return $this->belongsTo('App\Barang','barang_id', 'id');
}
public function user()
{
  return $this->belongsTo('App\User','user_id', 'id');
}
}
