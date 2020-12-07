<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayarans";
 
    protected $fillable = ['user_id','pesanan_id','file'];
}