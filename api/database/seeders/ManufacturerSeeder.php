<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manufacturers = ['Sony', 'Samsung', 'Apple', 'Xiaomi'];
        foreach ($manufacturers as $manufacturer) {
            Manufacturer::factory()->create([
                'name' => $manufacturer,
                'logo' => 'logo_' . strtolower($manufacturer)
            ]);
        }
    }
}
