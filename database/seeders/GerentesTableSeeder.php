<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gerente;
class GerentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gerente::insert([
            ['nome' => 'Ivan Amado Cardoso',
            'email' => 'peacevan@hotmail.com',
            'nivel'=> 2,
            'id_user' => 1,
            ],
            ['nome' => 'Samile De Jesus Amado',
            'email' => 'samile@hotmail.com',
            'nivel'=> 1,
            'id_user' => 2]
        ]);

    }
}
