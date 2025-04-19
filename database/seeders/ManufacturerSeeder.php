<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manufacturers = [
            [
                'name' => 'Boeing',
                'contact_info' => '+1 800-123-4567',
                'address' => '100 N Riverside Plaza, Chicago, IL, USA',
            ],
            [
                'name' => 'Airbus',
                'contact_info' => '+33 5 61 93 33 33',
                'address' => 'Airbus HQ, Blagnac, France',
            ],
            [
                'name' => 'Embraer',
                'contact_info' => '+55 12 3927-1000',
                'address' => 'Av. Brigadeiro Faria Lima, São José dos Campos, Brazil',
            ],
            [
                'name' => 'Bombardier',
                'contact_info' => '+1 514-861-9481',
                'address' => '800 René-Lévesque Blvd W, Montreal, QC, Canada',
            ],
            [
                'name' => 'Cessna',
                'contact_info' => '+1 316-517-6056',
                'address' => '1 Cessna Blvd, Wichita, KS, USA',
            ],
            [
                'name' => 'Gulfstream Aerospace',
                'contact_info' => '+1 912-965-3000',
                'address' => '500 Gulfstream Rd, Savannah, GA, USA',
            ],
            [
                'name' => 'Lockheed Martin',
                'contact_info' => '+1 301-897-6000',
                'address' => '6801 Rockledge Dr, Bethesda, MD, USA',
            ],
            [
                'name' => 'McDonnell Douglas',
                'contact_info' => '+1 314-232-0232',
                'address' => 'St. Louis, MO, USA',
            ],
            [
                'name' => 'Dassault Aviation',
                'contact_info' => '+33 1 47 11 40 00',
                'address' => '9 Rond-Point des Champs-Élysées, Paris, France',
            ],
            [
                'name' => 'Sukhoi',
                'contact_info' => '+7 495 123-4567',
                'address' => '23B Polikarpova St, Moscow, Russia',
            ],
        ];

        foreach ($manufacturers as $data) {
            Manufacturer::create([
                'name' => $data['name'],
                'contact_info' => $data['contact_info'],
                'address' => $data['address'],
            ]);
        }

        // Manufacturer::factory()->count(10)->create();
    }
}
