<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'active',              // Fully operational and in service
            'scheduled_maintenance', // Planned maintenance upcoming
            'under_maintenance',   // Currently being serviced
            'grounded',            // Not allowed to fly due to issues
            'awaiting_parts',      // Waiting for replacement parts
            'inspection_due',      // Needs a routine inspection
            'test_flight',         // Undergoing post-maintenance testing
            'retired',             // Permanently out of service
            'decommissioned',      // Removed from fleet
        ];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['name' => $status]);
        }
        // Status::factory()->count(9)->create();
    }
}
