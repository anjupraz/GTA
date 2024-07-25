<?php

namespace App\Repositories\Interfaces;

interface IReviewRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getWhere($query=[]);
}
