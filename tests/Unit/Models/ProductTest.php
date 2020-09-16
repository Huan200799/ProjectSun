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
class ProductTest extends ModelTestCase
{
    public $product, $orderdetail, $categories;
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

    public function product_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('product', [
            'id', 'product_name', 'product_img', 'description', 'price', 'categories_id'
        ]), 1);
    }

    protected function setUp(): void {
        parent::setUp();
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
        $this->assertEquals($categories->id, $product->categories_id);
    }

    public function a_product_be_long_to_categories()
    {
        $categories = new Categories();
        $categories_id = $product->product_cate();
        $this->assertBelongsToRelation($categories_id, $categories, new Product());
    }

    public function a_product_has_many_orderdetail()
    {
        $product = new Product();
        $orderdetail = $product->orderdetail();
        $this->assertHasManyRelation($orderdetail, $product, new OrderDetail());
    }
}
