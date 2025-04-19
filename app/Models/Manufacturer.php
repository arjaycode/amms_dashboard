<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name', 'contact_info', 'address'];
    /** @use HasFactory<\Database\Factories\ManufacturerFactory> */
    use HasFactory;
    public function aircraft()
    {
        return $this->hasMany(Aircraft::class);
    }
}
