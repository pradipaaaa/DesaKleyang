<?php

namespace Database\Seeders;

use App\Models\Potential;
use Illuminate\Database\Seeder;

class PotentialSeeder extends Seeder
{
    public function run(): void
    {
        $potentials = [
            ['name' => 'Padi Sawah Varietas Ciherang', 'category' => 'pertanian', 'benefit' => 'Menjadi sumber pangan utama masyarakat dengan produktivitas tinggi mencapai 6 ton/ha', 'desc' => 'Desa Kleyang memiliki lahan sawah seluas 120 hektar yang mayoritas ditanami padi varietas Ciherang. Kondisi geografis yang ideal dengan ketinggian 800 mdpl membuat kualitas padi yang dihasilkan sangat baik. Sistem irigasi yang memadai memungkinkan petani panen 2-3 kali dalam setahun.'],
            ['name' => 'Jagung Manis Hibrida', 'category' => 'pertanian', 'benefit' => 'Komoditas dengan nilai jual tinggi dan permintaan pasar yang konsisten sepanjang tahun', 'desc' => 'Jagung manis menjadi salah satu komoditas pertanian andalan Desa Kleyang. Para petani telah berhasil mengembangkan varietas hibrida yang memberikan hasil panen optimal. Jagung dari Desa Kleyang telah dipasarkan ke pasar-pasar di Wonosobo dan sekitarnya.'],
            ['name' => 'Sapi Potong Limosin', 'category' => 'peternakan', 'benefit' => 'Sumber protein hewani dan investasi ternak yang menguntungkan bagi peternak lokal', 'desc' => 'Peternakan sapi potong menjadi usaha unggulan beberapa kelompok tani di Desa Kleyang. Sapi limosin dipilih karena pertumbuhannya yang cepat dan kualitas dagingnya yang baik. Tersedia sekitar 200 ekor sapi yang dikelola oleh 30 peternak.'],
            ['name' => 'Kambing Peranakan Etawa (PE)', 'category' => 'peternakan', 'benefit' => 'Penghasil susu berkualitas tinggi dengan harga jual yang kompetitif di pasaran', 'desc' => 'Budidaya kambing Peranakan Etawa (PE) sedang berkembang pesat di Desa Kleyang. Susu kambing PE dari desa ini dikenal memiliki kualitas yang baik dan mulai diminati oleh konsumen di kota. Kelompok peternak kambing PE sedang dalam proses pengembangan menjadi sentra peternakan terpadu.'],
            ['name' => 'Air Terjun Curug Kleyang', 'category' => 'wisata', 'benefit' => 'Destinasi wisata alam yang menarik wisatawan dan meningkatkan pendapatan masyarakat sekitar', 'desc' => 'Curug Kleyang adalah air terjun setinggi 15 meter yang menjadi objek wisata andalan Desa Kleyang. Dengan panorama alam yang indah dikelilingi hutan tropis, tempat ini menarik ratusan pengunjung setiap minggunya. Sedang dikembangkan fasilitas pendukung seperti area parkir, toilet, dan warung makan.'],
            ['name' => 'Kerajinan Anyaman Bambu', 'category' => 'kerajinan', 'benefit' => 'Produk kerajinan dengan nilai seni tinggi yang telah menembus pasar ekspor', 'desc' => 'Kerajinan anyaman bambu telah menjadi identitas Desa Kleyang selama puluhan tahun. Para pengrajin menghasilkan berbagai produk mulai dari keranjang, furniture, dekorasi rumah, hingga aksesoris. Produk kerajinan ini telah dipasarkan ke berbagai kota di Indonesia bahkan sudah diekspor.'],
            ['name' => 'Perkebunan Kopi Arabika', 'category' => 'perkebunan', 'benefit' => 'Kopi berkualitas tinggi dengan harga premium yang diminati pasar specialty coffee', 'desc' => 'Desa Kleyang berada di ketinggian optimal untuk budidaya kopi arabika. Perkebunan kopi seluas 50 hektar menghasilkan biji kopi dengan flavor unik khas dataran tinggi Wonosobo. Petani kopi Desa Kleyang sedang mengembangkan metode pengolahan kopi specialty untuk meningkatkan nilai jual.'],
            ['name' => 'Sayuran Organik Datarang Tinggi', 'category' => 'pertanian', 'benefit' => 'Produk sayuran organik bersertifikat dengan harga premium dan permintaan yang terus meningkat', 'desc' => 'Kondisi iklim sejuk di ketinggian 800 mdpl membuat Desa Kleyang ideal untuk budidaya sayuran organik. Berbagai jenis sayuran seperti wortel, brokoli, kubis, dan paprika tumbuh subur dengan kualitas terbaik. Kelompok tani organik sedang dalam proses mendapatkan sertifikasi organik.'],
            ['name' => 'Cengkeh Varietas Zanzibar', 'category' => 'perkebunan', 'benefit' => 'Rempah bernilai ekspor tinggi dengan produktivitas yang stabil sepanjang tahun', 'desc' => 'Perkebunan cengkeh telah lama menjadi andalan ekonomi warga Desa Kleyang. Pohon cengkeh tua yang tersebar di berbagai penjuru desa menghasilkan bunga cengkeh berkualitas premium. Pada musim panen, seluruh warga terlibat dalam proses pemetikan dan pengeringan cengkeh.'],
            ['name' => 'Wisata Edukasi Pertanian', 'category' => 'wisata', 'benefit' => 'Destinasi wisata edukatif yang memberikan pengalaman langsung tentang kehidupan pertanian', 'desc' => 'Desa Kleyang mengembangkan konsep wisata edukasi pertanian yang memungkinkan pengunjung merasakan langsung pengalaman bertani. Program ini mencakup menanam padi, panen sayuran, membuat pupuk kompos, dan belajar teknik pertanian organik. Sangat diminati oleh sekolah-sekolah dan keluarga.'],
        ];

        foreach ($potentials as $item) {
            Potential::create([
                'name'        => $item['name'],
                'category'    => $item['category'],
                'photo'       => null,
                'description' => $item['desc'],
                'benefit'     => $item['benefit'],
                'is_active'   => true,
            ]);
        }
    }
}
