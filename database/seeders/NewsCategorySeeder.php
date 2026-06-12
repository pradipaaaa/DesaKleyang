<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'color' => '#DC2626'],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'color' => '#16A34A'],
            ['name' => 'Pembangunan', 'slug' => 'pembangunan', 'color' => '#2563EB'],
            ['name' => 'Sosialisasi', 'slug' => 'sosialisasi', 'color' => '#D97706'],
        ];

        foreach ($categories as $cat) {
            NewsCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
