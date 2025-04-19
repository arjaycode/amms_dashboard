<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
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
            //     'active',              // Fully operational and in service
            //     'scheduled_maintenance', // Planned maintenance upcoming
            //     'under_maintenance',   // Currently being serviced
            //     'grounded',            // Not allowed to fly due to issues
            //     'awaiting_parts',      // Waiting for replacement parts
            //     'inspection_due',      // Needs a routine inspection
            //     'test_flight',         // Undergoing post-maintenance testing
            //     'retired',             // Permanently out of service
            //     'decommissioned',      // Removed from fleet
            // ]),
        ];
    }
}
