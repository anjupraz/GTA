@php $user = Auth::user() @endphp
<div class="row top_tiles">
    <div class="animated flipInY @if($user->role == UserType::Admin) col-lg-3 col-md-3 @else col-lg-4 col-md-4 @endif col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-calendar"></i></div>
            <div class="count">{{$eventCount}}</div>
            <h3>Events</h3>
        </div>
    </div>
    <div class="animated flipInY @if($user->role == UserType::Admin) col-lg-3 col-md-3 @else col-lg-4 col-md-4 @endif col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-image"></i></div>
            <div class="count">{{$galleryCount}}</div>
            <h3>Gallery</h3>
        </div>
    </div>
    <div class="animated flipInY  @if($user->role == UserType::Admin) col-lg-3 col-md-3 @else col-lg-4 col-md-4 @endif col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-comment"></i></div>
            <div class="count">{{$blogCount}}</div>
            <h3>Blogs</h3>
        </div>
    </div>
    @if($user->role == UserType::Admin)
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">{{$userCount}}</div>
                <h3>Users</h3>
            </div>
        </div>
    @endif
</div>