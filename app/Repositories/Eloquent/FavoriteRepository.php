<?php
namespace App\Repositories\Eloquent;
use App\Models\Favorite;
use App\Models\Product;
use Auth;
use App\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\FavoriteRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Favorite::class;
    }

    public function getFavorite()
    {
        $favorite = DB::table('product')
        ->join('favorite', 'favorite.product_id', '=', 'product.id')
        ->select('product.*', 'favorite.product_id', 'favorite.user_id')->distinct()->get();
        return $favorite;
    }

    public function updateFavorite($id, array $data)
    {
        $result = false;
        try {
            $product = Product::find($id);
            $pavorite = new Favorite;
            $pavorite->product_id = $id;
            $pavorite->user_id  = Auth::user()->id;
            $pavorite->save();
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }
}
