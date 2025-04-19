<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;
    public function aircraft()
    {
        return $this->hasMany(Aircraft::class);
    }
}
