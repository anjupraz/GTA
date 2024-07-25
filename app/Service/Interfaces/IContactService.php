<?php

namespace App\Service\Interfaces;

use App\Model\Contact;

interface IContactService{

    public function send(Contact $contact);

    public function getBylimit($limit);

    public function delete($id);

}
