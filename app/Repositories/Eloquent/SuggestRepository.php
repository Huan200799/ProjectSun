<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Suggest;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\SuggestRepositoryInterface;
use DB;
use Auth;
use Illuminate\Support\Facades\Config;
class SuggestRepository extends BaseRepository implements SuggestRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Suggest::class;
    }

    public function getSuggest()
    {
        $listsuggest = $this->model->orderby('id', 'desc')->paginate(Config::get('app.paginate'));
        return $listsuggest;
    }

    public function createSuggest(array $data)
    {
        $result = false;
        try {
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $suggest = $this->model->create([
            'product_name' => $data['product_name'],
            'product_img' => $fileName,
            'description' => $data['description'],
            'reason' => $data['reason'],
            'status' => 1,
            'price' => $data['price'],
            'categories_id' => $data['categories_id'],
            'user_id' => Auth::user()->id,
        ]);
        $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }



    public function updateSuggest($id, array $data)
    {
        $result = false;
        try {
            $suggest = $this->model->find($id);
            $suggest->status = 0;
            $suggest->save();
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }

    public function deleteSuggest($id)
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
