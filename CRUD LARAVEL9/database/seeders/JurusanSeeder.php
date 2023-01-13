<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            'name'=>'Teknik Informtika',
        ]);
        DB::table('jurusan')->insert([
            'name'=>'Sistem Informasi',
        ]);
        DB::table('jurusan')->insert([
            'name'=>'Sistem Komputer',
        ]);
    }
}
