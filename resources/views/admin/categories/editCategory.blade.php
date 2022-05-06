@extends('admin.layout.master')

@section('title')
    Edit Category
@endsection
@section('content')
    <section class="content">
        @include('admin.layout.messages')
        <form method="post" action="{{route('category.update',$category)}}">
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
                                <label for="inputName">Category title</label>
                                <input type="text" id="inputName" value="{{$category->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Category code</label>
                                <input type="text" id="inputName" value="{{$category->code}}"  name="code" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update Category" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
