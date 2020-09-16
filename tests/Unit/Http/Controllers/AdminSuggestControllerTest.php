<?php

namespace Tests\Unit\Http\Controllers;

use App\Events\CityShown;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use App\Models\Categories;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminCategoriesController;
class AdminCategoriesControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $db;
    protected $cateMock, $category;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->db = m::mock(
                Connection::class.'[select,update,insert,delete]',
                [m::mock(\PDO::class)]
            );

            $manager = $this->app['db'];
            $manager->setDefaultConnection('mock');

            $r = new \ReflectionClass($manager);
            $p = $r->getProperty('connections');
            $p->setAccessible(true);
            $list = $p->getValue($manager);
            $list['mock'] = $this->db;
            $p->setValue($manager, $list);

            $this->cateMock = m::mock(Categories::class . '[update, delete]');
        });

        parent::setUp();
    }

    public function test_index_returns_view()
    {
        $controller = new AdminCategoriesController();

        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "categories"',
            [],
            m::any(),
        ])->andReturn((object) ['aggregate' => 10]);

        $view = $controller->index();

        $this->assertEquals('admin.categories.listcategories', $view->getName());
        $this->assertArrayHasKey('catelist', $view->getData());
    }

    public function it_can_get_the_child_categories()
    {
        $parent = factory(Categories::class)->create();

        $child = factory(Categories::class)->create([
            'parent_id' => $parent->id
        ]);

        $category = new Categories($parent);
        $children = $category->find($parent->id);

        foreach ($children as $c) {
            $this->assertInstanceOf(Categories::class, $c);
            $this->assertEquals($child->id, $c->id);
        }
    }

    public function it_can_get_the_parent_categories()
    {
        $parent = factory(Categories::class)->create();

        $child = factory(Categories::class)->create([
            'parent_id' => $parent->id
        ]);

        $category = new Categories($child);
        $found = $category->find($category);

        $this->assertInstanceOf(Categories::class, $found);
        $this->assertEquals($parent->id, $child->parent_id);
    }

    public function it_can_create_a_categories()
    {
        $parent = factory(Categories::class)->create();

        $params = [
            'id' => 1,
            'categories_name' => 'boys',
            'parent' => $parent->id,

        ];
        $category = new Categories;
        $created = $category->create($params);
        $this->assertInstanceOf(Categories::class, $created);
        $this->assertEquals($params['id'], $updated->id);
        $this->assertEquals($params['categories_name'], $updated->categories_name);
        $this->assertEquals($params['parent'], $updated->parent_id);
    }


    public function it_can_update_the_categories()
    {
        $parent = factory(Categories::class)->create();
        $params = [
            'id' => 1,
            'categories_name' => 'boys',
            'parent' => $parent->id,
        ];
        $category = new Categories($this->category);
        $updated = $category->update($params);
        $this->assertInstanceOf(Categories::class, $updated);
        $this->assertEquals($params['id'], $updated->id);
        $this->assertEquals($params['categories_name'], $updated->categories_name);
        $this->assertEquals($params['parent'], $updated->parent_id);
    }

    public function it_can_delete_a_categories()
    {
        $category = new Categories($this->category);
        $category->destroy();
        $this->assertDatabaseMissing('categories', collect($this->category)->all());
    }

    public function it_can_delete_file_only_in_the_database()
    {
        $category = new Categories($this->category);
        $category->destroy(['categories' => $this->category->id]);
        $this->assertDatabaseHas('categories', ['parent_id' => null]);
    }
}
