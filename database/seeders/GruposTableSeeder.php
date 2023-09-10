<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Grupo::insert([
            ['nome' => 'Grupo I',
             "created_at"=>"2023-09-07 19:13:04"
            ],

         ]);
    }
}
