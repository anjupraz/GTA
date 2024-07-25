<?php

namespace App\Repositories;

use App\Enums\MediaType;
use App\Model\Gallery;
use App\Repositories\Interfaces\IGalleryRepository;

class GalleryRepository implements IGalleryRepository
{

    public function get($id)
    {
        return Gallery::find($id);
    }


    public function all()
    {
        return Gallery::all();
    }


    public function delete($id)
    {
        Gallery::destroy($id);
    }


    public function update($id, array $data)
    {
        Gallery::find($id)->update($data);
    }

    public function getVideo($id)
    {
        return Gallery::where([['type',MediaType::Video],['post_id',$id]])->first();
    }
}
