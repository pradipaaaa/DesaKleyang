<?php

namespace Database\Seeders;

use App\Models\VillageProfile;
use Illuminate\Database\Seeder;

class VillageProfileSeeder extends Seeder
{
    public function run(): void
    {
        VillageProfile::updateOrCreate(
            ['id' => 1],
            [
                'village_name'  => 'Desa Kleyang',
                'tagline'       => 'Maju, Berdaya, dan Sejahtera Bersama',
                'address'       => 'Jl. Raya Kleyang No. 1, Kecamatan Mojotengah, Kabupaten Wonosobo',
                'phone'         => '0286-123456',
                'email'         => 'desa@kleyang.id',
                'website'       => 'https://kleyang.id',
                'history'       => 'Desa Kleyang merupakan salah satu desa yang terletak di Kecamatan Mojotengah, Kabupaten Wonosobo, Provinsi Jawa Tengah. Desa ini berdiri sejak zaman kolonial Belanda dan telah mengalami berbagai perkembangan yang signifikan dari generasi ke generasi. Nama "Kleyang" berasal dari kata dalam bahasa Jawa yang berarti "melayang" atau "tinggi", sesuai dengan posisi geografis desa yang berada di dataran tinggi.\n\nPada masa penjajahan, desa ini menjadi salah satu sentra pertanian penting di kawasan Wonosobo. Masyarakatnya dikenal sebagai petani ulet yang mampu bertahan dalam berbagai kondisi. Setelah kemerdekaan Indonesia, desa ini terus berkembang dengan berbagai program pembangunan yang diinisiasi oleh pemerintah pusat maupun daerah.\n\nHingga saat ini, Desa Kleyang telah berhasil meningkatkan kualitas hidup warganya melalui berbagai program pemberdayaan masyarakat, pengembangan infrastruktur, dan peningkatan layanan publik.',
                'vision'        => 'Terwujudnya Desa Kleyang yang Maju, Mandiri, dan Sejahtera berdasarkan nilai-nilai Gotong Royong dan Kebersamaan',
                'mission'       => "1. Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan\n2. Mengembangkan ekonomi desa berbasis potensi lokal\n3. Membangun infrastruktur yang memadai dan berkelanjutan\n4. Meningkatkan pelayanan publik yang transparan dan akuntabel\n5. Melestarikan budaya dan kearifan lokal\n6. Menjaga keamanan, ketertiban, dan kerukunan masyarakat",
                'postal_code'   => '56353',
                'district'      => 'Mojotengah',
                'regency'       => 'Wonosobo',
                'province'      => 'Jawa Tengah',
                'area'          => 245.50,
                'altitude'      => 800,
                'north_border'  => 'Desa Wonorejo',
                'south_border'  => 'Desa Mudal',
                'east_border'   => 'Desa Kalibeber',
                'west_border'   => 'Desa Kejajar',
                'latitude'      => '-7.3614',
                'longitude'     => '109.9112',
                'office_open'   => '08:00:00',
                'office_close'  => '16:00:00',
                'hero_image'    => null,
                'village_logo'  => null,
            ]
        );
    }
}
