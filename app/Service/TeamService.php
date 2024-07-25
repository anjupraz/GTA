<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Gallery;
use App\Model\Team;
use App\Model\TeamDetail;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Repositories\Interfaces\ITeamRepository;
use App\Service\Interfaces\ITeamService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class TeamService implements ITeamService
{

    public function __construct(
        IPostRepository $postRepository,
        IGalleryRepository $galleryRepository,
        ITeamRepository $teamRepository
    ) {
        $this->function = new FunctionUtil();
        $this->postRepository = $postRepository;
        $this->galleryRepository = $galleryRepository;
        $this->teamRepository = $teamRepository;
    }

    public function getTeamById($id)
    {
        try {
            $post = $this->postRepository->get($id);
            if ($post != null) {
                $blog = $this->function->postToTeam($post);
                return $blog;
            } else {
                throw new Exception("Service Down! Please try again later");
            }
        } catch (Exception $e) {
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function saveTeam(TeamDetail $team)
    {
        try {
            DB::beginTransaction();
            $post = $this->function->teamToPost($team);
            $post->featured = false;
            $post->status = true;
            $post->post_type = PostType::Team;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $teamData = new Team();
            $teamData->facebook = $team->facebook;
            $teamData->instagram = $team->instagram;
            $teamData->twitter = $team->twitter;
            $teamData->google = $team->google;
            $teamData->linkedin = $team->linkedin;
            $teamData->biography = $team->biography;
            $teamData->post_id = $post->id;
            $teamData->team_order = $team->team_order;
            $teamData->save();
            $time = Carbon::now()->timestamp;
            if ($team->featured_gallery) {
                if (array_key_exists('media', $team->featured_gallery)) {
                    $file = $team->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'featured_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/teams/', $filename);
                    $filename = '/uploads/teams/' . $filename;
                    $gallery = new Gallery();
                    $gallery->media = $filename;
                    $gallery->featured = true;
                    $gallery->status = true;
                    $gallery->post_id = $post->id;
                    $gallery->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editTeam($id, TeamDetail $team)
    {
        try {
            DB::beginTransaction();
            $post = $this->postRepository->get($id);
            $post = $this->function->teamToPost($team, $post);
            $post->id = $id;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $teamData = $post->Team();
            $teamData->facebook = $team->facebook;
            $teamData->instagram = $team->instagram;
            $teamData->twitter = $team->twitter;
            $teamData->google = $team->google;
            $teamData->linkedin = $team->linkedin;
            $teamData->biography = $team->biography;
            $teamData->team_order = $team->team_order;
            $teamData->post_id = $post->id;
            $teamData->save();
            $time = Carbon::now()->timestamp;
            if ($team->featured_gallery) {
                if (array_key_exists('media', $team->featured_gallery)) {
                    $file = $team->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'featured_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/team/', $filename);
                    $filename = '/uploads/team/' . $filename;
                    $gallery = new Gallery();
                    if (array_key_exists('id', $team->featured_gallery)) {
                        $gallery = $this->galleryRepository->get($team->featured_gallery['id']);
                    }
                    $gallery->media = $filename;
                    $gallery->featured = true;
                    $gallery->status = true;
                    $gallery->post_id = $post->id;
                    $gallery->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }
}
