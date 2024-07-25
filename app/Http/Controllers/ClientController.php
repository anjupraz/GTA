<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\ProvinceType;
use App\Http\Requests\BannerEditRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ClientEditRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\TourRequest;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Model\Tour;
use App\Repositories\Interfaces\IProvinceRepository;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IClientService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IGalleryService $galleryService,IClientService $clientService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->galleryService=$galleryService;
        $this->clientService=$clientService;
    }

    public function menu()
    {
        return view('backend.clients.menu');
    }

    public function index(){
        $clientList=$this->postService->getByType(PostType::Client);
        return view('backend.clients.index',compact('clientList'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }

    public function store(ClientRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("CL-001");
            $client =new Blog();
            $client=$this->function->getObject($client,$request);
            $client->category_id=$category->id;
            $client->created_by=Auth::user()->id;
            $this->clientService->saveClient($client);
            toastr()->success('Client added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add client.','Failed');
        }
        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        try{
            $client=$this->postService->getBlogById($id);
            return view('backend.clients.edit',compact('client'));
        }
        catch(Exception $e){
            toastr()->error('Client not found.','Failed');
            return redirect()->route('clients.index');
        }
    }

    public function update(ClientEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("CL-001");
            $client =new Blog();
            $client=$this->function->getObject($client,$request);
            $client->category_id=$category->id;
            $client->created_by=Auth::user()->id;
            $this->clientService->editClient($id,$client);
            toastr()->success('Client updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update client.','Failed');
        }
        return redirect()->route('clients.index');
    }

}
