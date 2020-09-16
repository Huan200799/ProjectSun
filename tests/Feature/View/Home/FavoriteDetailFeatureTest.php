<?php

namespace Tests\Feature\View\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Favorite;
use App\User;
class FavoriteDetailFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/favorite');

        $response->assertStatus(200);
    }

    public function it_can_add_favorite()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();

        $favorite = factory(Favorite::class)->create([
            $products->product_cate($product),
            $users->user($user),
        ]);

        $this
            ->get(route('favorite', $favorite->user()))
            ->assertSee($favorite->product_cate())
            ->assertStatus(200);
    }
}
