<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Inserting default user with known password
       DB::table('users')->insert([
            'name' => 'Test User Admin',
            'email' => 'admin@mailinator.com',
            'password' => bcrypt('admin')
        ]);
       //Seeding fake data
       factory(User::class,49)->create();
    }
}
