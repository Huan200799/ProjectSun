<?php
namespace App\Repositories\Eloquent;
use App\Models\Order;
use App\Models\Product;
use Auth;
use App\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
use Mail;
use App\Mail\AdminAcceptOrder;
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Order::class;
    }

    public function getOrder()
    {
        $order = DB::table('users')->join('order', 'users.id', '=', 'order.user_id')->paginate(Config::get('app.paginate'));
        return $order;
    }

    public function updateOrder($id, array $data)
    {
        $result = false;
        try {
            $order = $this->model->find($id);
            $order->status = 'Being';
            $email = $data['email'];
            $order->save();
            Mail::to($email)->send(new \App\Mail\AdminAcceptOrder($order));
            $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }
}
