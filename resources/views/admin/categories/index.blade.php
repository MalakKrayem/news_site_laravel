@extends('admin.layout.master')

@section('title')
    Categories
@endsection

@section('content')

    <section class="content">
    @include('admin.layout.messages')

    <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>

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
                        <th style="width: 20%">Category Title</th>
                        <th style="width: 10%">Category code</th>
                        <th style="width: 10%">Created at</th>
                        <th style="width: 10%">Updated at</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a>{{$category->name}}</a>

                            </td>
                            <td class="project_progress">
                                <span >{{$category->code}}</span>
                            </td>
                            <td class="project_progress">
                                <span >{{$category->created_at}}</span>
                            </td>
                            <td class="project_progress">
                                <span >{{$category->updated_at}}</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form method="post" action="{{route('category.destroy',$category)}}">
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
        {{$categories->links()}}

    </section>
@endsection
