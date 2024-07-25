<?php

namespace App\Service\Interfaces;

use App\Model\Blog;

interface IVacancyService{

    public function saveVacancy(Blog $blog);

    public function editVacancy($id,Blog $blog);

}
