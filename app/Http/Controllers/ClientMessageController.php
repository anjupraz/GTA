<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ClientEditRequest;
use App\Http\Requests\ClientMessageEditRequest;
use App\Http\Requests\ClientMessageRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\TourRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Repositories\Interfaces\IProvinceRepository;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IClientMessageService;
use App\Service\Interfaces\IClientService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMessageController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService,IClientMessageService $clientMessageService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
        $this->clientMessageService=$clientMessageService;
    }

    public function index(){
        $clientList=$this->postService->getByType(PostType::Client_Message);
        return view('backend.client-message.index',compact('clientList'));
    }

    public function create()
    {
        return view('backend.client-message.create');
    }

    public function store(ClientMessageRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("CM-001");
            $client =new Blog();
            $client=$this->function->getObject($client,$request);
            $client->category_id=$category->id;
            $client->created_by=Auth::user()->id;
            $this->clientMessageService->saveClientMessage($client);
            toastr()->success('Client message added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add client message.','Failed');
        }
        return redirect()->route('client-message.index');
    }

    public function edit($id)
    {
        try{
            $client=$this->postService->getBlogById($id);
            return view('backend.client-message.edit',compact('client'));
        }
        catch(Exception $e){
            toastr()->error('Client message not found.','Failed');
            return redirect()->route('client-message.index');
        }
    }

    public function update(ClientMessageEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("CM-001");
            $client =new Blog();
            $client=$this->function->getObject($client,$request);
            $client->category_id=$category->id;
            $client->created_by=Auth::user()->id;
            $this->clientMessageService->editClientMessage($id,$client);
            toastr()->success('Client message updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update client message.','Failed');
        }
        return redirect()->route('client-message.index');
    }

}
