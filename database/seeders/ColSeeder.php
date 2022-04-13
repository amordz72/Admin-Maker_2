<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = [
            'name' => "title",
            'type' => "string",
            'tbl_id' => 1,
        ];
        DB::table('cols')->insert([
            'name' => "title",
            'type' => "string",
            'tbl_id' => 1,

        ]);

     //
       for ($i = 1; $i < 6; $i++) {

            DB::table('cols')->insert([
                'name' => "title" . $i ,
                'type' => "string",
                'tbl_id' =>  $i,

            ]);
            DB::table('cols')->insert([
                'name' => "body" . $i,
                'type' => "string",
                'tbl_id' => $i,

            ]);
        }


    }
}
