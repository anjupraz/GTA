<?php

namespace App\Service;

use App\Enums\MediaType;
use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Event;
use App\Model\Gallery;
use App\Repositories\Interfaces\IEventRepository;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IEventService;
use App\Service\Interfaces\IVacancyService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VacancyService implements IVacancyService
{
    public function __construct(IPostRepository $postRepository, IGalleryRepository $galleryRepository)
    {
        $this->function = new FunctionUtil();
        $this->postRepository = $postRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function saveVacancy(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $post = $this->function->blogToPost($blog);
            $post->featured = false;
            $post->status = true;
            $post->post_type = PostType::Vacancy;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $time = Carbon::now()->timestamp;
            if ($blog->brochure) {
                if (array_key_exists('media', $blog->brochure)) {
                    $file = $blog->brochure['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'document_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/vacancy/', $filename);
                    $filename = '/uploads/vacancy/' . $filename;
                    $gallery = new Gallery();
                    $gallery->media = $filename;
                    $gallery->type = MediaType::Document;
                    $gallery->featured = true;
                    $gallery->status = true;
                    $gallery->post_id = $post->id;
                    $gallery->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editVacancy($id, Blog $blog)
    {
        try {
            DB::beginTransaction();
            $post = $this->postRepository->get($id);
            $post = $this->function->blogToPost($blog, $post);
            $post->id = $id;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $time = Carbon::now()->timestamp;
            if ($blog->brochure) {
                if (array_key_exists('media', $blog->brochure)) {
                    $file = $blog->brochure['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'document_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/vacancy/', $filename);
                    $filename = '/uploads/vacancy/' . $filename;
                    $gallery = new Gallery();
                    if (array_key_exists('id', $blog->brochure)) {
                        $gallery = $this->galleryRepository->get($blog->brochure['id']);
                    }
                    $gallery->media = $filename;
                    $gallery->type = MediaType::Document;
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
