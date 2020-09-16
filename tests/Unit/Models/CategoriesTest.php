<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;
use Mockery\Mock;
use Faker\Factory;
use App\Models\Categories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ModelTestCase;
class CategoriesTest extends ModelTestCase
{
    use RefreshDatabase;
    protected $categories;

    private $faker;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function categories_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('categories', [
            'id', 'categories_name', 'parent_id'
        ]), 1);
    }

    public function setUp(): void
    {
        parent::setUp();
        $categories = new Categories([
            'id' => 1,
            'categories_name' => 'Nuoc Uong',
            'parent_id' => null,
        ]);
        $categories->save();
        $this->assertNull($categories->parent_id);
    }
}
