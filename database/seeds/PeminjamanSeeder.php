<?php

use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjaman')->truncate();
        DB::table('peminjaman')->insert([
            ['id' => 111, 'nama_peminjam' => 'elliana',  'kelas' =>'RPL2', 'jurusan' =>'RPL', 'id_barang' => '1','tgl_pinjam' => '01','tgl_kembali' => '11','status' => '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 112, 'nama_peminjam' => 'alfiatul', 'kelas' =>'RPL3', 'jurusan' =>'RPL', 'id_barang' => '2','tgl_pinjam' => '02','tgl_kembali' => '12','status' => '0', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 113, 'nama_peminjam' => 'aqidatul','kelas'  =>'RPL3', 'jurusan' =>'RPL', 'id_barang' => '3','tgl_pinjam' => '03','tgl_kembali' => '13','status' => '0', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 114, 'nama_peminjam' => 'muchlis', 'kelas'  =>'RPL5', 'jurusan' =>'RPL', 'id_barang' => '4','tgl_pinjam' => '04','tgl_kembali' => '14','status' => '1',  'created_at' => \Carbon\Carbon::now()],
        ]);
    }


}
