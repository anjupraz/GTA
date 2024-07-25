<?php

namespace App\Repositories;

use App\Model\Contact;
use App\Repositories\Interfaces\IContactRepository;

class ContactRepository implements IContactRepository
{

    public function get($id)
    {
        return Contact::find($id);
    }


    public function all()
    {
        return Contact::all();
    }

    public function delete($id)
    {
        Contact::destroy($id);
    }


    public function update($id, array $data)
    {
        Contact::find($id)->update($data);
    }

    public function getByLimit($limit,$query=[]){
        $contact=Contact::where($query)->limit($limit)->orderBy('id', 'DESC');
        return $contact->get();
    }
}
