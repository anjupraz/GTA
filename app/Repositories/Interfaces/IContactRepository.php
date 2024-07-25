<?php

namespace App\Repositories\Interfaces;

interface IContactRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getByLimit($limit, $query=[]);
}
