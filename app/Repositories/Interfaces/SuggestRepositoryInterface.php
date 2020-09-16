<?php
namespace App\Repositories\Interfaces;

interface SuggestRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getSuggest();
    public function createSuggest(array $data);
    public function updateSuggest($id, array $data);
    public function deleteSuggest($id);
}
