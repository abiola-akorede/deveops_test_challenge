<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    use HasFactory;

    protected $fillable = [
        'operational_workflow',
        'production_plan',
        'supply_chain',
        'quality_control',
        'status',
        'profile_id',
        'user_id',
    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
