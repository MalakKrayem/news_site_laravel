@extends('admin.layout.master')

@section('title')
    Users
@endsection

@section('content')

    <section class="content">
    @include('admin.layout.messages')

    <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

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
                        <th style="width: 20%">User name</th>
                        <th style="width: 10%">User email</th>
                        <th>Email verifed at</th>
                        <th style="width: 8%" class="text-center">Created at</th>
                        <th>Updated at</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a>{{$user->name}}</a>
                            </td>
                            <td>
                                <span>{{$user->email}}</span>
                            </td>
                            <td class="project_progress">
                                <span >{{$user->email_verified_at}}</span>
                            </td>
                            <td class="project-state">
                                <span >{{$user->created_at}}</span>
                            </td>
                            <td>
                                <span >{{$user->updated_at}}</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{route('user.show',$user)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('user.edit',$user)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form method="post" action="{{route('user.destroy',$user)}}">
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
        {{$users->links()}}

    </section>
@endsection
