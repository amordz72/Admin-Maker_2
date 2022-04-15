<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    for ($i=1; $i < 6; $i++) {
        DB::table('projects')->insert([
            'name' => "project_".$i,

        ]);
    }
    }
}
