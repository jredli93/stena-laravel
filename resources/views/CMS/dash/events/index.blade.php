@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Events')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Events</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Events</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Events table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Text</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($events->isNotEmpty())
                                            @foreach($events as $event)
                                                <tr>
                                                    <th>{{$event->id}}</th>
                                                    <td>{{$event->title}}</td>
                                                    <td>{{$event->author}}</td>
                                                    <td>{{$event->status}}</td>
                                                    <td>{{strip_tags(Str::limit($event->text, 270, '...'))}}</td>
                                                        <td>
                                                            <div>
                                                                <a href="{{route('edit.event', $event->id)}}">
                                                                    <button class="btn btn-dark"><i class="far fa-edit"></i> Edit</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form class="form-horizontal" role="form" method="POST" action="{{route('delete.event', $event->id)}}">
                                                                @csrf
                                                                <div>
                                                                    <button  onclick="return confirm('Are you sure?')" value="submit" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                                </div>
                                                            </form>
                                                        </td>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" style="text-align: center">
                                                    There is no events!
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Text</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                {!! $events->links("pagination::bootstrap-4") !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
