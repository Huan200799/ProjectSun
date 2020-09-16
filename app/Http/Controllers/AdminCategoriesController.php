<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\AddCategoriesRequest;
use App\Http\Requests\EditCategoriesRequest;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
class AdminCategoriesController extends Controller
{
    private $categoriesRepository;

    public function __construct(
        CategoriesRepositoryInterface $categoriesRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catelist = $this->categoriesRepository->getCategories();

        return view('admin.categories.listcategories', compact(['catelist']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catelist = $this->categoriesRepository->getCategories();

        return view('admin.categories.addcategories', compact(['catelist']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoriesRequest $request)
    {
        $this->categoriesRepository->createCategory($request->all());
        return redirect()->intended('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
            $catelist = $this->categoriesRepository->getCategories();
            $editcate = $this->categoriesRepository->findCategories($id);

            return view('admin.categories.editcategories', compact('catelist', 'editcate'));
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
    public function update(EditCategoriesRequest $request, $id)
    {
        try {
            $update = $this->categoriesRepository->updateCategory($id, $request->all());

            return redirect()->intended('admin/categories');
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
        try {
            $this->categoriesRepository->deleteCategory($id);

            return redirect()->intended('admin/categories');

        } catch (Exception $e) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}


