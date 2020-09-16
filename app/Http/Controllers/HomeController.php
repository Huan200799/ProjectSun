<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Config;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
class HomeController extends Controller
{
    private $categoriesRepository;
    private $productRepository;
    public function __construct(
        CategoriesRepositoryInterface $categoriesRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->productRepository->getProductsHome();
        $categories = $this->categoriesRepository->getCategoriesHome();
        $categorieChilds = $this->categoriesRepository->getCategoriesChildHome();

        return view('homepage', compact(['categories', 'categorieChilds', 'products']));
    }

    public function get_product_detail($id)
    {
        try {
            $products = $this->productRepository->product_detail($id);
            return view('pages.components.detailproduct', compact(['products']));
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }
}
