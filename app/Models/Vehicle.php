<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'policy_id',
        'year',
        'make',
        'model',
        'vin',
        'usage',
        'primary_use',
        'annual_mileage',
        'ownership',
        'garaging_street',
        'garaging_city',
        'garaging_state',
        'garaging_zip',
    ];

    // protected $casts = [
    //     'is_primary' => 'boolean',
    //     'has_anti_theft' => 'boolean',
    //     'has_safety_features' => 'boolean'
    // ];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function coverages()
    {
        return $this->hasMany(Coverage::class);
    }

    public function getFullDescriptionAttribute()
    {
        return "{$this->year} {$this->make} {$this->model}";
    }

    public function getGaragingAddressAttribute()
    {
        return "{$this->garaging_street}, {$this->garaging_city}, {$this->garaging_state} {$this->garaging_zip}";
    }

    // public function hasFullCoverage()
    // {
    //     return $this->coverages->where('type', 'Comprehensive')->isNotEmpty() && 
    //            $this->coverages->where('type', 'Collision')->isNotEmpty();
    // }
}
