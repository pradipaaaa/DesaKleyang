<?php

namespace Database\Seeders;

use App\Models\VillageOfficial;
use Illuminate\Database\Seeder;

class VillageOfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            ['name' => 'Bambang Sutrisno', 'position' => 'Kepala Desa', 'order' => 1, 'is_head' => true, 'description' => 'Kepala Desa Kleyang periode 2021-2027. Berpengalaman dalam bidang pemerintahan desa dan pemberdayaan masyarakat selama lebih dari 10 tahun.'],
            ['name' => 'Siti Rahayu', 'position' => 'Sekretaris Desa', 'order' => 2, 'description' => 'Sekretaris Desa yang berpengalaman dalam administrasi pemerintahan desa.'],
            ['name' => 'Agus Widodo', 'position' => 'Kaur Keuangan', 'order' => 3, 'description' => 'Bertanggung jawab atas pengelolaan keuangan desa secara transparan dan akuntabel.'],
            ['name' => 'Dewi Lestari', 'position' => 'Kaur Umum', 'order' => 4, 'description' => 'Mengelola urusan umum dan administrasi surat menyurat desa.'],
            ['name' => 'Hendra Setiawan', 'position' => 'Kaur Perencanaan', 'order' => 5, 'description' => 'Bertanggung jawab dalam perencanaan pembangunan desa.'],
            ['name' => 'Widi Hartono', 'position' => 'Kasi Pemerintahan', 'order' => 6, 'description' => 'Menangani urusan pemerintahan dan kependudukan desa.'],
            ['name' => 'Rina Susanti', 'position' => 'Kasi Kesejahteraan', 'order' => 7, 'description' => 'Menangani program kesejahteraan sosial masyarakat desa.'],
            ['name' => 'Dani Prasetyo', 'position' => 'Kasi Pelayanan', 'order' => 8, 'description' => 'Bertanggung jawab atas pelayanan administrasi kependudukan warga.'],
            ['name' => 'Suparman', 'position' => 'Kepala Dusun I (Kleyang)', 'order' => 9, 'description' => 'Memimpin wilayah Dusun Kleyang.'],
            ['name' => 'Mulyono', 'position' => 'Kepala Dusun II (Krajan)', 'order' => 10, 'description' => 'Memimpin wilayah Dusun Krajan.'],
        ];

        foreach ($officials as $official) {
            VillageOfficial::create(array_merge($official, [
                'photo'     => null,
                'phone'     => '08' . rand(100000000, 999999999),
                'email'     => null,
                'is_head'   => $official['is_head'] ?? false,
                'is_active' => true,
            ]));
        }
    }
}
