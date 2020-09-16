<?php
namespace App\Repositories\Eloquent;
use App\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
use Auth;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return User::class;
    }

    public function getUser()
    {
        $user = $this->model->orderby('id', 'desc')->paginate(Config::get('app.paginate'));
        return $user;
    }
    public function updateUser($id, array $data)
    {
        $result = false;
        try {
            $user = $this->model->find($id);
            if(Auth::user()->password = bcrypt($data['password'])){
            $user->password = bcrypt($data['newpassword']);
            $user->save();
            $result = true;
        }
        else
        {
            return back()->withErrors( __('message.forgotpassword'));
        }
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }


    public function deleteUser($id)
    {
        $data = null;
        $result = $this->model->find($id);
        if ($result) {
            $data = $result->delete();

            return $data;
        }

        return $data;
    }
}
