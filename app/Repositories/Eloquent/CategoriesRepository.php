<?php
namespace App\Repositories\Eloquent;
use App\Models\Categories;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Categories::class;
    }

    public function getCategories()
    {
        $categories = $this->model->orderby('id', 'desc')->paginate(Config::get('app.paginate'));
        return $categories;
    }

    public function getCategoriesHome()
    {
        $categories = $this->model->where('parent_id', '=', null)->orderBy('id', 'asc')->select()->get();
        return $categories;
    }

    public function getCategoriesChildHome()
    {
        $categories = $this->model->where('parent_id', '!=', null)->orderBy('id', 'asc')->select()->get();
        return $categories;
    }

    public function createCategory($data)
    {
        $categories = $this->model->create([
            'categories_name' => $data['categories_name'],
            'parent_id' => $data['parent_id'],
        ]);
    }

    public function findCategories($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function updateCategory($id, array $data)
    {
        $category = $this->model->find($id);
        $category->categories_name = $data['categories_name'];
        $category->parent_id = $data['parent_id'];
        $category->save();
    }

    public function deleteCategory($id)
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
