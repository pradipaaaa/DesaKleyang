<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PotentialFactory extends Factory
{
    public function definition(): array
    {
        $data = [
            ['name' => 'Padi Sawah', 'category' => 'pertanian', 'benefit' => 'Menjadi sumber pangan utama masyarakat dan penghasilan petani'],
            ['name' => 'Jagung Manis', 'category' => 'pertanian', 'benefit' => 'Komoditas ekspor dan bahan pangan bergizi tinggi'],
            ['name' => 'Sapi Potong', 'category' => 'peternakan', 'benefit' => 'Sumber protein hewani dan penghasilan tambahan keluarga'],
            ['name' => 'Kambing Etawa', 'category' => 'peternakan', 'benefit' => 'Penghasil susu dan daging berkualitas tinggi'],
            ['name' => 'Wisata Air Terjun', 'category' => 'wisata', 'benefit' => 'Menarik wisatawan dan meningkatkan pendapatan desa'],
            ['name' => 'Kerajinan Anyaman Bambu', 'category' => 'kerajinan', 'benefit' => 'Produk ekspor dan pelestarian budaya lokal'],
            ['name' => 'Kebun Kopi', 'category' => 'perkebunan', 'benefit' => 'Komoditas ekspor dengan nilai jual tinggi'],
            ['name' => 'Kebun Cengkeh', 'category' => 'perkebunan', 'benefit' => 'Rempah unggulan bernilai ekonomi tinggi'],
            ['name' => 'Budidaya Lele', 'category' => 'peternakan', 'benefit' => 'Protein murah dan mudah dibudidayakan'],
            ['name' => 'Sayuran Organik', 'category' => 'pertanian', 'benefit' => 'Produk sehat bernilai jual premium'],
        ];

        $item = $this->faker->randomElement($data);

        return [
            'name'        => $item['name'],
            'category'    => $item['category'],
            'photo'       => null,
            'description' => 'Potensi ' . $item['name'] . ' di Desa Kleyang sangat menjanjikan. ' . $this->faker->paragraph(2),
            'benefit'     => $item['benefit'],
            'is_active'   => true,
        ];
    }
}
