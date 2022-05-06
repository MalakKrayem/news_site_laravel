@extends('admin.layout.master')

@section('title')
    Posts
@endsection

@section('content')

    <section class="content">
        @include('admin.layout.messages')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Post Title</th>
                        <th style="width: 20%">Feartured image</th>
                        <th>Views</th>
                        <th style="width: 8%" class="text-center">Shares</th>
                        <th>Category</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a>{{$post->title}}</a>
                            <br/>
                            <small>
                                Created at {{$post->created_at}}
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" width="100" height="100"  src="{{asset('post_featured_images/'.$post->featured_image)}}">
                                </li>

                            </ul>
                        </td>
                        <td class="project_progress">
                            <span >{{$post->views}}</span>
                        </td>
                        <td class="project-state">
                            <span >{{$post->shares}}</span>
                        </td>
                        <td>
                            <span >{{$post->category->name}}</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('post.show',$post)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('post.edit',$post)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form method="post" action="{{route('post.destroy',$post)}}">
                                @method('DELETE')
                                @csrf
                            <button type="submit" class="btn btn-danger btn-sm" >
                                </i>
                                Delete
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{$posts->links()}}

    </section>
@endsection
