<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik');
            $table->string('nama_produk')->unique();
            $table->string('harga');
            $table->text('desc');
            $table->integer('Quantity');
            $table->enum('status',['active','inactive']);
            $table->string('image');
            $table->integer('jumlah_terjual')->nullable();
            $table->integer('id_kategori');
            $table->rememberToken();
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
        Schema::dropIfExists('produk');
    }
}
