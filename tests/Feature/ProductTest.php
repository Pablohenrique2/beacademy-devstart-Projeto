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
    public function test_Product()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',

        ]);
        $this->actingAs($user);

        $response = $this->get('/produtos/criar');

        $response->assertStatus(200);
    }
    public function test_create_Product()
    {
        $response = $this->post(
            '/produtos/criar',
            [
                'name' => 'blusa',
                'descripition' => 'melhor blusa',
                'price' => 121,
                'photo' => 'ggdjghj',
                'category_id' => 1,
                'quantity' => 21,

            ]

        );
        $response->assertStatus(200);
    }
}