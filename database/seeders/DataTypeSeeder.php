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
            'boolean',
            'unsignedBigInteger', 'date', 'dateTime', 'decimal', 'double', 'float',
           'nullableTimestamps', 'timestamp', 'timestamps', 'rememberToken', 'increments',
        ];
        for ($i = 0; $i < count($types); $i++) {
            DB::table('data_types')->insert([
                'name' => $types[$i],

            ]);
        }

    }
}
