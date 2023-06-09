<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_list_of_categories_successfully(): void
    {
        $this->get('/api/categories')->assertStatus(200);
    }

    public function test_get_a_category_successfully(): void
    {
        $category = Category::factory()->create();
        $this->getJson('/api/categories/' . $category->id)->assertStatus(200);
    }

    public function test_get_a_category_fail(): void
    {
        $this->getJson('/api/categories/-1')->assertStatus(404);
    }

    public function test_create_a_new_category_successfully(): void
    {
        $this->postJson('/api/categories', [
            "name" => "Test",
            "description" => "Description",
            "icon" => null,
        ])->assertStatus(201);
    }

    public function test_create_a_new_category_fail(): void
    {
        $category = Category::factory()->create();
        $this->postJson('/api/categories', [
            "name" => $category->name,
            "description" => "Description",
            "icon" => null,
        ])->assertStatus(422);
    }

    public function test_update_a_category_successfully(): void
    {
        $category = Category::factory()->create();
        $this->patchJson('/api/categories/' . $category->id, [
            "name" => "Test",
            "description" => "Description",
            "icon" => null,
        ])->assertStatus(200);
    }

    public function test_update_a_category_fail_by_using_exist_name(): void
    {
        $category = Category::factory()->create();
        $anotherCategory = Category::factory()->create();
        $this->patchJson('/api/categories/' . $category->id, [
            "name" => $anotherCategory->name,
            "description" => "Description",
            "icon" => null,
        ])->assertStatus(422);
    }

    public function test_update_a_category_fail_by_updating_category_does_not_exist(): void
    {
        $this->patchJson('/api/categories/-1', [
            "name" => "Not exist",
            "description" => "Description",
            "icon" => null,
        ])->assertStatus(404);
    }

    public function test_delete_a_category_successfully(): void
    {
        $category = Category::factory()->create();
        $this->deleteJson(
            '/api/categories/' . $category->id
        )->assertStatus(200);
    }

    public function test_delete_a_category_fail(): void
    {
        $this->deleteJson('/api/categories/-1')->assertStatus(404);
    }
}
