<div class="sidebar_top"></div>
<div class="sidebar">
    <div class="content">
        <ul class="sidebar_widget">
            @if(count($documentList) > 0)
                <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                    <h2 class="widgettitle"><span>Documents</span></h2>
                    <ul>
                        @foreach ($documentList as $document)
                            <li>
                                <a href="{{$document->media}}" target="_blank">
                                    @if($document->featured)
                                        Brochure <i class="fa fa-arrow-circle-down"></i>
                                    @else
                                        {{$document->title}} <i class="fa fa-arrow-circle-down"></i>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Contact us</span></h2>
                @include('frontend.include.contact-form')
            </li>
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Contact Details</span></h2>
                @include('frontend.include.contact-detail')
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

