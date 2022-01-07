<?php

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Inserting Cards
       DB::table('cards')->insert([
            'task' => 'Agregar subtareas al kanban',
            'category_id' => 1,
            'user_id' => 1,
            'color' => 'yellow',
            'end_date' => '2022-02-02'

        ]);
       DB::table('cards')->insert([
            'task' => 'Testing Kanban',
            'category_id' => 2,
            'user_id' => 1,
            'color' => 'yellow',
            'end_date' => '2022-02-02'

        ]);
    }
}
