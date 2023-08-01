@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Photos')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Photos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Photos</li>
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
                                <h3 class="card-title">Photos table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Page</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($photos->isNotEmpty())
                                            @foreach($photos as $photo)
                                                <tr>
                                                    <th>{{$photo->id}}</th>
                                                    <td><img src="{{asset('storage/images/'.$photo->photo)}}" width="200" height="150"/></td>
                                                    <td>{{$photo->type}}</td>
                                                    <td>
                                                        <form class="form-horizontal" role="form" method="POST" action="{{route('delete.photo', $photo->id)}}">
                                                            @csrf
                                                            <div>
                                                                <button value="submit" onclick="return confirm('Are you sure?')" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" style="text-align: center">
                                                    There is no photos!
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Type</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                {!! $photos->links("pagination::bootstrap-4") !!}
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
