<?php

namespace App\Service;

use App\Enums\ReviewType;
use App\Model\Review;
use App\Model\ReviewData;
use App\Repositories\Interfaces\IReviewRepository;
use App\Repositories\Interfaces\ITripRepository;
use App\Service\Interfaces\IReviewService;
use App\Util\FunctionUtil;
use Exception;
use Illuminate\Support\Facades\DB;

class ReviewService implements IReviewService
{

    public function __construct(IReviewRepository $reviewRepository) {
        $this->function=new FunctionUtil();
        $this->reviewRepository=$reviewRepository;
    }

    public function getUserReview($user,$post){
        $review= $this->reviewRepository->getWhere([['user_id',$user],['post_id',$post]])->get();
        return $this->function->reviewToReviewData($review);
    }

    public function saveUserReview(ReviewData $data){
        try{
            DB::beginTransaction();
            $reviewList= $this->function->reviewDatatoReview($data);
            foreach($reviewList as $review){
                $new_review= $this->reviewRepository->getWhere([['review_type',$review->review_type],
                    ['user_id',$review->user_id],['post_id',$review->post_id]])->first();
                if($new_review == null){
                    $new_review=new Review();
                    $new_review->review_type=$review->review_type;
                    $new_review->user_id=$review->user_id;
                    $new_review->post_id=$review->post_id;
                }
                $new_review->review=$review->review;
                $new_review->save();
            }
            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }
}
