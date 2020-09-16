<?php

namespace Tests\Feature\View\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categories;
use App\Models\Product;
class HomeFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/homepage');

        $response->assertStatus(200);
    }

    public function it_should_show_the_homepage()
    {
        $cat1 = factory(Categories::class)->create([
            'id' => 1,
            'categories_name' => 'Nuoc Uong',
            'parent_id' => null,
        ]);
        factory(Product::class, 3)->create()->each(function (Product $product) use ($cat1) {
            $cat1Repo = new Categories($cat1);
            $cat1Repo->product_cate($product);
        });
        $cat2 = factory(Categories::class)->create([
            'id' => 2,
            'categories_name' => 'Thuc An',
            'parent_id' => null,
        ]);
        factory(Product::class, 3)->create()->each(function (Product $product) use ($cat2) {
            $cat2Repo = new Categories($cat2);
            $cat2Repo->product_cate($product);
        });
        $this
            ->get(route('homepage'))
            ->assertSee('Login')
            ->assertSee('Register')
            ->assertSee($cat1->name)
            ->assertSee($cat2->name)
            ->assertStatus(200);
    }

    public function change_method_is_not_empty()
    {
        $cat1 = factory(Category::class)->create([
            'id' => 1,
            'categories_name' => 'Nuoc Uong',
            'parent_id' => null,
        ]);
        factory(Product::class, 3)->create()->each(function (Product $product) use ($cat1) {
            $cat1Repo = new Categories($cat1);
            $cat1Repo->product_cate($product);
        });
        $cat2 = factory(Category::class)->create([
            'id' => 2,
            'categories_name' => 'Thuc An',
            'parent_id' => null,
        ]);
        factory(Product::class, 3)->create()->each(function (Product $product) use ($cat2) {
            $cat2Repo = new Categories($cat2);
            $cat2Repo->product_cate($product);
        });
        $this->assertInstanceOf(Collection::class, $cat1->products);
        $this->assertNotEmpty($cat1->products);
        $this->assertTrue(!$cat1->products->isEmpty());
        $this->assertTrue($cat2->products->isNotEmpty());

    }
}
