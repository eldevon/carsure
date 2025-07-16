<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PolicyHolder extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'policy_id',
        'first_name',
        'last_name',
        'street',
        'city',
        'state',
        'zip',
    ];

    // protected $casts = [
    //     'date_of_birth' => 'date'
    // ];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->zip}";
    }
}
