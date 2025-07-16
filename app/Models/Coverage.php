<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coverage extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'type',
        'limit',
        'deductible',
    ];

    // protected $casts = [
    //     'limit' => 'decimal:2',
    //     'deductible' => 'decimal:2',
    //     'premium' => 'decimal:2',
    //     'is_active' => 'boolean',
    //     'effective_date' => 'date',
    //     'expiration_date' => 'date'
    // ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getFormattedLimitAttribute()
    {
        return '$' . number_format($this->limit, 2);
    }

    public function getFormattedDeductibleAttribute()
    {
        return '$' . number_format($this->deductible, 2);
    }

    // public function getFormattedPremiumAttribute()
    // {
    //     return '$' . number_format($this->premium, 2);
    // }

    // public function isActive()
    // {
    //     return $this->is_active && now()->between($this->effective_date, $this->expiration_date);
    // }
}
