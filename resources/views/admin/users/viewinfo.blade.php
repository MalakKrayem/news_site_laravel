@extends('admin.layout.master')

@section('title')
    User information
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User information</h3>

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
                    <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$user->name}}</h3>
                        <p class="text-muted">{{$user->email}}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">password
                                <b class="d-block">{{$user->password}}</b>
                            </p>
                            <p class="text-sm">Added at
                                <b class="d-block">{{$user->created_at}}</b>
                            </p>
                            <p class="text-sm">Updated at
                                <b class="d-block">{{$user->updated_at}}</b>
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
