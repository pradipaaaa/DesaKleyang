<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VillageOfficialFactory extends Factory
{
    public function definition(): array
    {
        $positions = [
            'Kepala Desa', 'Sekretaris Desa', 'Kaur Keuangan', 'Kaur Umum', 'Kaur Perencanaan',
            'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kasi Pelayanan',
            'Kepala Dusun I', 'Kepala Dusun II', 'Kepala Dusun III',
            'Staf Administrasi', 'Operator Desa',
        ];

        return [
            'name'        => $this->faker->name('male'),
            'position'    => $this->faker->randomElement($positions),
            'photo'       => null,
            'description' => $this->faker->paragraph(2),
            'phone'       => '08' . $this->faker->numerify('#########'),
            'email'       => $this->faker->safeEmail(),
            'order'       => $this->faker->numberBetween(1, 20),
            'is_head'     => false,
            'is_active'   => true,
        ];
    }
}
