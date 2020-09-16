<?php
namespace App\Repositories\Eloquent;
use App\Models\Order;
use App\Models\Product;
use Auth;
use App\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\StatisticRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
class StatisticRepository extends BaseRepository implements StatisticRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Order::class;
    }

    public function getOrderTuan()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $week = $this->model->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();
        return $week;
    }

    public function getOrderThang()
    {
        $currentMonth = date('m');
        $month = $this->model->whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();
        return $month;
    }

    public function getOrderQuy()
    {
        $quarter = $this->model->whereRaw('QUARTER(created_at) = ?', Carbon::now()->quarter)->count();
        return $quarter;
    }

    public function getOrderNam()
    {
        $currentYear = date('Y');
        $year = $this->model->whereRaw('YEAR(created_at) = ?',[$currentYear])->count();
        return $year;
    }

}
