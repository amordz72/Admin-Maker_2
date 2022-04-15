<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tbls = ["category", "post", "user"];

     for ($i=1; $i < 6; $i++) {

        foreach ($tbls as $key => $t) {
            DB::table('tbls')->insert([
                'name' => $t,
                'project_id' => $i,

            ]);

        }}

    }
}
