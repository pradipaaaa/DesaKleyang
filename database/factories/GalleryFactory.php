<?php

namespace Database\Factories;

use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            'Kegiatan Gotong Royong Desa', 'Rapat Koordinasi Perangkat Desa',
            'Festival Budaya Desa', 'Panen Raya Pertanian', 'Kegiatan KKN Mahasiswa',
            'Pembangunan Jalan Desa', 'Kegiatan Posyandu', 'Lomba Desa',
            'Pelatihan UMKM', 'Kegiatan PKK', 'Wisata Alam Desa',
            'Pameran Produk Lokal', 'Musyawarah Desa', 'Kegiatan Karang Taruna',
            'Penanaman Pohon Bersama',
        ];

        return [
            'gallery_category_id' => GalleryCategory::inRandomOrder()->first()?->id ?? 1,
            'title'               => $this->faker->randomElement($titles),
            'image'               => null,
            'description'         => $this->faker->sentence(10),
            'is_active'           => true,
        ];
    }
}
