<?php

namespace Tests\Feature\View\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categories;
use App\Models\Product;

class ProductDetailFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function it_can_show_the_product()
    {
        $product = factory(Product::class)->create();
        $this
            ->get(route('/homepage/productdetail/{$product->id}'))
            ->assertStatus(200)
            ->assertSee($product->name)
            ->assertSee($product->description)
            ->assertSee("$product->quantity")
            ->assertSee("$product->price");
    }
}
