<?php

namespace App\Service\Interfaces;

use App\Model\Register;
use App\User;

interface IUserService
{
    public function getByUserType($type);

    public function getBylimit($limit);

    public function getUserCount($type);

    public function save(Register $user);

    public function getById($id);

    public function delete($id);

    public function status($id);

    public function update($id,User $user);

    public function password($id,User $user);
}
