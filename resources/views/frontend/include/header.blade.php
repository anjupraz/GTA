{{-- <img src="{{ asset('assets/backend/images/logo.jpg') }}" width="100%" height="100" /> --}}


<header class="header-front">
    <div class="my-nav">
        <div class="container">
            <div class="row">
                <div class="nav-items">
                    <div class="logo">
                        <img src="{{ asset('assets/backend/images/logo.png') }}" width="60" height="60" />
                    </div>
                    <div class="menu-toggle">
                        <div class="menu-hamburger"></div>
                    </div>
                    <div class="menu-items">
                        <div class="menu">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="serviceDropdown" data-toggle="dropdown" href="javascript:void()">Services</a>
                                    <div class="dropdown-menu" aria-labelledby="serviceDropdown">
                                        @foreach ($menuService as $service)
                                            <a class="dropdown-item" href="{{ route('service.category.detail', ['id' => $service->id]) }}">{{ $service->title }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="impactDropdown" data-toggle="dropdown" href="javascript:void()">Working Areas</a>
                                    <div class="dropdown-menu" aria-labelledby="impactDropdown">
                                        @foreach ($menuImpact as $impact)
                                            <a class="dropdown-item" href="{{ route('impact.category.detail', ['id' => $impact->id]) }}">{{ $impact->title }}</a>
                                        @endforeach
                                    </div>
                         
                                </li>
                                <li><a href="{{ route('member') }}">Team</a></li>
                                <li><a href="{{ route('blog.view') }}">News & Notice</a></li>
                                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</header>


{{-- <li class="menu-item"><a class="item-header" href="{{ route('blog.view') }}">Blogs</a></li>
    <li class="menu-item"><a class="item-header" href="{{ route('career') }}">Careers</a></li>
    <li class="menu-item"><a class="item-header" href="{{ route('event.upcoming') }}">Events</a></li>
    <li class="menu-item"><a class="item-header" href="{{ route('gallery') }}">Gallery</a></li>
    <li class="menu-item"><a class="item-header" href="{{ route('contact') }}">Contact us</a></li>
    <li class="menu-item facebook"><a target="_blank" class="item-header" title="Facebook" href="https://www.facebook.com/Group-For-Technical-Assistance-503248143156739/"><i class="fa fa-facebook"></i></a></li>
    <li class="menu-item twitter"><a target="_blank" class="item-header" title="Twitter" href="https://twitter.com/NepalGTA/"><i class="fa fa-twitter"></i></a></li>
    <li class="menu-item linkedin"><a target="_blank" class="item-header" title="Linkedin" href="https://www.linkedin.com/company/group-for-technical-assistance-nepal"><i class="fa fa-linkedin"></i></a></li>
    <li class="menu-item youtube"><a target="_blank" class="item-header" title="Youtube" href="https://www.youtube.com/user/gtanepal"><i class="fa fa-youtube-play"></i></a></li> --}}
