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
        $this->call([ //qui dentro metto tutti i seeder in modo da poterli avviare anche tutti insieme con un solo comando "php artisan db:seed"
            ComicsTableSeeder::class,
        ]);
    }
}
