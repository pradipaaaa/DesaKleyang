<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name', 'tagline', 'address', 'phone', 'email', 'website',
        'history', 'vision', 'mission', 'postal_code', 'district', 'regency', 'province',
        'area', 'altitude', 'north_border', 'south_border', 'east_border', 'west_border',
        'latitude', 'longitude', 'office_open', 'office_close', 'hero_image', 'village_logo',
    ];

    protected $casts = [
        'area' => 'decimal:2',
        'altitude' => 'integer',
    ];
}
