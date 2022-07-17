@extends("frontsite.layout.master")

@section('title')
    Single Page
@endsection

@section('content')
    <div id="fh5co-title-box" style="background-image: '{{asset('post_large_images/'.$post->large_image)}}'; background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <img src="{{asset('post_large_images/'.$post->large_image)}}" alt="Free HTML5 by FreeHTMl5.co">
            <span>{{date('M d,Y', strtotime($post->created_at))}}</span>
            <h2>{{$post->title}}</h2>
        </div>
    </div>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <p>
                        {{$post->post_content}}
                    </p>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($post->tags as $tag)
                        <a href="#" class="fh5co_tagg">{{$tag->name}}</a>
                        @endforeach

                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach(\App\Models\Post::orderBy("shares","desc")->take(4)->get() as $post)
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
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach(\App\Models\Post::orderBy("views","desc")->take(5)->get() as $post)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="{{asset('post_large_images/'.$post->large_image)}}" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="single.blade.php" class="text-white"> {{$post->title}}</a>
                                <div class="fh5co_latest_trading_date_and_name_color"> {{$post->user->name}} - {{date("M d,Y",strtotime($post->created_at))}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

