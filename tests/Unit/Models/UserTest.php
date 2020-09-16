<?php

namespace Tests\Unit\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use App\User;
use App\Models\Order;
use Tests\CreatesApplication;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ModelTestCase;
class UserTest extends ModelTestCase
{
    use RefreshDatabase;
    protected $user, $order;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function users_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('users', [
            'id', 'name_user', 'email', 'password', 'address', 'phone', 'level'
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
        $users = User::find(1)->get();
        $this->assertCount(1, $users);
    }

    public function test_status_login(){
        $user = new User([
            'id' => 2,
            'name_user' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'huandz',
            'address' => 'Da Nang',
            'phone' => 123456789,
            'level' => 1,
        ]);
        $user->save();
        $user->setAttribute('level', 'admin');
        $this->assertEquals($user->level, $user->getAttributes()['level']);
    }

    public function test_find_id_update()
    {
        User::unguard();
        $initial = [
            'id' => 3,
            'name_user' => 'Nguyen Dinh Huan',
            'email' => 'nguyendinhhuan20071999@gmail.com',
            'password' => 'huandz',
            'address' => 'Da Nang',
            'phone' => 123456789,
            'level' => 2,
        ];
        $user = new User($initial);
        $user->save();
        $data = User::find($user->id);
        $this->assertEquals($user->id,$data->id);
        $this->assertEquals($user->name_user,$data->name_user);
        $this->assertEquals($user->email,$data->email);
    }

    public function a_user_has_many_order()
    {
        $user = new User();
        $order = $user->order();
        $this->assertHasManyRelation($order, $user, new Order());
    }
}
