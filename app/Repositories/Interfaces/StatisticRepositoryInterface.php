<?php
namespace App\Repositories\Interfaces;

interface StatisticRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getOrderTuan();
    public function getOrderThang();
    public function getOrderQuy();
    public function getOrderNam();
}
