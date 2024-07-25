<?php

namespace App\Repositories\Interfaces;

interface IEventRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);

    public function getByLimit($limit, $query=[]);

    public function getEventByPost($id);

    public function getAllEvents();

    public function getUpcomingEvents();

    public function getOngoingEvents();

    public function getPreviousEvents();
}
