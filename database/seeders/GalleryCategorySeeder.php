<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kegiatan Desa', 'slug' => 'kegiatan-desa'],
            ['name' => 'KKN', 'slug' => 'kkn'],
            ['name' => 'Wisata', 'slug' => 'wisata'],
            ['name' => 'Pembangunan', 'slug' => 'pembangunan'],
        ];

        foreach ($categories as $cat) {
            GalleryCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
