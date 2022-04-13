<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = [
            'string',
            'text',
            'integer',
            'unsignedBigInteger',
        ];
        for ($i = 0; $i < count($types); $i++) {
            DB::table('data_types')->insert([
                'name' => $types[$i],

            ]);
        }

    }
}
