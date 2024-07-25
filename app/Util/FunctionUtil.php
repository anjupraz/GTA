<?php

namespace App\Util;

use App\Enums\PostType;
use App\Enums\ReviewType;
use App\Enums\ToastType;
use App\Model\Blog;
use App\Model\Post;
use App\Model\Review;
use App\Model\ReviewData;
use App\Model\TeamDetail;
use App\Model\Tour;
use Psy\Util\Json;

class FunctionUtil
{

    public static function getObject($model, $request)
    {
        $data = $request->only($model->getFillable());
        $model->fill($data);
        return $model;
    }

    public static function teamToPost(TeamDetail $team, $post = null)
    {
        if ($post == null) {
            $post = new Post();
        }
        $post->title = $team->title;
        $post->code = $team->code;
        $post->description = $team->description;
        $post->category_id = $team->category_id;
        $post->created_by = $team->created_by;
        return $post;
    }

    public static function postToTeam(Post $post)
    {
        $team = new TeamDetail();
        $team->id = $post->id;
        $team->title = $post->title;
        $team->code = $post->code;
        $team->description = $post->description;
        $team->category_id = $post->category_id;
        $team->created_by = $post->created_by;
        $featured_image = [];
        $featured_image['media'] = $post->featured()->media;
        $featured_image['id'] = $post->featured()->id;
        $teamData = $post->Team();
        $team->featured_gallery = $featured_image;
        $team->facebook = $teamData->facebook;
        $team->instagram = $teamData->instagram;
        $team->twitter = $teamData->twitter;
        $team->google = $teamData->google;
        $team->linkedin = $teamData->linkedin;
        $team->biography = $teamData->biography;
        $team->team_order = $teamData->team_order;
        return $team;
    }


    public static function blogToPost(Blog $blog, $post = null)
    {
        if ($post == null) {
            $post = new Post();
        }
        $post->title = $blog->title;
        $post->slug = $blog->slug;
        $post->code = $blog->code;
        $post->description = $blog->description;
        $post->category_id = $blog->category_id;
        $post->created_by = $blog->created_by;
        return $post;
    }

    public static function postToBlog(Post $post)
    {
        $blog = new Blog();
        $blog->id = $post->id;
        $blog->title = $post->title;
        $blog->slug = $post->slug;
        $blog->code = $post->code;
        $blog->description = $post->description;
        $blog->category_id = $post->category_id;
        $blog->created_by = $post->created_by;
        $i = 0;
        $image = [];
        $featured_image = [];
        $cover_gallery = [];
        foreach ($post->gallery() as $gallery) {
            if ($gallery->featured) {
                $featured_image['media'] = $gallery->media;
                $featured_image['id'] = $gallery->id;
            } elseif ($gallery->cover) {
                $cover_gallery['media'] = $gallery->media;
                $cover_gallery['id'] = $gallery->id;
            } else {
                $image[$i]['media'] = $gallery->media;
                $image[$i]['id'] = $gallery->id;
                $i++;
            }
        }
        $video = $post->video();
        if ($video) {
            $blog->video = $video->media;
        }
        $blog->featured_gallery = $featured_image;
        $blog->cover_gallery = $cover_gallery;
        $blog->gallery = $image;
        if ($post->post_type == PostType::Event) {
            $document = [];
            $brochure = [];
            $event = $post->schedule();
            $blog->from_date = $event->from_date;
            $blog->to_date = $event->to_date;
            $i = 0;
            $floor_plan = $post->floorPlan();

            if ($floor_plan) {
                $fp = [];
                $fp['media'] = $floor_plan->media;
                $fp['id'] = $floor_plan->id;
                $blog->floor_plan = $fp;
            }
            foreach ($post->document() as $doc) {
                if ($doc->featured) {
                    $brochure['media'] = $doc->media;
                    $brochure['id'] = $doc->id;
                } else {
                    $document[$i]['media'] = $doc->media;
                    $document[$i]['id'] = $doc->id;
                    $document[$i]['name'] = $doc->title;
                    $i++;
                }
            }
            $blog->brochure = $brochure;
            $blog->document = $document;
        }
        return $blog;
    }

    public static function reviewToReviewData($reviewList)
    {
        $data = new ReviewData();
        foreach ($reviewList as $review) {
            if (ReviewType::Accomodation == $review->review_type) {
                $data->accomodation_rating = $review->review;
            }
            if (ReviewType::Meals == $review->review_type) {
                $data->meals_rating = $review->review;
            }
            if (ReviewType::Destination == $review->review_type) {
                $data->destination_rating = $review->review;
            }
            if (ReviewType::Value_For_Money == $review->review_type) {
                $data->value_rating = $review->review;
            }
            if (ReviewType::Transportation == $review->review_type) {
                $data->transport_rating = $review->review;
            }
            if (ReviewType::Itinerary == $review->review_type) {
                $data->itinerary_rating = $review->review;
            }
            if (ReviewType::Overall == $review->review_type) {
                $data->overall_rating = $review->review;
            }
        }
        return $data;
    }

    public function reviewDatatoReview(ReviewData $data)
    {
        $reviewList = [];
        $total = 0;
        $review = new Review();
        $review->review_type = ReviewType::Accomodation;
        $review->review = $data->accomodation_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Meals;
        $review->review = $data->meals_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Destination;
        $review->review = $data->destination_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Value_For_Money;
        $review->review = $data->value_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Transportation;
        $review->review = $data->transport_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Itinerary;
        $review->review = $data->itinerary_rating;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        $review = new Review();
        $review->review_type = ReviewType::Overall;
        $total = ($data->accomodation_rating + $data->meals_rating + $data->destination_rating + $data->value_rating + $data->transport_rating + $data->itinerary_rating) / 6;
        $review->review = $total;
        $review->post_id = $data->post_id;
        $review->user_id = $data->user_id;
        array_push($reviewList, $review);
        return $reviewList;
    }
}
