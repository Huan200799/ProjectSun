<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProducts();
    public function getProductsHome();
    public function createProduct(array $data);
    public function findProduct($id);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
    public function product_detail($id);
}
