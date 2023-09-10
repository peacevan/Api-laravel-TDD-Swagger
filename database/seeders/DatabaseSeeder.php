<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::insert([
            ['name' => 'Ivan Amado Cardoso',
             'email' => 'peacevan2@hotmail.com',
             'nivel'=> 2,
             'password' => '$2y$10$SQkC5qjkx.fuKj5vJcgqauD6aDA4Afnkpin36/gBZCH6ED9eFXQaK',
             "created_at"=>"2023-09-07 19:13:04"
            ],
            ['name' => 'Samile Amado de Jesus',
             'email' => 'samile2@hotmail2.com',
             'nivel'=> 1,
             'password' => '$2y$10$SQkC5qjkx.fuKj5vJcgqauD6aDA4Afnkpin36/gBZCH6ED9eFXQaK',
             "created_at"=>"2023-09-07 19:13:04"

             ]
         ]);
    }
}
