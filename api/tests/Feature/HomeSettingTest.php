<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\HomeSetting;
use Carbon\Carbon;
use Tests\TestCase;

class HomeSettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_list_of_home_settings_successfully(): void
    {
        $this->get('/api/home-settings')->assertStatus(200);
    }

    public function test_get_a_home_setting_successfully(): void
    {
        $homeSetting = HomeSetting::factory()->create();
        $this->getJson('/api/home-settings/' . $homeSetting->id)->assertStatus(200);
    }

    public function test_get_a_current_home_setting_successfully(): void
    {
        HomeSetting::factory()->create([
            "start_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "end_date" => Carbon::today('Asia/Ho_Chi_Minh'),
        ]);
        $this->getJson('/api/current-home-setting')->assertStatus(200);
    }

    public function test_get_a_current_home_setting_fail(): void
    {
        HomeSetting::factory()->create([
            "start_date" => Carbon::tomorrow('Asia/Ho_Chi_Minh'),
            "end_date" => Carbon::tomorrow('Asia/Ho_Chi_Minh'),
        ]);
        $this->getJson('/api/current-home-setting')->assertStatus(404);
    }

    public function test_get_a_home_setting_fail(): void
    {
        $this->getJson('/api/home-settings/-1')->assertStatus(404);
    }

    public function test_create_a_new_home_setting_successfully(): void
    {
        $this->postJson('/api/home-settings', [
            "name" => "Test",
            "description" => "Description",
            "start_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "end_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "banner_height" => 100,
            "banner_main_type" => "swiper",
            "banner_main_pictures" => [
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
            ]
        ])->assertStatus(201);
    }

    public function test_create_a_new_home_setting_fail(): void
    {
        $homeSetting = HomeSetting::factory()->create();
        $this->postJson('/api/home-settings', [
            "name" => $homeSetting->name,
            "description" => "Description",
            "start_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "end_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "banner_height" => 100,
            "banner_main_type" => "swiper",
            "banner_main_pictures" => [
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
            ]
        ])->assertStatus(422);
    }

    public function test_update_a_home_setting_successfully(): void
    {
        $homeSetting = HomeSetting::factory()->create();
        $this->patchJson('/api/home-settings/' . $homeSetting->id, [
            "name" => "Test",
            "description" => "Description",
            "start_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "end_date" => Carbon::today('Asia/Ho_Chi_Minh'),
            "banner_height" => 100,
            "banner_main_type" => "swiper",
            "banner_main_pictures" => [
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
            ]
        ])->assertStatus(200);
    }

    public function test_update_a_home_setting_fail_by_using_exist_name(): void
    {
        $homeSetting = HomeSetting::factory()->create();
        $anotherHomeSetting = HomeSetting::factory()->create();
        $this->patchJson('/api/home-settings/' . $homeSetting->id, [
            "name" => $anotherHomeSetting->name,
            "description" => "Description",
            "banner_height" => 100,
            "banner_main_type" => "swiper",
            "banner_main_pictures" => [
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
            ]
        ])->assertStatus(422);
    }

    public function test_update_a_home_setting_fail_by_updating_home_setting_does_not_exist(): void
    {
        $this->patchJson('/api/home-settings/-1', [
            "name" => "Not exist",
            "description" => "Description",
            "banner_height" => 100,
            "banner_main_type" => "swiper",
            "banner_main_pictures" => [
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
            ]
        ])->assertStatus(404);
    }

    public function test_delete_a_home_setting_successfully(): void
    {
        $homeSetting = HomeSetting::factory()->create();
        $this->deleteJson(
            '/api/home-settings/' . $homeSetting->id
        )->assertStatus(200);
    }

    public function test_delete_a_home_setting_fail(): void
    {
        $this->deleteJson('/api/home-settings/-1')->assertStatus(404);
    }
}
