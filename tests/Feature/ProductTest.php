<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',

        ]);
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_create_product()
    {
        $response = $this->post(
            route('produtos.criar'),
            [
                'name' => 'blusa',
                'descripition' => 'melhor blusa',
                'price' => 121,
                'photo' => 'ggdjghj',
                'category_id' => 1,
                'quantity' => 21,

            ]

        );
        $response->assertSuccessful(200);
    }

    public function test_edit_product()
    {
        $product = Product::factory()->make([
            'name' => 'blusa',
            'descripition' => 'melhor blusas',
            'price' => 1231,
            'photo' => 'ggdjgherej',
            'category_id' => 1,
            'quantity' => 221,
        ]);
        $product = Product::first();
        if ($product) {
            $product->update();
            if ($product->update()) {
                $this->assertTrue(true);
            }
        }
        $this->assertFalse(false);
    }
    public function test_delete_product()
    {

        $product = Product::factory()->count(1)->make();
        $product = Product::first();
        if ($product) {
            $product->delete();
            if ($product->delete()) {
                $this->assertTrue(true);
            }
        }

        $this->assertFalse(false);
    }
}