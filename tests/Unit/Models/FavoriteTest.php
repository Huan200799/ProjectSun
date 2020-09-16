<?php

namespace Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use App\User;
use App\Models\Categories;
use App\Models\Favorite;
use App\Models\Product;
use Tests\CreatesApplication;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ModelTestCase;
class FavoriteTest extends ModelTestCase
{
    use RefreshDatabase;
    protected $user, $order, $orderdetail;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function favorite_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('favorite', [
            'id', 'product_id', 'user_id'
        ]), 1);
    }
    protected function setUp(): void {
        parent::setUp();
        $user = new User([
            'id' => 4,
            'name_user' => 'Nguyen Dinh Huan',
            'email' => 'nguyendinhhuan999@gmail.com',
            'password' => 'huandz',
            'address' => 'Da Nang',
            'phone' => 123456789,
            'level' => 2,
        ]);
        $user->save();
        $categories = new Categories([
            'id' => 1,
            'categories_name' => 'Nuoc Uong',
            'parent_id' => null,
        ]);
        $categories->save();
        $product = new Product([
            'id' => 1,
            'product_name' => 'Tra Sua',
            'product_img' => 'Image',
            'description' => 'huandz',
            'price' => 100000,
            'categories_id' => $categories->id,
        ]);
        $product->save();
        $favorite = new Favorite([
            'id' => 1,
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
        $favorite->save();
        $this->assertEquals($user->id, $favorite->user_id);
        $this->assertEquals($product->id, $favorite->product_id);
    }

    public function a_favorite_belongs_to_a_user()
    {
        $user = new User();
        $user_id = $favorite->user();
        $this->assertBelongsToRelation($user_id, $user, new Favorite());
    }

    public function a_favorite_belongs_to_a_product()
    {
        $product = new Product();
        $product_id = $favorite->product_cate();
        $this->assertBelongsToRelation($product_id, $product, new Favorite());
    }
}
