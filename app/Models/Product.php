<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_description',
        'benefits',
        'life_cycle',
        'intellectual_property',
        'status',
        'profile_id',
        'user_id'
    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
