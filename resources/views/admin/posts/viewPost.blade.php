@extends('admin.layout.master')

@section('title')
    View Post
@endsection
@section('content')
    <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post Detail</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Views</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$post->views}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Shares</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{$post->shares}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Post id</span>
                                    <span class="info-box-number text-center text-muted text-sm mb-0">{{$post->id}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Recent Activity </h4>
                            @if(!($post->comments->isEmpty()))
                                @foreach($post->comments as $comment)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username"></span>
                                            <span class="description">Shared publicly - {{$comment->created_at}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>{{$comment->content}}</p>
                                    </div>
                                @endforeach()
                            @else
                                <p style="color:red;">There is no comments</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$post->title}}</h3>
                    <p class="text-muted">{{$post->post_content}}</p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Category name
                            <b class="d-block">{{$post->category->name}}</b>
                        </p>
                        <p class="text-sm">Created at
                            <b class="d-block">{{$post->created_at}}</b>
                        </p>
                        <p class="text-sm">Updated at
                            <b class="d-block">{{$post->updated_at}}</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
