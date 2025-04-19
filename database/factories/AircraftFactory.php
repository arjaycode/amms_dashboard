<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd(Manufacturer::inRandomOrder()->first()->id);
        return [
            'model' => fake()->randomElement([
                'Boeing 737',
                'Boeing 747',
                'Boeing 757',
                'Boeing 767',
                'Boeing 777',
                'Boeing 787 Dreamliner',
                'Airbus A220',
                'Airbus A300',
                'Airbus A310',
                'Airbus A320',
                'Airbus A321',
                'Airbus A330',
                'Airbus A340',
                'Airbus A350',
                'Airbus A380',
                'Embraer E170',
                'Embraer E190',
                'Embraer E195',
                'Bombardier CRJ200',
                'McDonnell Douglas MD-80',
            ]),
            'date_of_manufacture' => fake()->dateTimeBetween('1990-01-01', '2020-12-31')->format('Y-m-d'),
            'manufacturer_id' => Manufacturer::inRandomOrder()->first()->manufacturer_id,
            'status_id' => Status::inRandomOrder()->first()->id,
        ];
    }
}
