<?php

namespace Database\Seeders;

use App\Models\HomeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner = json_encode((object) [
            'height' => 500,
            'content' => (object) [
                'left' => (object) [
                    'content' => true,
                    'grid' =>  (object) [
                        'lg' => 2,
                        'md' => 3
                    ]
                ],
                'main' => (object) [
                    'type' => 'swiper',
                    'pictures' => [
                        (object) [
                            'image' => 'blackfriday_1',
                            'title' => 'Black Friday Super Sale 1',
                            'content' => 'Black Friday Super Sale Content 1'
                        ],
                        (object) [
                            'image' => 'sony_1',
                            'title' => 'Sony',
                            'content' => 'High Definition. It is in your DNA'
                        ],
                        (object) [
                            'image' => 'blackfriday_2',
                            'title' => 'Black Friday Super Sale 2',
                            'content' => 'Black Friday Super Sale Content 2'
                        ],
                        (object) [
                            'image' => 'watch_2',
                            'title' => 'Titan watch',
                            'content' => 'Titan watch'
                        ],
                        (object) [
                            'image' => 'blackfriday_3',
                            'title' => 'Black Friday Super Sale 3',
                            'content' => 'Black Friday Super Sale Content 3'
                        ], (object) [
                            'image' => 'asus_1',
                            'title' => 'Laptop ASUS',
                            'content' => 'Laptop ASUS'
                        ],
                    ],
                    'pagination' => 'title'
                ],
                'right' => (object) [
                    'content' => [
                        (object) [
                            'image' => 'tv_1',
                            'title' => 'TV 1',
                        ],
                        (object) [
                            'image' => 'laptop_1',
                            'title' => 'Laptop 1',
                        ],
                        (object) [
                            'image' => 'refrigerator_1',
                            'title' => 'Refrigerator 1',
                        ],
                        (object) [
                            'image' => 'watch_1',
                            'title' => 'Watch 1',
                        ],
                        (object) [
                            'image' => 'phone_1',
                            'title' => 'Phone 1',
                        ],
                        (object) [
                            'image' => 'summersale_1',
                            'title' => 'Summer sale 1',
                        ],
                    ],
                    'grid' =>  (object) [
                        'lg' => 2,
                        'md' => 0
                    ]
                ],
            ]
        ]);

        $content = json_encode([
            (object) [
                'type' => 'nested_pictures_carousel',
                'props' => (object)[
                    'name' => 'nested_pictures_carousel',
                    'items' => [
                        [
                            (object)[
                                'image' => 'blackfriday_4',
                                'title' => 'Black friday',
                                'content' => 'Black friday'
                            ],
                            (object)[
                                'image' => 'asus_1',
                                'title' => 'Laptop ASUS',
                                'content' => 'Laptop ASUS'
                            ],
                            (object)[
                                'image' =>  'sony_1',
                                'title' =>  'Sony',
                                'content' => 'High Definition. It is in your DNA'
                            ],
                            (object)[
                                'image' =>  'watch_2',
                                'title' => 'Titan watch',
                                'content' => 'Titan watch'
                            ],
                            (object)[
                                'image' => 'refrigerator_1',
                                'title' =>  'Refrigerator 1',
                                'content' => 'Refrigerator 1'
                            ]
                        ],
                        [
                            (object)[
                                'image' => 'tv_1',
                                'title' => 'TV 1',
                                'content' => 'TV 1'
                            ],
                            (object)[
                                'image' =>  'watch_1',
                                'title' => 'Watch 1',
                                'content' => 'Watch 1'
                            ]
                        ],
                        [
                            (object)[
                                'image' => 'laptop_1',
                                'title' => 'Laptop 1',
                                'content' => 'Laptop 1'
                            ],
                            (object)[
                                'image' => 'phone_1',
                                'title' => 'Phone 1',
                                'content' => 'Phone 1'
                            ]
                        ]
                    ],
                    'height' => 500,
                    'width' => '100%',
                    'transform' => 90
                ]
            ],
            (object) [
                'type' => 'products_carousel',
                'props' => (object)[
                    'name' => 'products_carousel_flash_sale',
                    'perSlide' => 4,
                    'backgroundColor' => 'primary',
                    'title' => null,
                    'titleColor' => 'white',
                    'banner' => 'banner_3',
                    'bannerWidth' => '50%'
                ]
            ],
            (object) [
                'type' => 'list_image_badges',
                'props' => (object)[
                    'name' => 'brands',
                    'title' => 'Brands',
                    'titleColor' => 'foreground'
                ]
            ],
            (object) [
                'type' => 'products_carousel',
                'props' => (object)[
                    'name' => 'products_carousel_recommended',
                    'perSlide' => 4,
                    'backgroundColor' => 'background',
                    'title' => 'Recommended',
                    'titleColor' => 'foreground',
                    'banner' => null,
                ]
            ],
            (object) [
                'type' => 'products_carousel',
                'props' => (object)[
                    'name' => 'products_carousel_phones',
                    'perSlide' => 4,
                    'backgroundColor' => 'background',
                    'title' => 'Phones',
                    'titleColor' => 'foreground',
                    'banner' => null,
                ]
            ],
            (object) [
                'type' => 'multi_pictures_carousel',
                'props' => (object)[
                    'name' => 'list_banks_multi_pictures_carousel',
                    'items' => [
                        [
                            (object)[
                                'image' => 'banner_ocb',
                                'title' => 'OCB',
                                'content' => 'OCB'
                            ],
                            (object)[
                                'image' =>  'banner_vcb',
                                'title' => 'Vietcombank',
                                'content' => 'Vietcombank'
                            ]
                        ],
                        [
                            (object)[
                                'image' => 'banner_hsbc',
                                'title' => 'HSBC',
                                'content' => 'HSBC'
                            ],
                            (object)[
                                'image' => 'banner_vib',
                                'title' => 'VIB',
                                'content' => 'VIB'
                            ]
                        ]
                    ],
                    'height' => 150,
                    'width' => '100%',
                    'col' => 6
                ]
            ],
            (object) [
                'type' => 'multi_pictures_carousel',
                'props' => (object)[
                    'name' => 'list_sales_multi_pictures_carousel',
                    'items' => [
                        [
                            (object)[
                                'image' => 'ad_1',
                                'title' => 'Air condition 1',
                                'content' => 'Air condition 1'
                            ],
                            (object)[
                                'image' =>  'flashsale_1',
                                'title' => 'Flash asle 1',
                                'content' => 'Flash asle 1'
                            ]
                        ],
                        [
                            (object)[
                                'image' => 'springsale_1',
                                'title' => 'Spring sale 1',
                                'content' => 'Spring sale 1'
                            ],
                            (object)[
                                'image' => 'summersale_1',
                                'title' => 'Summmer sale 1',
                                'content' => 'Summmer sale 1'
                            ]
                        ]
                    ],
                    'height' => 150,
                    'width' => '100%',
                    'col' => 6
                ]
            ],
        ]);

        HomeSetting::factory()->count(1)->create(
            [
                'name' => 'Default',
                'start_date' => null,
                'end_date' => null,
                'banner' => $banner,
                'content' => $content
            ]
        );
    }
}
