<div class="sidebar_top"></div>
<div class="sidebar">
    <div class="content">
        <ul class="sidebar_widget">
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Our Services</span></h2>
                <ul class="posts blog withthumb ">
                    @foreach(Data::getServiceCategory() as $service)
                        <li>
                            <a href="{{route('service.category.detail',['id' => $service->id])}}"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;{{$service->title}}</a>
                            {{-- @foreach($service->postTitle($service->id) as $data)
                                <ul style="margin-left:18px">    
                                    </li>
                                        <a href="{{route('service',['slug' => $data->slug])}}" style="font-size: 15px; font-weight:400"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{$data->title}}</a>
                                    </li>
                                </ul>
                            @endforeach --}}
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
<br class="clear" />
<div class="sidebar_bottom"></div>

