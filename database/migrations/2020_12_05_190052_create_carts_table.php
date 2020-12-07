<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {
     Schema::create('carts', function (Blueprint $table) {
       $table->bigIncrements('id');
       $table->integer('user_id');
       $table->integer('barang_id');
       $table->integer('jumlah_barang');
       $table->integer('jumlah_harga');
       $table->timestamps();
   });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}