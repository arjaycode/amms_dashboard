<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $table = 'aircraft';
    protected $fillable = [
        'tail_number',
        'manufacturer_id',
        'model',
        'year_of_manufacture',
        'total_flight_hours',
        'total_landings',
        'last_maintenance_date',
        'next_maintenance_due',
        'status_id',
        'is_deleted',
        'deleted_at'
    ];
    /** @use HasFactory<\Database\Factories\AircraftFactory> */
    use HasFactory;

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
