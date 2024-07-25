<?php

namespace App\Repositories;

use App\Model\Team;
use App\Repositories\Interfaces\ITeamRepository;

class TeamRepository implements ITeamRepository
{

    public function get($id)
    {
        return Team::find($id);
    }


    public function all()
    {
        return Team::all();
    }


    public function delete($id)
    {
        Team::destroy($id);
    }


    public function update($id, array $data)
    {
        Team::find($id)->update($data);
    }

    public function getWhere($query=[]){
        return Team::where($query)->orderBy('created_at', 'DESC');
    }
}
