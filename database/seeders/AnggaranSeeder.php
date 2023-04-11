<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggarans')->insert([
            'program_id' => 1,
            'nama_anggaran' => 'Dana Darurat',
            'deskripsi' => 'a',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('anggarans')->insert([
            'program_id' => 1,
            'nama_anggaran' => 'Dana Amal',
            'deskripsi' => 'a',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('anggarans')->insert([
            'program_id' => 1,
            'nama_anggaran' => 'Dana Pinjam',
            'deskripsi' => 'a',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('anggarans')->insert([
            'program_id' => 1,
            'nama_anggaran' => 'Dana P',
            'deskripsi' => 'a',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('anggarans')->insert([
            'program_id' => 1,
            'nama_anggaran' => 'Dana P',
            'deskripsi' => 'a',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
