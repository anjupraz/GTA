<?php

namespace App\Repositories\Interfaces;

interface ICategoryRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getWhere($query=[]);

    public function getByCode($code);

    public function getByLimit($limit,$query=[]);

    public function getByIdType($id,$type);
}
