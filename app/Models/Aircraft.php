<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $fillable = ['model', 'date_of_manufacture', 'manufacturer_id', 'status_id', 'is_deleted', 'deleted_at'];
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
