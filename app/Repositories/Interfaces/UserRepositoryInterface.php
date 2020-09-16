<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getUser();
    public function updateUser($id, array $data);
    public function deleteUser($id);
}
