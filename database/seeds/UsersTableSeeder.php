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
            'password'=>bcrypt('123456')]
        );
    }
}
