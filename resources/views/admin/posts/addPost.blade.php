@extends('admin.layout.master')

@section('title')
    Add Post
@endsection
@section('content')
    <section class="content">
        @include('admin.layout.messages')
        <form method="post" action="{{route('post.store')}}">
            @csrf
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
                            <input type="text" id="inputName" value="{{old('title')}}" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Post Content</label>
                            <textarea id="inputDescription" class="form-control" name="body" rows="4">
                                {{old('body')}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Category</label>
                            <select id="inputStatus" name="category" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                @foreach($categories as $category)
                                    <option
                                        {{old('category')==$category->id? "selected" :" "}}
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Featured image</label> <br>
                            <input type="file" name="featured_image" value="value="{{old('fearured_imgae')}}">
                            <input type="submit" value="Uploade">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Large image</label> <br>
                            <input type="file" name="large_image" value="value="{{old('large_imgae')}}">
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
                <input type="submit" value="Create new Post" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </section>
@endsection
