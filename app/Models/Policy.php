<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Policy extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id', 'policy_no', 'status', 'type', 
        'effective_date', 'expiration_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
