<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shopping_items')->insert([
            [
                'name' => 'Bread',
                'qty' => '2',
            ],
            [
                'name' => 'Milk',
                'qty' => '2',
            ],
            [
                'name' => 'Cheese',
                'qty' => '2',
            ]
        ]);
    }
}
