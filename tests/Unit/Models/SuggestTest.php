<?php

namespace Tests\Unit\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use App\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Tests\CreatesApplication;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Suggest;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ModelTestCase;
class SuggestTest extends ModelTestCase
{
    use RefreshDatabase;
    protected $product, $orderdetail, $categories, $suggest;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function suggest_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('suggest', [
            'id', 'product_name', 'product_img', 'description','reason', 'price', 'status', 'categories_id', 'user_id'
        ]), 1);
    }

    protected function setUp(): void {
        parent::setUp();
        $user = new User([
            'id' => 1,
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
        $suggest = new Suggest([
            'id' => 1,
            'product_name' => 'Tra Sua',
            'product_img' => 'Image',
            'description' => 'huandz',
            'reason' => 'Ngon',
            'price' => 1000000,
            'status' => 1,
            'categories_id' => $categories->id,
            'user_id' => $user->id,
        ]);
        $suggest->save();
        $this->assertEquals($categories->id, $suggest->categories_id);
        $this->assertEquals($user->id, $suggest->user_id);
    }

    public function a_suggest_belongs_to_a_categories()
    {
        $categories = new Categories();
        $categories_id = $suggest->product_cate();
        $this->assertBelongsToRelation($categories_id, $categories, new Suggest());
    }

    public function a_suggest_belongs_to_a_users()
    {
        $user = new User();
        $user_id = $suggest->user();
        $this->assertBelongsToRelation($user_id, $user, new Suggest());
    }
}
