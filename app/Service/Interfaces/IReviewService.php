<?php

namespace App\Service\Interfaces;

use App\Model\ReviewData;

interface IReviewService
{
    public function getUserReview($user,$post);

    public function saveUserReview(ReviewData $data);
}
