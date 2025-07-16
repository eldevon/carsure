<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'policy_id',
        'first_name',
        'last_name',
        'age',
        'gender',
        'marital_status',
        'license_number',
        'license_state',
        'license_status',
        'license_effective_date',
        'license_expiration_date',
        'license_class',
    ];

    // protected $casts = [
    //     'license_effective_date' => 'date',
    //     'license_expiration_date' => 'date',
    //     'is_primary_driver' => 'boolean'
    // ];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getLicenseInfoAttribute()
    {
        return "{$this->license_number} ({$this->license_state})";
    }

    // public function hasCleanRecord()
    // {
    //     return empty($this->accident_history) && empty($this->violation_history);
    // }
}
