@extends("frontsite.layout.master")

@section('title')
    Home Page
@endsection

@section('content')
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="{{asset('post_large_images/'.$posts->first()->large_image)}}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="{{route("single",$posts->first())}}" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$posts->first()->created_at}}
                        </a></div>
                        <div class=""><a href="{{route("single",$posts->first())}}" class="fh5co_good_font"> {{$posts->first()->title}}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach($posts->skip(1)->take(4) as $post)
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{asset('post_large_images/'.$post->large_image)}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class="{{route("single",$post)}}"><a href="" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;{{date('M-d', strtotime($post->created_at))}} </a></div>
                                <div class="{{route("single",$post)}}"><a href="" class="fh5co_good_font_2"> {{$post->title}} </a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach($posts->sortByDesc("views")->take(5) as $post)
                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img"><img src="{{asset('post_large_images/'.$post->large_image)}}" alt=""
                                                               class="fh5co_img_special_relative"/></div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="{{route("single",$post)}}" class="text-white"> {{$post->title}}</a>
                            <div class="fh5co_latest_trading_date_and_name_color"> {{$post->user->name}} - {{date("M d,Y",strtotime($post->created_at))}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($posts->take(4) as $post)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{asset('post_large_images/'.$post->large_image)}}" alt=""/></div>
                        <div>
                            <a href="{{route("single",$post)}}" class="d-block fh5co_small_post_heading"><span class="">{{$post->title}}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> {{date("M d,Y",strtotime($post->created_at))}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    @foreach($posts->take(4) as $post)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="{{asset('post_large_images/'.$post->large_image)}}" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.blade.php" class="fh5co_magna py-2"> {{$post->title}}
                            </a> <a href="" class="fh5co_mini_time py-3">
                                {{date("M d,Y",strtotime($post->created_at))}} </a>
                            <div class="fh5co_consectetur"> {{$post->post_content}}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach(\App\Models\Tag::take(13)->get() as $tag)
                        <a href="#" class="fh5co_tagg">{{$tag->name}}</a>
                        @endforeach

                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach($posts->sortByDesc("shares")->take(4) as $post)
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="{{asset('post_large_images/'.$post->large_image)}}" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> {{$post->title}}</div>
                            <div class="most_fh5co_treding_font_123"> {{date("M d,Y",strtotime($post->created_at))}}</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                    <a href="#" class="btn_pagging">1</a>
                    <a href="#" class="btn_pagging">2</a>
                    <a href="#" class="btn_pagging">3</a>
                    <a href="#" class="btn_pagging">...</a>
                    <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
                 </div>
            </div>
        </div>
    </div>
@endsection

