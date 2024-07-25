<?php

namespace App\Service\Interfaces;

use App\Model\Category;

interface ICategoryService
{
    public function save(Category $category);

    public function getById($id);

    public function getByIdType($id,$type);

    public function getByType($type);

    public function getByTypeStatus($type,$status);

    public function update($id,Category $category);

    public function delete($id);

    public function status($id);

    public function featured($id);

    public function getByCode($code);


}
