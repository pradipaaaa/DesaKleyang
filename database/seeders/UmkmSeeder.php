<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        $umkms = [
            ['name' => 'Keripik Tempe Bu Sari', 'owner' => 'Sari Wulandari', 'product' => 'Keripik Tempe Gurih', 'whatsapp' => '081234567891', 'address' => 'Dusun Kleyang RT 02/01', 'desc' => 'Keripik tempe dengan cita rasa gurih dan renyah. Dibuat dari kedelai pilihan dengan resep tradisional yang telah turun-temurun. Tersedia dalam berbagai varian rasa: original, pedas, dan balado.'],
            ['name' => 'Batik Tulis Kleyang', 'owner' => 'Joko Supriyanto', 'product' => 'Batik Tulis Motif Lokal', 'whatsapp' => '081234567892', 'address' => 'Dusun Krajan RT 01/02', 'desc' => 'Batik tulis dengan motif khas daerah Wonosobo yang terinspirasi dari alam dan budaya lokal. Setiap lembar dikerjakan dengan tangan oleh pengrajin berpengalaman. Menerima pesanan custom motif.'],
            ['name' => 'Warung Makan Pojok Desa', 'owner' => 'Ratna Dewi', 'product' => 'Masakan Jawa Tradisional', 'whatsapp' => '081234567893', 'address' => 'Depan Balai Desa Kleyang', 'desc' => 'Warung makan yang menyajikan masakan tradisional Jawa dengan cita rasa autentik. Menu andalan: gudeg, pecel, soto, dan nasi goreng kampung. Buka dari pukul 06.00 - 21.00 WIB.'],
            ['name' => 'Konveksi Maju Jaya', 'owner' => 'Ahmad Sodik', 'product' => 'Seragam & Pakaian Jadi', 'whatsapp' => '081234567894', 'address' => 'Dusun Lor RT 03/01', 'desc' => 'Menerima pembuatan seragam sekolah, seragam kantor, kaos komunitas, dan berbagai kebutuhan konveksi lainnya. Menggunakan bahan berkualitas dengan jahitan rapi. Pengerjaan cepat dengan harga terjangkau.'],
            ['name' => 'Olahan Singkong Mbak Wati', 'owner' => 'Suwarni', 'product' => 'Aneka Olahan Singkong', 'whatsapp' => '081234567895', 'address' => 'Dusun Kleyang RT 04/02', 'desc' => 'Memproduksi berbagai produk olahan singkong berkualitas: tape, getuk, opak, dan keripik singkong aneka rasa. Menggunakan singkong segar pilihan dari kebun sendiri. Cocok untuk oleh-oleh khas daerah.'],
            ['name' => 'Jamu Herbal Bu Sumi', 'owner' => 'Suminah', 'product' => 'Jamu & Herbal Tradisional', 'whatsapp' => '081234567896', 'address' => 'Dusun Kidul RT 01/03', 'desc' => 'Jamu tradisional berbahan rempah alami pilihan. Produk unggulan: jamu beras kencur, jahe merah, kunyit asam, dan campuran stamina. Dipercaya khasiatnya oleh ratusan pelanggan setia. Tersedia dalam kemasan praktis.'],
            ['name' => 'Madu Hutan Kleyang', 'owner' => 'Teguh Waluyo', 'product' => 'Madu Murni Hutan', 'whatsapp' => '081234567897', 'address' => 'Dusun Kleyang RT 01/01', 'desc' => 'Madu murni dari hutan di lereng bukit sekitar Desa Kleyang. Dipanen secara alami tanpa campuran apapun. Kaya antioksidan dan terbukti berkhasiat untuk kesehatan. Tersedia ukuran 250ml, 500ml, dan 1 liter.'],
            ['name' => 'Kopi Bubuk Desa Kleyang', 'owner' => 'Haryanto', 'product' => 'Kopi Bubuk Arabika Lokal', 'whatsapp' => '081234567898', 'address' => 'Dusun Krajan RT 02/01', 'desc' => 'Kopi arabika hasil panen dari kebun sendiri di ketinggian 800 mdpl. Diproses dengan metode semi-wash untuk menghasilkan flavor yang optimal. Tersedia dalam kemasan 100g, 250g, dan 500g. Cocok untuk pecinta specialty coffee.'],
            ['name' => 'Telur Ayam Kampung Asli', 'owner' => 'Widodo', 'product' => 'Telur Ayam Kampung Organik', 'whatsapp' => '081234567899', 'address' => 'Dusun Lor RT 02/02', 'desc' => 'Telur ayam kampung asli yang diternakkan secara organik tanpa hormon dan antibiotik. Ayam dibiarkan berkeliaran bebas dengan pakan alami. Telur lebih gurih, kuning lebih tua, dan lebih bergizi. Tersedia dalam kemasan tray isi 15.'],
            ['name' => 'Kerajinan Rotan Pak Budi', 'owner' => 'Budiyanto', 'product' => 'Furnitur & Kerajinan Rotan', 'whatsapp' => '081234567900', 'address' => 'Dusun Kidul RT 03/02', 'desc' => 'Memproduksi berbagai produk kerajinan rotan berkualitas tinggi: kursi, meja, rak, keranjang, dan berbagai dekorasi rumah. Dikerjakan oleh pengrajin berpengalaman dengan teknik anyaman tradisional. Menerima pesanan custom dan ekspor.'],
        ];

        foreach ($umkms as $item) {
            Umkm::create([
                'name'        => $item['name'],
                'owner'       => $item['owner'],
                'product'     => $item['product'],
                'photo'       => null,
                'whatsapp'    => $item['whatsapp'],
                'address'     => $item['address'],
                'description' => $item['desc'],
                'is_active'   => true,
            ]);
        }
    }
}
