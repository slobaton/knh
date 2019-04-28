<?php

use Illuminate\Database\Seeder;
use App\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'partner_name' => 'CETM',
            'partner_email' => 'maria.galindo.siza@gmail.com',
            'partner_phone' => '4504903',
            'partner_location' => 'Calle Tablas, esquina Av. Fuerza Aerea # 836, Zona Jaihuayco',
            'partner_city' => 'cbba',
        ]);

        Partner::create([
            'partner_name' => 'CESATCH',
            'partner_email' => 'cesatch@gmail.com',
            'partner_phone' => '6442685',
            'partner_location' => 'Calle B. Santa Teresa, cerca Facultad de Enfermeria del UMRPSFXCH',
            'partner_city' => 'sc',
        ]);
    }
}
