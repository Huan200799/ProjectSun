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
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ModelTestCase;
class OrderDetailTest extends ModelTestCase
{
    protected $user, $order, $orderdetail, $categories, $product;
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function order_detail_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('order_detail', [
            'id', 'product_id', 'order_id', 'order_product_name', 'order_product_totalprice', 'quantity'
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
        $product = new Product([
            'id' => 1,
            'product_name' => 'Tra Sua',
            'product_img' => 'Image',
            'description' => 'huandz',
            'price' => 100000,
            'categories_id' => $categories->id,
        ]);
        $product->save();
        $order = new Order([
            'id' => 1,
            'user_id' => $user->id,
            'total_price' => 100000,
            'status' => 0,
        ]);
        $order->save();
        $orderdetail = new OrderDetail([
            'id' => 1,
            'product_id' => $product->id,
            'order_id' => $order->id,
            'order_product_name' => $product->product_name,
            'order_product_totalprice' => $product->price,
            'quantity' => 1,
        ]);
        $orderdetail->save();
        $this->assertEquals($user->id, $order->user_id);
        $this->assertEquals($categories->id, $product->categories_id);
        $this->assertEquals($product->id, $orderdetail->product_id);
        $this->assertEquals($order->id, $orderdetail->order_id);
    }

    public function a_orderdetail_belongs_to_a_user()
    {
        $user = new User();
        $user_id = $orderdetail->order();
        $this->assertBelongsToRelation($user_id, $user, new OrderDetail());
    }

    public function a_orderdetail_belongs_to_a_product()
    {
        $product = new Product();
        $product_id = $orderdetail->product();
        $this->assertBelongsToRelation($product_id, $product, new OrderDetail());
    }
}
