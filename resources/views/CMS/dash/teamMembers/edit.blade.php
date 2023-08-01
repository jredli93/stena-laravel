@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Edit Team Member')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Edit Team Member</h1>
        <hr>
        <div class="row">
            <div class="col-md-12 personal-info">
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

                @if (\Illuminate\Support\Facades\Session::has('unSuccess'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Illuminate\Support\Facades\Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('update.team.member') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Full name <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="fullName" type="text" value="{{$teamMember->fullName}}" placeholder="Enter First Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="title" type="text" value="{{$teamMember->title}}" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Facebook profile</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="facebook" type="text" placeholder="Enter facebook profile url" value="{{$teamMember->facebook}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Twitter profile </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="twitter" type="text" placeholder="Enter twitter profile url" value="{{ $teamMember->twitter }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Instagram profile </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="instagram" type="text" placeholder="Enter instagram profile url" value="{{ $teamMember->instagram }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="email" type="text" value="{{$teamMember->email}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Bio <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <textarea class="description" name="bio">{{$teamMember->bio}}</textarea>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="teamMemberId" value="{{$teamMember->id}}">
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
            width: 1110,
            height: 300
        });
    </script>
@endsection

