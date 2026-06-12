<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            VillageProfileSeeder::class,
            VillageStatisticsSeeder::class,
            VillageOfficialSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            GalleryCategorySeeder::class,
            GallerySeeder::class,
            PotentialSeeder::class,
            UmkmSeeder::class,
        ]);
    }
}
