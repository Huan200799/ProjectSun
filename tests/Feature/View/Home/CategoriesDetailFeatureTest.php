<?php

namespace Tests\Feature\View\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categories;
use App\Models\Product;

class CategoriesDetailFeatureTest extends TestCase
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

    public function it_can_show_the_categories_and_products()
    {
        $category = factory(Categories::class)->create();
        $product = factory(Product::class)->create();
        $productRepo = new Product($product);
        $productRepo->product_cate([$category->id]);

        $this
            ->get(route('/homepage'))
            ->assertStatus(200)
            ->assertSee($category->categories_name)
            ->assertSee($category->parent_id)
            ->assertSee($product->name)
            ->assertSee($product->description)
            ->assertSee("$product->quantity")
            ->assertSee("$product->price");
    }
}
