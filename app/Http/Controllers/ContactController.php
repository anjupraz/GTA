<?php

namespace App\Http\Controllers;

use App\Enums\ToastType;
use App\Model\Contact;
use App\Http\Requests\ContactRequest;
use App\Service\Interfaces\IContactService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(IContactService $contactService) {
        $this->function=new FunctionUtil();
        $this->contactService = $contactService;
        
    }

    public function index()
    {
        return view('frontend.contact-us');
    }

    public function store(ContactRequest $request)
    {
        try{
            $contact =new Contact();
            $contact=$this->function->getObject($contact,$request);
            $this->contactService->send($contact);
            toastr()->success('Message has been sent.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to send message.','Failed');
        }
        return redirect()->back();
    }

    public function show(Contact $contact)
    {
        $contactList=$this->contactService->getByLimit(100);
        return view('backend.contact.index',compact('contactList'));
    }

    public function destroy($id)
    {
        try{
            $this->contactService->delete($id);
            toastr()->success('Enquiry message deleted successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to delete enquiry message.','Failed');
        }
        return redirect()->back();
    }

}
