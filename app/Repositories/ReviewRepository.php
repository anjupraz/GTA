<?php

namespace App\Repositories;

use App\Model\Review;
use App\Repositories\Interfaces\IReviewRepository;

class ReviewRepository implements IReviewRepository
{

    public function get($id)
    {
        return Review::find($id);
    }


    public function all()
    {
        return Review::all();
    }


    public function delete($id)
    {
        Review::destroy($id);
    }


    public function update($id, array $data)
    {
        Review::find($id)->update($data);
    }

    public function getWhere($query=[]){
        return Review::where($query)->orderBy('created_at', 'DESC');
    }
}
