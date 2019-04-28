<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Sonia Elizabeth Pardo Burgoa',
            'position' => 'Directora Ejecutiva Rep. Legal',
            'cellphone' => '76430911',
            'partner_id' => 1
        ]);

        Contact::create([
            'name' => 'Victor Menchaca',
            'position' => 'Director Ejecutivo',
            'cellphone' => '72883202',
            'partner_id' => 2
        ]);
    }
}
