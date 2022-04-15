<?php

namespace Database\Seeders;

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
        $this->call([
            User::class,
            ProjectSeeder::class,
            DataTypeSeeder::class,
            TblSeeder::class,
            ColSeeder::class,
            /*

         */
        ]);
    }
}
