<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\UserType;
use App\Service\Interfaces\IContactService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\IUserService;
use Illuminate\Http\Request;
use App\Service\Interfaces\IEventService;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IContactService $contactService,IUserService $userService,
                    IPostService $postService,IEventService $eventService)
    {
        $this->middleware('auth');
        $this->contactService = $contactService;
        $this->userService=$userService;
        $this->postService=$postService;
        $this->eventService=$eventService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $contactList=$this->contactService->getByLimit(5);
        $galleryList=$this->postService->getByTypeLimit(5,PostType::Gallery);
        $blogList=$this->postService->getByTypeLimit(5,PostType::Blog);
        $eventCount=$this->postService->getPostCount(PostType::Event);
        $galleryCount=$this->postService->getPostCount(PostType::Gallery);
        $blogCount=$this->postService->getPostCount(PostType::Blog);
        $userCount=$this->userService->getUserCount(UserType::Admin);
        $eventList=$this->eventService->getUpcomingEvents();
        return view('backend.dashboard',compact('contactList','blogList','eventList','galleryList','eventCount','galleryCount','blogCount','userCount'));
    }
}
