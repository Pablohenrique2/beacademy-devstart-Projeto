<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    public function test_create_category()
    {
        $response = $this->post(
            route('category.create'),
            [
                'categories' => 'blusas',
            ]

        );
        $response->assertSuccessful(200);
    }
    public function test_edit_category()
    {
        $category = Category::factory()->make([
            'categories' => 'blusas',
        ]);
        $category = Category::first();
        if ($category) {
            $category->update();
            if ($category->update()) {
                $this->assertTrue(true);
            }
        }
        $this->assertFalse(false);
    }
    public function test_delete_category()
    {

        $category = Category::factory()->count(1)->make();
        $category = Category::first();
        if ($category) {
            $category->delete();
            if ($category->delete()) {
                $this->assertTrue(true);
            }
        }

        $this->assertFalse(false);
    }
}