<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{

    public function get($id)
    {
        return User::find($id);
    }


    public function all()
    {
        return User::all();
    }


    public function delete($id)
    {
        User::destroy($id);
    }


    public function update($id, array $data)
    {
        User::find($id)->update($data);
    }

    public function getWhere($query=[]){
        $user=User::where($query)->orderBy('name', 'DESC');
        return $user->get();
    }

    public function getByLimit($limit,$query=[]){
        $user=User::where($query)->limit($limit)->orderBy('id', 'DESC');
        return $user->get();
    }

    public function getCount($query=[]){
        $user=User::where($query)->orderBy('id', 'DESC');
        return $user->count();
    }

}
