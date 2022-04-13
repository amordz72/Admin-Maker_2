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

        //
        for ($i = 1; $i < 2; $i++) {
            DB::table('tbls')->insert([
                'name' => "category",
                'project_id' => $i,

            ]);
            DB::table('tbls')->insert([
                'name' => "post",
                'project_id' =>  $i,

            ]);
}






    }
}
