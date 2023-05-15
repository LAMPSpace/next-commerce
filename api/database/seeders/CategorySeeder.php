<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultCategories = [
            'Phone' => [
                'icon' => 'GiSmartphone',
                'children' => []
            ],
            'Laptop' => [
                'icon' => 'MdLaptopChromebook',
                'children' => []
            ],
            'Watch' => [
                'icon' => 'BsWatch',
                'children' => [
                    'Smart watch' => [
                        'icon' => 'BsSmartwatch',
                        'children' => []
                    ],
                    'Classic watch' => [
                        'icon' => 'GiWatch',
                        'children' => []
                    ]
                ]
            ],
            'Earphone' => [
                'icon' => 'SlEarphones',
                'children' => [
                    'True wireless' => [
                        'icon' => 'RiWirelessChargingLine',
                        'children' => []
                    ],
                    'Headphone' => [
                        'icon' => 'TfiHeadphoneAlt',
                        'children' => []
                    ]
                ]
            ],
        ];

        foreach ($defaultCategories as $key => $value) {
            $category = Category::factory()->create([
                'name' => $key,
                'icon' => $value['icon'],
                'level' => 1
            ]);
            if (count($value['children']) > 0) {
                foreach ($value['children'] as $keyChildCategory => $valueChildCategory) {
                    Category::factory()->create([
                        'parent_uuid' => $category->uuid,
                        'name' => $keyChildCategory,
                        'icon' => $valueChildCategory['icon'],
                        'level' => $category->level + 1
                    ]);
                }
            }
        }
    }
}
