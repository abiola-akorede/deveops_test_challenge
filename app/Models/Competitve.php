<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitve extends Model
{
    use HasFactory;

    protected $fillable = [
        'direct_competitors',
        'indirect_competitors',
        'competitive_edge',
        'status',
        'user_id',
        'profile_id',
    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
