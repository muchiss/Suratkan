<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('staff')->insert([
            'nama_staff' => 'Bambang',
            'no_staff' => '1000',
            'alamat' => 'Surabaya',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('staff')->insert([
            'nama_staff' => 'Nur',
            'no_staff' => '1001',
            'alamat' => 'Malang',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('staff')->insert([
            'nama_staff' => 'Santo',
            'no_staff' => '1002',
            'alamat' => 'Jember',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
