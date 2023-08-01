@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Project')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Illuminate\Support\Facades\Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Projects table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>PDF File Name</th>
                                        <th>Change Pdf</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($projects->isNotEmpty())
                                        @foreach($projects as $key => $value)
                                            <tr class="text-center">
                                                <th>{{$value->id}}</th>
                                                <td>{{$value->title}}</td>

                                                <td>
                                                    @if($value->pdf)
                                                        <div>
                                                            <a href="{{route('download.project', $value->id)}}">
                                                                <button class="btn btn-dark"><i class="fas fa-download"></i> Download</button>
                                                            </a>
                                                        </div>
                                                    @else
                                                        /
                                                    @endif
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{route('project.create.pdf', $value->id)}}">
                                                            @if($value->pdf)
                                                                <button class="btn btn-info"><i class="fas fa-download"></i> Change Pdf</button>
                                                            @else
                                                                <button class="btn btn-success"><i class="fas fa-download"></i> Create Pdf</button>
                                                            @endif
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{route('edit.project', $value->id)}}">
                                                            <button class="btn btn-dark"><i class="far fa-edit"></i> Edit</button>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form class="form-horizontal" role="form" method="POST" action="{{route('delete.project')}}">
                                                        @csrf
                                                        <div>
                                                            <input type="hidden" name="projectId" value="{{$value->id}}">
                                                            <button onclick="return confirm('Are you sure?')" value="submit" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                        </div>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" style="text-align: center">
                                                There is no Projects!
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>PDF File Name</th>
                                        <th>Change Pdf</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                {!! $projects->links("pagination::bootstrap-4") !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
