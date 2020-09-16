<?php
namespace App\Repositories\Interfaces;

interface CategoriesRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getCategories();
    public function getCategoriesHome();
    public function getCategoriesChildHome();
    public function createCategory(array $data);
    public function findCategories($id);
    public function updateCategory($id, array $data);
    public function deleteCategory($id);
}
