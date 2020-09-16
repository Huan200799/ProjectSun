<?php

namespace Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use App\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Tests\CreatesApplication;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ModelTestCase;
class OrderTest extends ModelTestCase
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
    public function order_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('order', [
            'id', 'user_id', 'total_price', 'status'
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
        $order = new Order([
            'id' => 1,
            'user_id' => $user->id,
            'total_price' => 100000,
            'status' => 0,
        ]);
        $order->save();
        $this->assertEquals($user->id, $order->user_id);
        $shops = User::find(1)->order()->get();
        $this->assertCount(1, $shops);
    }

    public function a_order_belongs_to_a_user()
    {
        $user = new User();
        $user_id = $order->user();
        $this->assertBelongsToRelation($user_id, $user, new Order());
    }

    public function a_order_has_many_orderdetail()
    {
        $order = new Order();
        $orderdetail = $order->orderdetail();
        $this->assertHasManyRelation($orderdetail, $order, new OrderDetail());
    }
}
