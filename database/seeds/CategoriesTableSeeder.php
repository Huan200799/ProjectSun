<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'categories_name'=>"Đồ Ăn",
                'parent_id'=> null
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
