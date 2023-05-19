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
                'children' => [
                    'Feature' => [
                        'icon' => null,
                        'children' => [
                            'Hot' => [
                                'icon' => 'SiHotjar',
                                'children' => []
                            ],
                            'Best seller' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Old' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'New' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                    'Operation system' => [
                        'icon' => null,
                        'children' => [
                            'IOS' => [
                                'icon' => 'SiIos',
                                'children' => []
                            ],
                            'Android' => [
                                'icon' => 'AiFillAndroid',
                                'children' => []
                            ]
                        ]
                    ],
                    'RAM' => [
                        'icon' => null,
                        'children' => [
                            'RAM 8GB' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'RAM 16GB' => [
                                'icon' => null,
                                'children' => []
                            ],
                        ]
                    ]
                ]
            ],
            'Laptop' => [
                'icon' => 'MdLaptopChromebook',
                'children' => []
            ],
        ];

        foreach ($defaultCategories as $keyParentCategory => $valueParentCategory) {
            $parentCategory = Category::factory()->create([
                'name' => $keyParentCategory,
                'icon' => $valueParentCategory['icon'],
                'level' => 1
            ]);
            if (count($valueParentCategory['children']) > 0) {
                foreach ($valueParentCategory['children'] as $keyCategory => $valueCategory) {
                    $category = Category::factory()->create([
                        'parent_uuid' => $parentCategory->uuid,
                        'name' => $keyCategory,
                        'icon' => $valueCategory['icon'],
                        'level' => $parentCategory->level + 1
                    ]);
                    if (count($valueCategory['children']) > 0) {
                        foreach ($valueCategory['children'] as $keyChildCategory => $valueChileCategory) {
                            Category::factory()->create([
                                'parent_uuid' => $category->uuid,
                                'name' => $keyChildCategory,
                                'icon' => $valueChileCategory['icon'],
                                'level' => $category->level + 1
                            ]);
                        }
                    }
                }
            }
        }
    }
}
