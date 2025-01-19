<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Elektronik', 'description' => 'Peralatan elektronik, seperti komputer, telepon, dan peralatan multimedia.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'Komputer & Aksesoris', 'description' => 'Komponen dan aksesoris komputer, termasuk mouse, keyboard, dan kabel.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'name' => 'Peralatan Dapur', 'description' => 'Peralatan untuk kebutuhan dapur seperti panci, wajan, dan blender.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'name' => 'Bahan Baku Industri', 'description' => 'Barang yang digunakan dalam proses produksi industri, termasuk bahan kimia dan logam.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'name' => 'Pangan & Minuman', 'description' => 'Produk pangan dan minuman, dari bahan baku hingga produk jadi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'name' => 'Perabotan Rumah Tangga', 'description' => 'Barang-barang yang digunakan untuk melengkapi rumah, seperti kursi, meja, lemari, dan lainnya.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'name' => 'Peralatan Olahraga', 'description' => 'Barang-barang untuk aktivitas olahraga, seperti bola, raket, dan perlengkapan fitness.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'name' => 'Kesehatan & Kecantikan', 'description' => 'Produk untuk kesehatan dan kecantikan, seperti kosmetik, perawatan kulit, dan suplemen.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // Seeder untuk tabel items
        DB::table('items')->insert([
            ['id' => 1, 'name' => 'Laptop ASUS X509', 'sku' => 'ELEC001', 'category_id' => 1, 'stock' => 15, 'price' => 5000000, 'image_path' => 'laptop_asus_x509.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'Smartphone Xiaomi Mi 11', 'sku' => 'ELEC002', 'category_id' => 1, 'stock' => 30, 'price' => 7500000, 'image_path' => 'xiaomi_mi11.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'name' => 'Mouse Logitech Wireless', 'sku' => 'COMP001', 'category_id' => 2, 'stock' => 50, 'price' => 150000, 'image_path' => 'mouse_logitech_wireless.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'name' => 'Keyboard Mekanikal Razer', 'sku' => 'COMP002', 'category_id' => 2, 'stock' => 40, 'price' => 1200000, 'image_path' => 'keyboard_razer.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'name' => 'Blender Philips HR2020', 'sku' => 'KITCH001', 'category_id' => 3, 'stock' => 20, 'price' => 600000, 'image_path' => 'blender_philips.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'name' => 'Kompor Gas 2 Tungku', 'sku' => 'KITCH002', 'category_id' => 3, 'stock' => 25, 'price' => 350000, 'image_path' => 'kompor_gas.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'name' => 'Semen 50kg', 'sku' => 'BAK001', 'category_id' => 4, 'stock' => 200, 'price' => 80000, 'image_path' => 'semen_50kg.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'name' => 'Baja Ringan 3mm', 'sku' => 'BAK002', 'category_id' => 4, 'stock' => 150, 'price' => 100000, 'image_path' => 'baja_ringan.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9, 'name' => 'Beras 5kg', 'sku' => 'FOOD001', 'category_id' => 5, 'stock' => 500, 'price' => 70000, 'image_path' => 'beras_5kg.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, 'name' => 'Minyak Goreng 1L', 'sku' => 'FOOD002', 'category_id' => 5, 'stock' => 250, 'price' => 15000, 'image_path' => 'minyak_goreng.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 11, 'name' => 'Meja Kantor Kayu', 'sku' => 'FURN001', 'category_id' => 6, 'stock' => 50, 'price' => 1200000, 'image_path' => 'meja_kantor.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 12, 'name' => 'Kursi Kantor', 'sku' => 'FURN002', 'category_id' => 6, 'stock' => 75, 'price' => 500000, 'image_path' => 'kursi_kantor.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 13, 'name' => 'Bola Sepak Adidas', 'sku' => 'SPORT001', 'category_id' => 7, 'stock' => 100, 'price' => 350000, 'image_path' => 'bola_sepak_adidas.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 14, 'name' => 'Raket Tenis Wilson', 'sku' => 'SPORT002', 'category_id' => 7, 'stock' => 50, 'price' => 1500000, 'image_path' => 'raket_tenis_wilson.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 15, 'name' => 'Shampo Sampoerna', 'sku' => 'HEALTH001', 'category_id' => 8, 'stock' => 150, 'price' => 30000, 'image_path' => 'shampo_sampoerna.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 16, 'name' => 'Vitamin C 500mg', 'sku' => 'HEALTH002', 'category_id' => 8, 'stock' => 200, 'price' => 25000, 'image_path' => 'vitamin_c.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('suppliers')->insert([
            ['name' => 'Supplier Elektronik ABC', 'contact' => '021-12345678', 'address' => 'Jl. Elektronik No. 123, Jakarta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Supplier Bahan Baku XYZ', 'contact' => '021-23456789', 'address' => 'Jl. Bahan Baku No. 456, Bandung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Supplier Pangan Maju', 'contact' => '021-34567890', 'address' => 'Jl. Pangan No. 789, Surabaya', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Supplier Kesehatan Sehat', 'contact' => '021-45678901', 'address' => 'Jl. Kesehatan No. 101, Jakarta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
