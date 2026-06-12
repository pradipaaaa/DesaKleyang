<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageStatistic extends Model
{
    protected $fillable = [
        'total_population', 'male_population', 'female_population',
        'total_families', 'total_dusun', 'total_rw', 'total_rt',
        'total_umkm', 'total_officials', 'year',
    ];

    protected $casts = [
        'total_population' => 'integer',
        'male_population'  => 'integer',
        'female_population'=> 'integer',
        'total_families'   => 'integer',
        'total_dusun'      => 'integer',
        'total_rw'         => 'integer',
        'total_rt'         => 'integer',
        'total_umkm'       => 'integer',
        'total_officials'  => 'integer',
    ];
}
