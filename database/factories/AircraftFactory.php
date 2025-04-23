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
            'tail_number' => $this->generateTailNumber(),
            'manufacturer_id' => Manufacturer::inRandomOrder()->first()->id,
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
            'year_of_manufacture' => fake()->numberBetween(1970, 2024),
            'total_flight_hours' => fake()->randomFloat(4, 0, 1000),
            'total_landings' => fake()->numberBetween(0, 100),
            'last_maintenance_date' => fake()->date('Y-m-d'),
            'next_maintenance_due' => fake()->date('Y-m-d'),
            'status_id' => Status::inRandomOrder()->first()->id,
            'is_deleted' => false,
            'deleted_at' => null,
        ];
    }

    public function generateTailNumber()
    {
        $prefix = fake()->randomElement(['N', 'G-', 'C-', 'D-', 'VH-', 'RP-']);
        $suffixRandomLength = fake()->randomElement([3, 4, 5]);
        $suffix = fake()->regexify("[A-Z0-9]{{$suffixRandomLength}}");
        return rtrim($prefix, '-') . $suffix;
    }
}
