<div class="sidebar_top"></div>
<div class="sidebar">
    <div class="content">
        <ul class="sidebar_widget">
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Blog Category</span></h2>
                <ul class="posts blog withthumb ">
                    @foreach($categoryList as $category)
                        <li>
                            {{-- <div class="post_circle_thumb thumb_box">
                                @if($category->profile)
                                    <a href="{{route('blog.view',['category' => $category->id])}}">
                                        <div class="alignleft frame post_thumb thumb" style="background-image:url({{$category->profile}})"></div>
                                    </a>
                                @else
                                    <a href="{{route('blog.view',['category' => $category->id])}}">
                                        <div class="alignleft frame post_thumb thumb" style="background-image:url({{asset('assets/frontend/upload/photo-1469920783271-4ee08a94d42d-150x150.jpg')}})"></div>
                                    </a>
                                @endif
                            </div>
                            <br/> --}}
                            <a href="{{route('blog.view',['category' => $category->id])}}"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;{{$category->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Popular Blogs</span></h2>
                <ul class="posts blog withthumb ">
                    @foreach($popularBlogList as $blog)
                        <li>
                            <div class="post_circle_thumb thumb_box">
                                @if($blog->featured())
                                    <a href="{{route('blog.slug',['slug' => $blog->slug])}}">
                                        <div class="alignleft frame post_thumb thumb" style="background-image:url({{$blog->featured()->media}})"></div>
                                    </a>
                                @else
                                    <a href="{{route('blog.slug',['slug' => $blog->slug])}}">
                                        <div class="alignleft frame post_thumb thumb" style="background-image:url({{asset('assets/frontend/upload/photo-1469920783271-4ee08a94d42d-150x150.jpg')}})"></div>
                                    </a>
                                @endif
                            </div>
                            <a href="{{route('blog.slug',['slug' => $blog->slug])}}">{{$blog->title}}</a>
                            {{-- <div class="post_attribute">{{ date('d M Y', strtotime($blog->created_at)) }}</div> --}}
                        </li>
                    @endforeach
                </ul>
            </li>
            <li id="grandtour_social_profiles_posts-2" class="widget Grandtour_Social_Profiles_Posts">
                <h2 class="widgettitle">Connect to Us</h2>
                <div class="social_wrapper shortcode light small">
                    <ul>
                        <li class="facebook"><a target="_blank" title="Facebook" href="https://www.facebook.com/Group-For-Technical-Assistance-503248143156739/"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/NepalGTA/"><i class="fa fa-twitter"></i></a></li>
                        <li class="linkedin"><a target="_blank" title="Linkedin" href="https://www.linkedin.com/company/group-for-technical-assistance-nepal"><i class="fa fa-linkedin"></i></a></li>
                        <li class="youtube"><a target="_blank" title="Youtube" href="https://www.youtube.com/user/gtanepal"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<br class="clear" />
<div class="sidebar_bottom"></div>

