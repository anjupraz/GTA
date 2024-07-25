<?php

namespace App\Service;

use App\Enums\PostType;
use App\Model\Blog;
use App\Model\Gallery;
use App\Model\Post;
use App\Repositories\Interfaces\IGalleryRepository;
use App\Repositories\Interfaces\IPostRepository;
use App\Service\Interfaces\IPostService;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class PostService implements IPostService
{

    public function __construct(IPostRepository $postRepository, IGalleryRepository $galleryRepository)
    {
        $this->function = new FunctionUtil();
        $this->postRepository = $postRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function getPostBySlug($slug)
    {
        return $this->postRepository->getPostBySlug([['slug', $slug], ['post_type', PostType::Blog], ['status', true]]);
    }

    public function getByType($type)
    {
        return $this->postRepository->getWhere([['post_type', $type]]);
    }

    public function getByTypeLimit($limit, $type)
    {
        return $this->postRepository->getByLimit($limit, [['status', true], ['post_type', $type]]);
    }

    public function getByTypeStatus($status, $type)
    {
        return $this->postRepository->getWhere([['status', $status], ['post_type', $type]]);
    }

    public function getByTypeStatusReverse($status, $type)
    {
        return $this->postRepository->getWhereReverse([['status', $status], ['post_type', $type]]);
    }

    public function getPostCount($type)
    {
        return $this->postRepository->getCount([['post_type', $type]]);
    }

    public function saveBlog(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $post = $this->function->blogToPost($blog);
            $post->featured = false;
            $post->status = true;
            $post->post_type = PostType::Blog;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $time = Carbon::now()->timestamp;
            if ($blog->featured_gallery) {
                if (array_key_exists('media', $blog->featured_gallery)) {
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'featured_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/blogs/', $filename);
                    $filename = '/uploads/blogs/' . $filename;
                    $gallery = new Gallery();
                    $gallery->media = $filename;
                    $gallery->featured = true;
                    $gallery->status = true;
                    $gallery->post_id = $post->id;
                    $gallery->save();
                }
            }
            if ($blog->gallery) {
                foreach ($blog->gallery as $gallery) {
                    if (array_key_exists('media', $gallery)) {
                        $time = $time + 1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename = 'gallery_' . $post->id . '_' . $time . '.' . $extension;
                        $file->move('uploads/blogs/', $filename);
                        $filename = '/uploads/blogs/' . $filename;
                        $gallery_new = new Gallery();
                        $gallery_new->media = $filename;
                        $gallery_new->featured = false;
                        $gallery_new->status = true;
                        $gallery_new->post_id = $post->id;
                        $gallery_new->save();
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function editBlog($id, Blog $blog)
    {
        try {
            DB::beginTransaction();
            $post = $this->postRepository->get($id);
            $post = $this->function->blogToPost($blog, $post);
            $post->id = $id;
            $post->tags = $post->title . ',' . $post->categories()->title . ',' . $post->code . ',' . $post->categories()->code;
            $post->save();
            $time = Carbon::now()->timestamp;
            if ($blog->featured_gallery) {
                if (array_key_exists('media', $blog->featured_gallery)) {
                    $file = $blog->featured_gallery['media'];
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = 'featured_' . $post->id . '_' . $time . '.' . $extension;
                    $file->move('uploads/blogs/', $filename);
                    $filename = '/uploads/blogs/' . $filename;
                    $gallery = new Gallery();
                    if (array_key_exists('id', $blog->featured_gallery)) {
                        $gallery = $this->galleryRepository->get($blog->featured_gallery['id']);
                    }
                    $gallery->media = $filename;
                    $gallery->featured = true;
                    $gallery->status = true;
                    $gallery->post_id = $post->id;
                    $gallery->save();
                }
            }
            if ($blog->gallery) {
                foreach ($blog->gallery as $gallery) {
                    if (array_key_exists('media', $gallery)) {
                        $time = $time + 1;
                        $file = $gallery['media'];
                        $extension = $file->getClientOriginalExtension(); // getting image extension
                        $filename = 'gallery_' . $post->id . '_' . $time . '.' . $extension;
                        $file->move('uploads/blogs/', $filename);
                        $filename = '/uploads/blogs/' . $filename;
                        $gallery_new = new Gallery();
                        if (array_key_exists('id', $gallery)) {
                            $gallery_new = $this->galleryRepository->get($gallery['id']);
                        }
                        $gallery_new->media = $filename;
                        $gallery_new->featured = false;
                        $gallery_new->status = true;
                        $gallery_new->post_id = $post->id;
                        $gallery_new->save();
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getBlogById($id)
    {
        try {
            $post = $this->postRepository->get($id);
            if ($post != null) {
                $blog = $this->function->postToBlog($post);
                return $blog;
            } else {
                throw new Exception("Service Down! Please try again later");
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getById($id)
    {
        try {
            $post = $this->postRepository->get($id);
            if ($post != null) {
                return $post;
            } else {
                throw new Exception("Service Down! Please try again later");
            }
        } catch (\Exception $e) {
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->postRepository->delete($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function status($id)
    {
        try {
            DB::beginTransaction();
            $post = $this->postRepository->get($id);
            if ($post->post_type == PostType::Banner) {
                $bannerList = $this->postRepository->getWhere([['post_type', PostType::Banner]]);
                foreach ($bannerList as $banner) {
                    $banner->status = false;
                    $banner->save();
                }
            }
            if ($post->status) {
                $post->status = false;
            } else {
                $post->status = true;
            }
            $post->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function featured($id)
    {
        try {
            DB::beginTransaction();
            $post = $this->postRepository->get($id);
            if ($post->featured) {
                $post->featured = false;
            } else {
                $post->featured = true;
            }
            $post->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getPopularBlog($limit)
    {
        $popularBlog = $this->postRepository->getByLimit($limit, [['featured', true], ['status', true], ['post_type', PostType::Blog]]);
        if ($popularBlog == null) {
            $popularBlog = $this->postRepository->getByLimit($limit, [['status', true], ['post_type', PostType::Blog]]);
        } else {
            if (count($popularBlog) < $limit) {
                $latestRegion = $this->postRepository->getByLimit($limit - count($popularBlog), [['featured', false], ['status', true], ['post_type', PostType::Blog]]);
                foreach ($latestRegion as $region) {
                    $popularBlog->push($region);
                }
            }
        }
        return $popularBlog;
    }

    public function getBlogPagination($limit, $category)
    {
        $query = [['status', true], ['post_type', PostType::Blog]];
        if ($category) {
            array_push($query, ['category_id', $category]);
        }
        return $this->postRepository->getByPagination($limit, $query);
    }
}
