<div class="sidebar_top"></div>
<div class="sidebar">
    <div class="content">
        <ul class="sidebar_widget">
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Events</span></h2>
                <ul class="posts blog withthumb ">
                    <li>
                        <a href="{{route('event.upcoming')}}"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp; Upcoming Events</a>
                    </li>
                    <li>
                        <a href="{{route('event.completed')}}"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Completed Events</a>
                    </li>
                </ul>
            </li>
            <li id="text-6" class="widget widget_text">
                <h2 class="widgettitle">Contact us</h2>
                <div class="textwidget">
                    <div role="form" class="wpcf7" id="wpcf7-f3075-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response"></div>
                        @include('frontend.include.contact-form')
                    </div>
                </div>
            </li>
            <li id="text-7" class="widget widget_text">
                <h2 class="widgettitle">More Information</h2>
                <div class="textwidget">
                    @include('frontend.include.contact-detail')
                </div>
            </li>
            <li id="grandtour_social_profiles_posts-2" class="widget Grandtour_Social_Profiles_Posts">
                <h2 class="widgettitle">Connect to Us</h2>
                <div class="social_wrapper shortcode light small">
                    <ul>
                        <li class="facebook"><a target="_blank" title="Facebook" href="https://www.facebook.com/Group-For-Technical-Assistance-503248143156739/"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/NepalGTA/"><i class="fa fa-twitter"></i></a></li>
                        <li class="linkedin"><a target="_blank" title="Linkedin" href="https://www.linkedin.com/company/group-for-technical-assistance-nepal"><i class="fa fa-linkedin"></i></a></li>
                        <li class="instagram"><a target="_blank" title="Youtube" href="https://www.youtube.com/user/gtanepal"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
