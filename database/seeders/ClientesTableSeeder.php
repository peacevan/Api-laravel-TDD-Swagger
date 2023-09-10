<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::insert([
            ['cnpj' => '0221402132121',
            'nome' => 'Transportadora Teste',
            'id_grupo' => 3,
            'data_fundacao' => '2010-05-17'],
            ['cnpj' => '0221402132121',
            'nome' => 'Transportadora Teste II',
            'id_grupo' => 3,
            'data_fundacao' => '2010-05-17'],

            ['cnpj' => '0221402132121',
            'nome' => 'Transportadora Teste III',
            'id_grupo' => 3,
            'data_fundacao' => '2010-05-17'],

            ['cnpj' => '0221402132121',
            'nome' => 'Transportadora Teste IV',
            'id_grupo' => 3,
            'data_fundacao' => '2010-05-17'],

            ['cnpj' => '0221402132121',
            'nome' => 'Transportadora Teste V',
            'id_grupo' => 3,
            'data_fundacao' => '2010-05-17'],
        ]

    );
    }
}
