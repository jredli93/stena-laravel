@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Announcements')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Announcements</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Announcements</li>
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
                                <h3 class="card-title">Announcements table</h3>
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
                                        @if($announcements->isNotEmpty())
                                            @foreach($announcements as $announcement)
                                                <tr>
                                                    <th>{{$announcement->id}}</th>
                                                    <td>{{$announcement->title}}</td>
                                                    <td>{{$announcement->author}}</td>
                                                    <td>{{$announcement->status}}</td>
                                                    <td>{{  $announcement->description }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="{{route('edit.announcement', $announcement->id)}}">
                                                                    <button class="btn btn-dark"><i class="far fa-edit"></i> Edit</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form class="form-horizontal" role="form" method="POST" action="{{route('delete.announcement', $announcement->id)}}">
                                                                @csrf
                                                                <div>
                                                                    <button value="submit" onclick="return confirm('Are you sure?')" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                                </div>
                                                            </form>
                                                        </td>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" style="text-align: center">
                                                    There is no announcements!
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
                                {!! $announcements->links("pagination::bootstrap-4") !!}
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
