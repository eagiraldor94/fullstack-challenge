<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Inserting Categories
       DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Buffer'
        ]);
       DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Working'
        ]);
       DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Done'
        ]);
    }
}
