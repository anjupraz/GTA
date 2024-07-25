<?php

namespace App\Service\Interfaces;

use App\Model\Blog;
use App\Model\Event;

interface IEventService{

    public function saveEvent(Blog $blog);

    public function editEvent($id,Blog $blog);

    public function getAllEvents();

    public function getUpcomingEvents();

    public function getOngoingEvents();

    public function getPreviousEvents();

    public function getEventBySlug($slug);

}
