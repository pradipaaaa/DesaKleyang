<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UmkmFactory extends Factory
{
    public function definition(): array
    {
        $umkms = [
            ['name' => 'Keripik Tempe Bu Sari', 'product' => 'Keripik Tempe'],
            ['name' => 'Batik Tulis Pak Joko', 'product' => 'Batik Tulis'],
            ['name' => 'Warung Makan Sederhana', 'product' => 'Masakan Rumahan'],
            ['name' => 'Konveksi Maju Bersama', 'product' => 'Pakaian Jadi'],
            ['name' => 'Olahan Singkong Bu Ratih', 'product' => 'Singkong Olahan'],
            ['name' => 'Jamu Tradisional Mbah Sumi', 'product' => 'Jamu Herbal'],
            ['name' => 'Kerajinan Rotan Pak Budi', 'product' => 'Furnitur Rotan'],
            ['name' => 'Kopi Bubuk Desa', 'product' => 'Kopi Bubuk Lokal'],
            ['name' => 'Telur Ayam Kampung', 'product' => 'Telur Organik'],
            ['name' => 'Madu Hutan Asli', 'product' => 'Madu Murni'],
        ];

        $item = $this->faker->randomElement($umkms);
        $phone = '08' . $this->faker->numerify('#########');

        return [
            'name'        => $item['name'],
            'owner'       => $this->faker->name(),
            'product'     => $item['product'],
            'photo'       => null,
            'whatsapp'    => $phone,
            'address'     => 'Dusun ' . $this->faker->randomElement(['Kleyang', 'Krajan', 'Lor', 'Kidul']) . ', Desa Kleyang',
            'description' => 'UMKM ' . $item['name'] . ' memproduksi ' . $item['product'] . ' dengan kualitas terjamin. ' . $this->faker->sentence(8),
            'is_active'   => true,
        ];
    }
}
