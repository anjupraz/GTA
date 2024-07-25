<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Event;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\EventEditRequest;
use App\Http\Requests\EventRequest;
use App\Model\Blog;
use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IEventService;
use App\Service\Interfaces\IGalleryService;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct(ICategoryService $categoryService,IPostService $postService,
        IEventService $eventService) {
        $this->function=new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService=$postService;
        $this->eventService=$eventService;
    }

    public function index()
    {
        $eventList=$this->postService->getByType(PostType::Event);
        return view('backend.event.index',compact('eventList'));
    }

    public function all()
    {
        $header="";
        $eventList=$this->eventService->getAllEvents();
        return view('frontend.event',compact('header','eventList'));
    }

    public function completed()
    {
        $header="Completed";
        $eventList=$this->eventService->getPreviousEvents();
        return view('frontend.event',compact('header','eventList'));
    }

    public function ongoing()
    {
        $header="Ongoing";
        $eventList=$this->eventService->getOngoingEvents();
        return view('frontend.event',compact('header','eventList'));
    }

    public function upcoming()
    {
        $header="Upcoming";
        $eventList=$this->eventService->getUpcomingEvents();
        return view('frontend.event',compact('header','eventList'));
    }

    public function eventBySlug($slug){
        try{
            $event=$this->eventService->getEventBySlug($slug);
            if($event == null){
                toastr()->error('Event not found.','Failed');
                return redirect()->route('index');
            }
            return view('frontend.event-detail',compact('event'));
        }
        catch(Exception $e){
            toastr()->error('Event not found.','Failed');
            return redirect()->route('index');
        }
    }

    public function brochure($slug){
        try{
            $event=$this->eventService->getEventBySlug($slug);
            if($event == null){
                return abort(404);
            }
            else{
                if($event->brochure()){
                    return view('frontend.modal.event-brochure',compact('event'));
                }
                else{
                    return abort(404);
                }
            }
        }
        catch(Exception $e){

            return abort(404);
        }
    }



    public function create()
    {
        return view('backend.event.create');
    }

    public function store(EventRequest $request)
    {
        try{
            $category=$this->categoryService->getByCode("E-001");
            $event =new Blog();
            $event=$this->function->getObject($event,$request);
            $event->category_id=$category->id;
            $event->created_by=Auth::user()->id;
            $this->eventService->saveEvent($event);
            toastr()->success('Event added successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add event.','Failed');
        }
        return redirect()->route('event.index');
    }


    public function edit($id)
    {
        try{
            $event=$this->postService->getBlogById($id);
            return view('backend.event.edit',compact('event'));
        }
        catch(Exception $e){
            toastr()->error('Event not found.','Failed');
            return redirect()->route('event.index');
        }
    }

    public function update(EventEditRequest $request,$id)
    {
        try{
            $category=$this->categoryService->getByCode("E-001");
            $event =new Blog();
            $event=$this->function->getObject($event,$request);
            $event->category_id=$category->id;
            $event->created_by=Auth::user()->id;
            $this->eventService->editEvent($id,$event);
            toastr()->success('Event updated successfully.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update event.','Failed');
        }
        return redirect()->route('event.index');
    }
}
