@php $auth = Auth::user() @endphp
<div class="col-md-3 left_col menu_fixed mCustomScrollbar">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('index') }}" class="site_title"><img height="50" src="{{ asset('assets/backend/images/logo.png') }}" /> <span style="font-size: 16px;">GTA Nepal</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                @if ($auth->profile == null)
                    <img src="{{ asset('assets/frontend/images/profile.jpg') }}" alt="profile" class="img-circle profile_img">
                @else
                    <img src="{{ $auth->profile }}" alt="profile" class="img-circle profile_img">
                @endif
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <small>{{ $auth->name }}</small>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    @if ($auth->role == UserType::Admin)
                        <li id="menu_users"><a href="{{ route('users') }}"><i class="fa fa-user"></i> Users</a></li>
                        <li id="menu_event"><a href="{{ route('event.index') }}"><i class="fa fa-calendar"></i> Events</a></li>
                        <li id="menu_gallery"><a href="{{ route('gallery.index') }}"><i class="fa fa-camera"></i> Gallery</a></li>
                        <li id="menu_blog"><a href="{{ route('blogs') }}"><i class="fa fa-comment"></i> Blogs</a></li>
                        <li id="menu_impact"><a href="{{ route('impact.category') }}"><i class="fa fa-bookmark"></i> Working Areas</a></li>
                        <li id="menu_service"><a href="{{ route('service.category') }}"><i class="fa fa-tag"></i> Services</a></li>
                        <li id="menu_banner"><a href="{{ route('banners.index') }}"><i class="fa fa-image"></i> Banners</a></li>
                        <li id="menu_notice"><a href="{{ route('notice.index') }}"><i class="fa fa-bell"></i> Notice</a></li>
                        <li id="menu_team"><a href="{{ route('team') }}"><i class="fa fa-users"></i> Team</a></li>
                        <li id="menu_client"><a href="{{ route('clients.index') }}"><i class="fa fa-universal-access"></i> Clients</a></li>
                        {{-- <li id="menu_vacancy"><a href="{{ route('vacancy.index') }}"><i class="fa fa-briefcase"></i> Vacancy</a></li> --}}
                        <li id="menu_contact"><a href="{{ route('contact.show') }}"><i class="fa fa-envelope"></i> Contacts</a></li>
                    @endif
                    @if ($auth->role == UserType::Staff)
                        <li id="menu_event"><a href="{{ route('event.index') }}"><i class="fa fa-calendar"></i> Events</a></li>
                        <li id="menu_gallery"><a href="{{ route('gallery.index') }}"><i class="fa fa-camera"></i> Gallery</a></li>
                        <li id="menu_blog"><a href="{{ route('blogs.index') }}"><i class="fa fa-comment"></i> Blogs</a></li>
                        <li id="menu_impact"><a href="{{ route('impact.category') }}"><i class="fa fa-bookmark"></i> Working Areas</a></li>
                        {{-- <li id="menu_vacancy"><a href="{{ route('vacancy.index') }}"><i class="fa fa-briefcase"></i> Vacancy</a></li> --}}
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
