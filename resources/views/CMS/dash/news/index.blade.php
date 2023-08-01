@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'News')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>News</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">News</li>
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
                                <h3 class="card-title">News table</h3>
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
                                        @if($news->isNotEmpty())
                                            @foreach($news as $item)
                                                <tr>
                                                    <th>{{$item->id}}</th>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->author}}</td>

                                                    <td>{{$item->status}}</td>
                                                    <td>{{ $item->description }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="{{route('edit.news', $item->id)}}">
                                                                    <button class="btn btn-dark"><i class="far fa-edit"></i> Edit</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form class="form-horizontal" role="form" method="POST" action="{{route('delete.news', $item->id)}}">
                                                                @csrf
                                                                <div>
                                                                    <button onclick="return confirm('Are you sure?')" value="submit" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                                </div>
                                                            </form>
                                                        </td>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" style="text-align: center">
                                                    There is no news!
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
                                {!! $news->links("pagination::bootstrap-4") !!}
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
