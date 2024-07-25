<?php

namespace App\Repositories;

use App\Model\Event;
use App\Repositories\Interfaces\IEventRepository;
use Carbon\Carbon;
use Exception;

class EventRepository implements IEventRepository
{

    public function get($id)
    {
        return Event::find($id);
    }


    public function all()
    {
        return Event::all();
    }

    public function delete($id)
    {
        Event::destroy($id);
    }


    public function update($id, array $data)
    {
        Event::find($id)->update($data);
    }

    public function getByLimit($limit, $query = [])
    {
        $event = Event::where($query)->limit($limit)->orderBy('from_dt', 'DESC');
        return $event->get();
    }

    public function getEventByPost($id)
    {
        return Event::where([['post_id', $id]])->first();
    }

    public function getAllEvents()
    {
        return Event::whereHas('postFilter', function ($q) {
            $q->where('status', true);
        })->orderBy('from_date', 'DESC')->get();
    }

    public function getUpcomingEvents()
    {
        return Event::whereDate('from_date', '>', Carbon::today()->toDateString())->whereDate('to_date', '>', Carbon::today()->toDateString())->whereHas('postFilter', function ($q) {
            $q->where('status', true);
        })->orderBy('from_date', 'DESC')->limit(3)->get();
    }

    public function getOngoingEvents()
    {
        return Event::whereDate('from_date', '<=', Carbon::today()->toDateString())->whereDate('to_date', '>=', Carbon::today()->toDateString())->whereHas('postFilter', function ($q) {
            $q->where('status', true);
        })->orderBy('from_date', 'DESC')->get();
    }

    public function getPreviousEvents()
    {
        return Event::whereDate('from_date', '<=', Carbon::today()->toDateString())->whereDate('to_date', '<=', Carbon::today()->toDateString())->whereHas('postFilter', function ($q) {
            $q->where('status', true);
        })->orderBy('from_date', 'DESC')->get();
    }
}
