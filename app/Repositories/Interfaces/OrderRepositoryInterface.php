<?php
namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getOrder();
    public function updateOrder($id, array $data);
}
