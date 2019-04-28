<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'Sergio Lobaton',
            'email'=>'lobaton.0722@gmail.com',
            'password'=>bcrypt('sergio123!')]
        );

        App\User::create([
            'name'=>'test',
            'email'=>'test@gmail.com',
            'password'=>bcrypt('sergio123!')]
        );
    }
}
