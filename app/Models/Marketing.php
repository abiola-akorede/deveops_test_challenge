<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'marketing_plan',
        'sales_strategies',
        'sales_forcast',
        'customer_acquisition_strategies',
        'status',
        'profile_id',
        'user_id',

    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
