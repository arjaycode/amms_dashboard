<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->randomElement([
            //     'Boeing',
            //     'Airbus',
            //     'Embraer',
            //     'Bombardier',
            //     'Cessna',
            //     'Gulfstream Aerospace',
            //     'Lockheed Martin',
            //     'McDonnell Douglas',
            //     'Dassault Aviation',
            //     'Sukhoi',
            // ]),
            // 'contact_info' => fake()->phoneNumber(),
            // 'address' => fake()->address(),
        ];
    }
}
