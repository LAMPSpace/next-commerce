<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Sony', 'Samsung', 'Apple', 'Xiaomi', 'MSI', 'Oppo', 'Vivo', 'LG', 'Realme', 'HP', 'JBL', 'Asus', 'Acer', 'Lenovo'];
        foreach ($brands as $brand) {
            Brand::factory()->create([
                'name' => $brand,
                'logo' => 'logo_' . strtolower($brand)
            ]);
        }
    }
}
