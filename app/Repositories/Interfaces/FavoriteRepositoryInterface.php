<?php
namespace App\Repositories\Interfaces;

interface FavoriteRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getFavorite();
    public function updateFavorite($id, array $data);
}
