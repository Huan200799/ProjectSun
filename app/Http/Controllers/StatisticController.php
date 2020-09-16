<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Repositories\Interfaces\StatisticRepositoryInterface;
use App\User;
class StatisticController extends Controller
{
    private $statisticRepository;

    public function __construct(
        StatisticRepositoryInterface $statisticRepository
    )
    {
        $this->statisticRepository = $statisticRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $week = $this->statisticRepository->getOrderTuan();

        $month = $this->statisticRepository->getOrderThang();

        $quarter = $this->statisticRepository->getOrderQuy();

        $year = $this->statisticRepository->getOrderNam();

        return view('admin.statistic.home', compact(['week', 'month', 'year', 'quarter']));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
