<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Http\File;
use App\Models\Categories;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
class AdminProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getProducts();
        return view('admin.product.listproduct', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $this->productRepository->createProduct($request->all());
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $products = $this->productRepository->findProduct($id);

            return view('admin.product.editproduct', compact(['products']));
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        try {
            $update = $this->productRepository->updateProduct($id, $request->all());

            return redirect()->intended('admin/product');
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != null){
            $this->productRepository->deleteProduct($id);
            return redirect('admin/product');
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }
    }
}
