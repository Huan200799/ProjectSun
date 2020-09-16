<?php

namespace Tests\Feature\View\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Suggest;
use App\User;
class SuggestDetailFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/suggest');

        $response->assertStatus(200);
    }

    public function it_can_add_suggest()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();

        $suggest = factory(Suggest::class)->create([
            $products->product_cate($product),
            $users->user($user),
        ]);

        $this
            ->get(route('suggest', $suggest->user()))
            ->assertSee($suggest->product_cate())
            ->assertStatus(200);
    }
}
