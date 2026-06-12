<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $categories = GalleryCategory::all()->keyBy('slug');

        $galleries = [
            ['title' => 'Kegiatan Gotong Royong Bersih Desa', 'category' => 'kegiatan-desa', 'desc' => 'Warga bersama-sama membersihkan lingkungan desa'],
            ['title' => 'Rapat Koordinasi Perangkat Desa', 'category' => 'kegiatan-desa', 'desc' => 'Koordinasi rutin perangkat desa dalam rangka perencanaan program'],
            ['title' => 'Festival Budaya Tahunan', 'category' => 'kegiatan-desa', 'desc' => 'Festival budaya yang menampilkan seni tradisional daerah'],
            ['title' => 'Pelantikan BPD Periode 2024-2030', 'category' => 'kegiatan-desa', 'desc' => 'Pelantikan anggota Badan Permusyawaratan Desa periode baru'],
            ['title' => 'Kegiatan Posyandu Balita', 'category' => 'kegiatan-desa', 'desc' => 'Layanan kesehatan terpadu untuk balita dan ibu hamil'],
            ['title' => 'Mahasiswa KKN Tiba di Desa', 'category' => 'kkn', 'desc' => 'Penyambutan mahasiswa KKN oleh perangkat desa'],
            ['title' => 'Program Mengajar KKN di SD', 'category' => 'kkn', 'desc' => 'Mahasiswa KKN membantu pembelajaran di SDN Kleyang'],
            ['title' => 'Pembuatan Website Desa oleh Tim KKN', 'category' => 'kkn', 'desc' => 'Tim KKN bekerja membuat website profil desa digital'],
            ['title' => 'Sosialisasi Digital Marketing KKN', 'category' => 'kkn', 'desc' => 'Pelatihan digital marketing untuk pelaku UMKM desa'],
            ['title' => 'Penanaman Pohon bersama KKN', 'category' => 'kkn', 'desc' => 'Kegiatan penghijauan bersama mahasiswa KKN dan warga'],
            ['title' => 'Air Terjun Curug Kleyang', 'category' => 'wisata', 'desc' => 'Pesona alam air terjun yang menjadi wisata andalan desa'],
            ['title' => 'Pemandangan Persawahan Desa', 'category' => 'wisata', 'desc' => 'Hamparan sawah hijau yang mempesona di Desa Kleyang'],
            ['title' => 'Kebun Kopi di Lereng Bukit', 'category' => 'wisata', 'desc' => 'Perkebunan kopi yang menjadi daya tarik agrowisata'],
            ['title' => 'Pembangunan Jalan Paving Dusun Krajan', 'category' => 'pembangunan', 'desc' => 'Progres pembangunan jalan paving di Dusun Krajan'],
            ['title' => 'Rehabilitasi Gedung Balai Desa', 'category' => 'pembangunan', 'desc' => 'Renovasi gedung balai desa untuk pelayanan publik'],
            ['title' => 'Pembangunan Drainase Jalan Utama', 'category' => 'pembangunan', 'desc' => 'Konstruksi drainase untuk mencegah genangan air'],
            ['title' => 'Pemasangan Lampu Jalan LED', 'category' => 'pembangunan', 'desc' => 'Instalasi lampu jalan hemat energi di seluruh desa'],
            ['title' => 'Pembangunan Gapura Desa', 'category' => 'pembangunan', 'desc' => 'Gapura baru sebagai identitas Desa Kleyang'],
            ['title' => 'Panen Raya Padi Warga Desa', 'category' => 'kegiatan-desa', 'desc' => 'Kegiatan panen raya yang menggembirakan warga petani'],
            ['title' => 'Lomba 17 Agustus di Lapangan Desa', 'category' => 'kegiatan-desa', 'desc' => 'Berbagai lomba meriahkan peringatan HUT RI ke-79'],
        ];

        foreach ($galleries as $item) {
            $category = $categories[$item['category']] ?? $categories->first();
            Gallery::create([
                'gallery_category_id' => $category->id,
                'title'               => $item['title'],
                'image'               => 'images/gallery/placeholder.svg',
                'description'         => $item['desc'],
                'is_active'           => true,
            ]);
        }
    }
}
