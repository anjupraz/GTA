<?php

namespace App\Service;

use App\Jobs\ContactJob;
use App\Mail\ContactMail;
use App\Model\Contact;
use App\Repositories\Interfaces\IContactRepository;
use App\Service\Interfaces\IContactService;
use App\Util\FunctionUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactService implements IContactService{


    public function __construct(IContactRepository $contactRepository) {
        $this->function=new FunctionUtil();
        $this->contactRepository=$contactRepository;
    }

    public function send(Contact $contact){
        try{
            DB::beginTransaction();
            $contact->save();
            DB::commit();
            dispatch(new ContactJob($contact));
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getBylimit($limit)
    {
        return $this->contactRepository->getBylimit($limit);
    }

    public function delete($id){
        try{
            DB::beginTransaction();
            $this->contactRepository->delete($id);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

}
