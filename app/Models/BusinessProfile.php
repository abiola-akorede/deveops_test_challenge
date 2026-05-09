<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name', 'status', 'profile_id', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class, 'profile_id');
    }

    public function strategies()
    {
        return $this->hasMany(Strategy::class, 'profile_id');
    }

    public function financials()
    {
        return $this->hasMany(Financial::class, 'profile_id');
    }

    public function marketings()
    {
        return $this->hasMany(Marketing::class, 'profile_id');
    }

    public function managements()
    {
        return $this->hasMany(Management::class, 'profile_id');
    }
    public function competitives()
    {
        return $this->hasMany(Management::class, 'profile_id');
    }
    public function operational()
    {
        return $this->hasMany(Management::class, 'profile_id');
    }
    public function research()
    {
        return $this->hasMany(Management::class, 'profile_id');
    }
    public function products()
    {
        return $this->hasMany(Management::class, 'profile_id');
    }
}
