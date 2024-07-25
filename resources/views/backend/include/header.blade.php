<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class=" fa fa-cog fa-lg"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ route('users.profile') }}"> <i class="fa fa-user"></i>&nbsp;&nbsp;Profile</a></li>
                        <li><a href="{{ route('users.password') }}"> <i class="fa fa-key"></i>&nbsp;&nbsp;Change password</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="info-number">
                        Welcome to GTA Foundation, {{ Auth::user()->name }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
