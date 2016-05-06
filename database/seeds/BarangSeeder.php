<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('barang')->truncate();
            DB::table('barang')->insert([
                ['id' => 1,  'nama_barang' => 'lcd', 'jumlah' => '1', 'status' => 'ada', 'created_at' => \Carbon\Carbon::now()],
                ['id' => 2,  'nama_barang' => 'kabel vga', 'jumlah' => '6', 'status' => 'ada', 'created_at' => \Carbon\Carbon::now()],
                ['id' => 3,  'nama_barang' => 'lcd', 'jumlah' => '1', 'tidak status' => 'ada', 'created_at' => \Carbon\Carbon::now()],
                ['id' => 4,  'nama_barang' => 'gunting', 'jumlah' => '3', 'status' => 'ada',  'created_at' => \Carbon\Carbon::now()],
            ]);
        }
    }
}
