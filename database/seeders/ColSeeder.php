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

        $category = [
            [
                'name' => "category_",
                'type' => "string",
            ],

        ];
        $posts = [
            [
                'name' => "title_",
                'type' => "string",
            ],
            [
                'name' => "body",
                'type' => "text",
            ],

        ];

        //
        for ($i = 1; $i < 6; $i++) {
            foreach ($category as $key => $cat) {
                DB::table('cols')->insert([
                    'name' => $cat['name'],
                    'type' => $cat['type'],
                    'tbl_id' => $i,

                ]);
            }
        }
        for ($i = 1; $i < 6; $i++) {
            foreach ($posts as $key => $post) {
                DB::table('cols')->insert([
                    'name' => $post['name'],
                    'type' => $post['type'],
                    'tbl_id' => $i,

                ]);
            }
        }

    }
}
