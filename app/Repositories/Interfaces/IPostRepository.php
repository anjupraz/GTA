<?php

namespace App\Repositories\Interfaces;

interface IPostRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getWhere($query=[]);

    public function getWhereReverse($query=[]);

    public function getByLimit($limit, $query=[]);

    public function getCount($query=[]);

    public function getByPagination($limit, $query=[]);

    public function getPostBySlug($query=[]);
}
