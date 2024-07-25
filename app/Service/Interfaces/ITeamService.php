<?php

namespace App\Service\Interfaces;

use App\Model\TeamDetail;

interface ITeamService
{
    public function saveTeam(TeamDetail $team);

    public function editTeam($id,TeamDetail $team);

    public function getTeamById($id);
}
