<a id="close_mobile_menu" href="javascript:;"></a>
<div class="mobile_menu_wrapper">
    <a id="mobile_menu_close" href="javascript:;" class="button"><span class="ti-close"></span></a>
    <div class="mobile_menu_content">
        <div class="menu-main-menu-container">
            <ul id="mobile_main_menu" class="mobile_main_nav">
                <li class="menu-item">
                    <div id="google_translate_element"></div>
                    <br/>
                </li>
                <li class="menu-item current-menu-item"><a href="{{route('index')}}">Home</a></li>
                <li class="menu-item menu-item-has-children"><a href="#">Our Services</a>
                    <ul class="sub-menu">
                        @foreach($menuService as $service)
                            <li>
                                <a href="{{route('service.category.detail',['id' => $service->id])}}">{{$service->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-item"><a href="{{route('client')}}">Our Clients</a></li>
                <li class="menu-item menu-item-has-children"><a href="#">Impact</a>
                    <ul class="sub-menu">
                        @foreach($menuImpact as $impact)
                            <li>
                                <a href="{{route('impact.category.detail',['id' => $impact->id])}}">{{$impact->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children"><a href="#">About Us</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('about')}}">GTA Introduction</a></li>
                        <li><a href="{{route('member')}}">Our Team</a></li>
                        <li><a href="{{route('president')}}">President Message</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a class="item-header" href="{{route('blog.view')}}">Blogs</a></li>
                <li class="menu-item"><a class="item-header" href="{{route('career')}}">Careers</a></li>
                <li class="menu-item"><a class="item-header" href="{{route('event.upcoming')}}">Events</a></li>
                <li class="menu-item"><a class="item-header" href="{{route('gallery')}}">Gallery</a></li>
                <li class="menu-item"><a class="item-header" href="{{route('contact')}}">Contact us</a></li>
                <li class="menu-item">
                    <br/>
                    <a href="{{route('donate')}}" class="button" style="width: 80%"> Donate</a>
                </li>
            </ul>
        </div>
        <div class="social_wrapper">
            <ul>
                <li class="facebook"><a target="_blank" title="Facebook" href="https://www.facebook.com/Group-For-Technical-Assistance-503248143156739/"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/NepalGTA/"><i class="fa fa-twitter"></i></a></li>
                <li class="linkedin"><a target="_blank" title="Linkedin" href="https://www.linkedin.com/company/group-for-technical-assistance-nepal"><i class="fa fa-linkedin"></i></a></li>
                <li class="youtube"><a target="_blank" title="Youtube" href="https://www.youtube.com/user/gtanepal"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div>
