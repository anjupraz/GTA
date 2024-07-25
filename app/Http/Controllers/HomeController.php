<?php

namespace App\Http\Controllers;

use App\Service\Interfaces\ICategoryService;
use App\Service\Interfaces\IPostService;
use App\Service\Interfaces\ITripService;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use App\Enums\PostType;
use App\Service\Interfaces\IBookingService;
use App\Service\Interfaces\IClientMessageService;
use App\Service\Interfaces\IEventService;

class HomeController extends Controller
{
    //

    public function __construct(ICategoryService $categoryService, IPostService $postService, IEventService $eventService, IClientMessageService $clientMessageService)
    {
        $this->function = new FunctionUtil();
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->eventService = $eventService;
        $this->clientMessageService = $clientMessageService;
    }

    public function index(Request $request)
    {
        $bannerList = $this->postService->getByTypeStatus(true, PostType::Banner);
        $eventList = $this->eventService->getUpcomingEvents();
        $noticeList = $this->postService->getByTypeStatus(true, PostType::Notice);
        $latestBlogList = $this->postService->getByTypeLimit(3, PostType::Blog);
        $teamCategoryList = $this->categoryService->getByType(PostType::Team);
        $categoryList = $this->categoryService->getByTypeStatus(PostType::Blog, true);
        $latestEventList = $this->postService->getByTypeLimit(3, PostType::Event);
        $clientList = $this->postService->getByTypeStatusReverse(true, PostType::Client);
        return view('frontend.index', compact('noticeList', 'eventList', 'bannerList', 'teamCategoryList', 'latestBlogList', 'latestEventList', 'clientList'));
    }

    public function team(Request $request)
    {
        $teamCategoryList = $this->categoryService->getByType(PostType::Team);
        return view('frontend.team', compact('teamCategoryList'));
    }

    public function about(Request $request)
    {
        return view('frontend.about');
    }

    public function president(Request $request)
    {
        return view('frontend.president-message');
    }

    public function donate(Request $request)
    {
        return view('frontend.donate');
    }

    public function service(Request $request)
    {
        return view('frontend.service');
    }

    public function client(Request $request)
    {
        $clientList = $this->postService->getByTypeStatusReverse(true, PostType::Client);
        $clientMessageList = $this->clientMessageService->getClientMessagePagination(6);
        return view('frontend.client', compact('clientList', 'clientMessageList'));
    }

    public function career(Request $request)
    {
        $vacancyList = $this->postService->getByTypeStatus(true, PostType::Vacancy);
        return view('frontend.vacancy', compact('vacancyList'));
    }


    public function calendar(Request $request)
    {
        return view('frontend.calendar');
    }

    public function term(Request $request)
    {
        return view('frontend.term');
    }

    public function privacy(Request $request)
    {
        return view('frontend.privacy');
    }

    public function faq(Request $request)
    {
        return view('frontend.faq');
    }
}
