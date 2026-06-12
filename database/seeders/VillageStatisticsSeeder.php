<?php

namespace Database\Seeders;

use App\Models\VillageStatistic;
use Illuminate\Database\Seeder;

class VillageStatisticsSeeder extends Seeder
{
    public function run(): void
    {
        VillageStatistic::updateOrCreate(
            ['id' => 1],
            [
                'total_population' => 3842,
                'male_population'  => 1924,
                'female_population'=> 1918,
                'total_families'   => 1056,
                'total_dusun'      => 4,
                'total_rw'         => 8,
                'total_rt'         => 24,
                'total_umkm'       => 45,
                'total_officials'  => 12,
                'year'             => 2024,
            ]
        );
    }
}
