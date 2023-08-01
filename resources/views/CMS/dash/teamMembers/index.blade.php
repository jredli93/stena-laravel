@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Team Members')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="padding-left: 1%; padding-right: 1%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Team Members</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Team Members</li>
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
                                <h3 class="card-title">Team Members table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Full name</th>
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Social network</th>
                                        <th>Photo</th>
                                        <th>Bio</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($teamMembers->isNotEmpty())
                                        @foreach($teamMembers as $key => $value)
                                            <tr class="text-center">
                                                <th>{{$value->id}}</th>
                                                <th>{{$value->fullName}}</th>
                                                <th>{{$value->title}}</th>
                                                <th>{{$value->email}}</th>
                                                <th>
                                                        @if($value->facebook)
                                                            Facebook :<a href="{{$value->instagram}}"> {{$value->instagram}} </a> <br>
                                                        @endif
                                                        @if($value->twitter)
                                                            Twitter : <a href="{{$value->twitter}}"> {{$value->twitter}} </a> <br>
                                                        @endif
                                                        @if($value->instagram)
                                                            Instagram : <a href="{{$value->instagram}}"> {{$value->instagram}} </a> <br>
                                                        @endif
                                                </th>
                                                <td>
                                                    @if($value->photo)
                                                        <div>
                                                            <a href="{{route('team.member.photo', $value->id)}}">
                                                                <button class="btn btn-dark"><i class="far fa-images"></i> Show Photo</button>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <a href="{{route('team.member.create.picture', $value->id)}}">
                                                                <button class="btn btn-success"><i class="far fa-images"></i> Create Photo</button>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{strip_tags($value->bio)}}</td>
                                                    <td>
                                                        <div>
                                                            <a href="{{route('edit.team.member', $value->id)}}">
                                                                <button class="btn btn-dark"><i class="far fa-edit"></i> Edit</button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form class="form-horizontal" role="form" method="POST" action="{{route('delete.team.member')}}">
                                                            @csrf
                                                            <div>
                                                                <input type="hidden" name="teamMemberId" value="{{$value->id}}">
                                                                <button onclick="return confirm('Are you sure?')" value="submit" class="btn btn-dark"><i class="fa fa-trash"></i> Delete</button>
                                                            </div>
                                                        </form>
                                                    </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" style="text-align: center">
                                                There is no Team Members!
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Full name</th>
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Social network</th>
                                        <th>Photo</th>
                                        <th>Bio</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center">
                                {!! $teamMembers->links("pagination::bootstrap-4") !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
