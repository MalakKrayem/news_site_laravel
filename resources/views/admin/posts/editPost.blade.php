@extends('admin.layout.master')

@section('title')
    Edit Post
@endsection
@section('content')
    <section class="content">
        <form method="post" action="{{route('post.update',$post)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Post title</label>
                                <input type="text" id="inputName" name="title" value="{{$post->title}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Post Content</label>
                                <textarea id="inputDescription"  class="form-control"  name="body" rows="4">{{$post->post_content}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Category</label>
                                <select id="inputStatus" name="category" class="form-control custom-select">
                                    @foreach($categories as $category)
                                        <option
                                            {{$post->category_id==$category->id? "selected" :" "}}
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Featured image</label> <br>
                                <input type="file" name="featured_image" value="{{$post->featured_image}}">
                                <input type="submit" value="Uploade">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Large image</label> <br>
                                <input type="file" name="large_image" value="{{$post->large_image}}">
                                <input type="submit" value="Uploade">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update Post" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection
