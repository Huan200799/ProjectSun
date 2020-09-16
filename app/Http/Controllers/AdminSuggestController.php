<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Suggest;
use App\User;
use Session;
use Auth;
use App\Repositories\Interfaces\SuggestRepositoryInterface;
class AdminSuggestController extends Controller
{

    private $suggestRepository;

    public function __construct(
        SuggestRepositoryInterface $suggestRepository
    )
    {
        $this->suggestRepository = $suggestRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listsuggest = $this->suggestRepository->getSuggest();
        return view('admin.suggest.listsuggest', compact(['listsuggest']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = $this->suggestRepository->updateSuggest($id, $request->all());

            return redirect()->intended('admin/suggest');
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
            $this->suggestRepository->deleteSuggest($id);

            return redirect()->intended('admin/suggest');

        } catch (Exception $e) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}
