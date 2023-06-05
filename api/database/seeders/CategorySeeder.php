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
                'icon' => 'MdSmartphone',
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
                'children' => [
                    'Chip' => [
                        'icon' => null,
                        'children' => [
                            'Chip Core i5' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Chip Core i7' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Chip Core i3' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Chip Core i9' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                    'Screen' => [
                        'icon' => null,
                        'children' => [
                            '12 inch Screen' => [
                                'icon' => null,
                                'children' => []
                            ],
                            '13 inch Screen' => [
                                'icon' => null,
                                'children' => []
                            ],
                            '14 inch Screen' => [
                                'icon' => null,
                                'children' => []
                            ],
                            '15.6 inch Screen' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                ]
            ],
            'Sound' => [
                'icon' => 'BsSoundwave',
                'children' => [
                    'Earphone' => [
                        'icon' => 'SlEarphones',
                        'children' => [
                            'Sport Earphone' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Gaming Earphone' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Bluetooth Earphone' => [
                                'icon' => 'TbDeviceAirpods',
                                'children' => []
                            ],
                            'Headphone' => [
                                'icon' => 'ImHeadphones',
                                'children' => []
                            ]
                        ]
                    ],
                    'Speaker' => [
                        'icon' => 'BsSpeakerFill',
                        'children' => [
                            'Bluetooth Speaker' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Mini Speaker' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Karaoke Speaker' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Soundbar Speaker' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                ]
            ],
            'Television' => [
                'icon' => 'MdTv',
                'children' => [
                    'Television Screen' => [
                        'icon' => 'MdOutlineScreenshotMonitor',
                        'children' => [
                            'Television 32 inch' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television 43 inch' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television 50 inch' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television 55 inch' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                    'Television Type' => [
                        'icon' => 'BsSpeakerFill',
                        'children' => [
                            'Television 4K' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television 8K' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television QLED' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Television FULL HD' => [
                                'icon' => null,
                                'children' => []
                            ]
                        ]
                    ],
                ]
            ],
            'Accessory' => [
                'icon' => 'BsUsbPlugFill',
                'children' => [
                    'Laptop Accessory' => [
                        'icon' => 'MdLaptopChromebook',
                        'children' => [
                            'Mouse' => [
                                'icon' => 'BsFillMouse3Fill',
                                'children' => []
                            ],
                            'Keyboard' => [
                                'icon' => 'BsKeyboardFill',
                                'children' => []
                            ],
                            'Webcam' => [
                                'icon' => 'BiWebcam',
                                'children' => []
                            ],
                        ]
                    ],
                    'Phone Accessory' => [
                        'icon' => 'MdSmartphone',
                        'children' => [
                            'Sim 4G' => [
                                'icon' => 'FaSimCard',
                                'children' => []
                            ],
                            'Phone Case' => [
                                'icon' => 'BsPhoneFill',
                                'children' => []
                            ],
                            'Charging Cable' => [
                                'icon' => 'GiCharging',
                                'children' => []
                            ],
                        ]
                    ],
                ]
            ],
            'Smart Home' => [
                'icon' => 'TbSmartHome',
                'children' => [
                    'Smart Home Appliances' => [
                        'icon' => null,
                        'children' => [
                            'Smart Wash Machine' => [
                                'icon' => 'CgSmartHomeWashMachine',
                                'children' => []
                            ],
                            'Smart Heat' => [
                                'icon' => 'CgSmartHomeHeat',
                                'children' => []
                            ],
                            'Smart Light' => [
                                'icon' => 'CgSmartHomeLight',
                                'children' => []
                            ],
                        ]
                    ],
                ]
            ],
            'Watch' => [
                'icon' => 'MdWatch',
                'children' => [
                    'Types' => [
                        'icon' => null,
                        'children' => [
                            'Smart Watch' => [
                                'icon' => 'BsSmartwatch',
                                'children' => []
                            ],
                            'Classic Watch' => [
                                'icon' => 'BsWatch',
                                'children' => []
                            ],
                            'Sport Watch' => [
                                'icon' => 'MdOutlineWatch',
                                'children' => []
                            ],
                        ]
                    ],
                ]
            ],
            'News' => [
                'icon' => 'ImNewspaper',
                'children' => [
                    'News Types' => [
                        'icon' => null,
                        'children' => [
                            'Newest' => [
                                'icon' => null,
                                'children' => []
                            ],
                            'Technology News' => [
                                'icon' => 'GrTechnology',
                                'children' => []
                            ],
                            'Finance News' => [
                                'icon' => null,
                                'children' => []
                            ],
                        ]
                    ],
                ]
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
                        'parent_id' => $parentCategory->id,
                        'name' => $keyCategory,
                        'icon' => $valueCategory['icon'],
                        'level' => $parentCategory->level + 1
                    ]);
                    if (count($valueCategory['children']) > 0) {
                        foreach ($valueCategory['children'] as $keyChildCategory => $valueChileCategory) {
                            Category::factory()->create([
                                'parent_id' => $category->id,
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
