<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            ['id' => 1, 'nama' => 'elliana', 'email' => 'elliana@mailtracking.com', 'password' => bcrypt('qwerty'), 'no_hp' => '085735456721', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'alfiatul', 'email' => 'alfiatul@mailtracking.com', 'password' => bcrypt('qwerty'), 'no_hp' => '085756987123', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nama' => 'aqidatul', 'email' => 'aqidatul@mailtracking.com', 'password' => bcrypt('qwerty'), 'no_hp' => '085735456721', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nama' => 'muchlis', 'email' => 'muchlis@mailtracking.com', 'password' => bcrypt('qwerty'), 'no_hp' => '085735456721', 'created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
