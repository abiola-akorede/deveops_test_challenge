<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'analysis',
        'target_market',
        'market_needs',
        'market_growth',
        'status',
        'profile_id',
        'user_id'
    ];


    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
