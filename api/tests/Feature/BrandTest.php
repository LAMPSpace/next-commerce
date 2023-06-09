<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_list_of_brands_successfully(): void
    {
        $this->get('/api/brands')->assertStatus(200);
    }

    public function test_get_a_brand_successfully(): void
    {
        $brand = Brand::factory()->create();
        $this->getJson('/api/brands/' . $brand->id)->assertStatus(200);
    }

    public function test_get_a_brand_fail(): void
    {
        $this->getJson('/api/brands/-1')->assertStatus(404);
    }

    public function test_create_a_new_brand_successfully(): void
    {
        $this->postJson('/api/brands', [
            "name" => "Test",
            "logo" => "logo_test",
            "phone_number" => "0123456789",
            "email" => "test@gmail.com",
            "address" => "123 Cong Hoa street Tan Binh district, hcm, vn",
        ])->assertStatus(201);
    }

    public function test_create_a_new_brand_fail(): void
    {
        $brand = Brand::factory()->create();
        $this->postJson('/api/brands', [
            "name" => $brand->name,
            "logo" => "logo_test",
            "phone_number" => "0123456789",
            "email" => "test@gmail.com",
            "address" => "123 Cong Hoa street Tan Binh district, hcm, vn",
        ])->assertStatus(422);
    }

    public function test_update_a_brand_successfully(): void
    {
        $brand = Brand::factory()->create();
        $this->patchJson('/api/brands/' . $brand->id, [
            "name" => "Test",
            "logo" => "logo_test",
            "phone_number" => "0123456789",
            "email" => "test@gmail.com",
            "address" => "123 Cong Hoa street Tan Binh district, hcm, vn",
        ])->assertStatus(200);
    }

    public function test_update_a_brand_fail_by_using_exist_name(): void
    {
        $brand = Brand::factory()->create();
        $anotherBrand = Brand::factory()->create();
        $this->patchJson('/api/brands/' . $brand->id, [
            "name" => $anotherBrand->name,
            "logo" => "logo_test",
            "phone_number" => "0123456789",
            "email" => "test@gmail.com",
            "address" => "123 Cong Hoa street Tan Binh district, hcm, vn",
        ])->assertStatus(422);
    }

    public function test_update_a_brand_fail_by_updating_brand_does_not_exist(): void
    {
        $this->patchJson('/api/brands/-1', [
            "name" => "Not exist",
            "logo" => "logo_not_exist",
            "phone_number" => "012345678910",
            "email" => "notexist@gmail.com",
            "address" => "Not exist",
        ])->assertStatus(404);
    }

    public function test_delete_a_brand_successfully(): void
    {
        $brand = Brand::factory()->create();
        $this->deleteJson(
            '/api/brands/' . $brand->id
        )->assertStatus(200);
    }

    public function test_delete_a_brand_fail(): void
    {
        $this->deleteJson('/api/brands/-1')->assertStatus(404);
    }
}
