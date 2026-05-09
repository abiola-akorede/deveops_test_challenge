<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizational_structure',
        'management_team',
        'human_resources_plan',
        'advisors',
        'status',
        'user_id',
        'profile_id',
    ];


    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
