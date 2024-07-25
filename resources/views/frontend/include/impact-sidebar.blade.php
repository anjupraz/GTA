<div class="sidebar_top"></div>
<div class="sidebar">
    <div class="content">
        <ul class="sidebar_widget">
            <li id="grandtour_cat_posts-2" class="widget Grandtour_Cat_Posts">
                <h2 class="widgettitle"><span>Impacts</span></h2>
                <ul class="posts blog withthumb ">
                    @foreach(Data::getImpactCategory() as $impact)
                        <li>
                            <a href="{{route('impact.category.detail',['id' => $impact->id])}}"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;{{$impact->title}}</a>
                            {{-- @foreach($impact->postTitle($impact->id) as $data)
                                <ul style="margin-left:18px">    
                                    </li>
                                        <a href="{{route('impact',['slug' => $data->slug])}}" style="font-size: 15px; font-weight:400">{{$data->title}}</a>
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

