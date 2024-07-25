<?php

namespace App\Repositories\Interfaces;


interface IUserRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getWhere($query=[]);

    public function getByLimit($limit, $query=[]);

    public function getCount($query=[]);

}
