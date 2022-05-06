@extends('admin.layout.master')

@section('title')
    Edit User
@endsection
@section('content')
    <section class="content">
        @include('admin.layout.messages')
        <form method="post" action="{{route('user.update',$user)}}">
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
                                <label for="inputName">User name</label>
                                <input type="text" id="inputName" value="{{$user->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Email</label>
                                <input type="text" id="inputName" value="{{$user->email}}"  name="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Password</label>
                                <input type="text" id="inputName" value="{{decrypt($user->password)}}" name="password" class="form-control">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update User" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection
