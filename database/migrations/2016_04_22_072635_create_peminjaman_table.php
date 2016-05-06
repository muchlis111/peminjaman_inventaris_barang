<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('peminjaman', function (Blueprint $table)
{
    $table->string('id');
    $table->string('nama_peminjam');
    $table->string('kelas');
    $table->string('jurusan');
    $table->string('id_barang');
    $table->datetime('tgl_pinjam');
    $table->datetime('tgl_kembali');
    $table->integer('status');
    $table->rememberToken();
    $table->timestamps();
//            $table->primary('id');
});
    }

/**
 * Reverse the migrations.
 *
 * @return void
 */
public
function down()
{
    Schema::drop('user');
}
}
