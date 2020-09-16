<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Product::class;
    }

    public function getProducts()
    {
        $product = $this->model->orderby('id', 'desc')->paginate(Config::get('app.paginate'));
        return $product;
    }

    public function getProductsHome()
    {
        $product = $this->model->orderby('id', 'asc')->paginate(Config::get('app.paginate12'));
        return $product;
    }

    public function createProduct($data)
    {
        $result = false;
        try {
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $product = $this->model->create([
            'product_name' => $data['product_name'],
            'product_img' => $fileName,
            'description' => $data['description'],
            'price' => $data['price'],
            'categories_id' => $data['categories_id'],
        ]);
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function findProduct($id)
    {
        try {
        $result = $this->model->find($id);

        return $result;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.edit'));
        }
    }

    public function updateProduct($id, array $data)
    {
        $result = false;
        try {
        if (!isset($data['product_img'])) {
            $product = $this->model->find($id);
            $data['product_img'] = '';
            $fileName = $product->product_img;
        }
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $product = $this->model->find($id);
        $product->product_name = $data['product_name'];
        $product->product_img = $fileName;
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->categories_id = $data['categories_id'];
        $product->save();
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function product_detail($id)
    {
        try {
        $result = $this->model->where('id', '=' , $id)->get();
        return $result;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.edit'));
        }
    }

    public function deleteProduct($id)
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
