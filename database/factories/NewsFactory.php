<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(5, 10));

        $contents = [
            "Dalam rangka meningkatkan kesejahteraan masyarakat desa, pemerintah desa telah melaksanakan berbagai program unggulan yang memberikan dampak positif bagi seluruh warga. Program ini melibatkan partisipasi aktif dari masyarakat setempat.\n\nKegiatan ini dihadiri oleh seluruh perangkat desa, tokoh masyarakat, dan perwakilan dari berbagai organisasi kemasyarakatan. Antusias warga sangat tinggi dalam menyambut program-program baru yang akan dilaksanakan.\n\nBapak Kepala Desa dalam sambutannya menyampaikan bahwa kegiatan ini merupakan wujud nyata komitmen pemerintah desa dalam melayani masyarakat dengan sepenuh hati.",
            "Pembangunan infrastruktur desa terus diupayakan oleh pemerintah desa untuk meningkatkan kualitas hidup masyarakat. Berbagai proyek pembangunan sedang dan akan segera dilaksanakan di seluruh wilayah desa.\n\nProyek-proyek tersebut meliputi perbaikan jalan desa, pembangunan saluran irigasi, dan pembenahan fasilitas umum lainnya. Semua kegiatan ini dilaksanakan dengan melibatkan tenaga kerja lokal.\n\nDana pembangunan berasal dari Anggaran Dana Desa (ADD) dan Dana Desa (DD) yang dikelola secara transparan dan akuntabel oleh pemerintah desa.",
            "Kegiatan sosial kemasyarakatan desa berlangsung meriah dan penuh semangat gotong royong. Seluruh elemen masyarakat turut serta dalam kegiatan yang bertujuan untuk mempererat tali persaudaraan antar warga.\n\nGotong royong membersihkan lingkungan desa dilaksanakan setiap minggu oleh warga secara bergantian. Kegiatan ini tidak hanya menjaga kebersihan desa tetapi juga mempererat hubungan antar tetangga.\n\nPemerintah desa sangat mengapresiasi semangat gotong royong yang masih terjaga dengan baik di masyarakat.",
        ];

        return [
            'news_category_id' => NewsCategory::inRandomOrder()->first()?->id ?? 1,
            'title'            => $title,
            'slug'             => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 9999),
            'thumbnail'        => null,
            'excerpt'          => $this->faker->paragraph(2),
            'content'          => $this->faker->randomElement($contents),
            'author'           => 'Admin Desa Kleyang',
            'is_published'     => true,
            'published_at'     => $this->faker->dateTimeBetween('-6 months', 'now'),
            'views'            => $this->faker->numberBetween(10, 500),
        ];
    }
}
