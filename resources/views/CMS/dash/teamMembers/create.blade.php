@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Team Members Create')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Create Team Member</h1>
        <hr>
        <div class="row">
            <!-- edit form column -->
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

                <form class="form-horizontal" role="form" method="POST" action="/store-team-member" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First Name and Last Name <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="fullName" type="text" placeholder="Enter First and Last name" value="{{ old('firstName') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="title" type="text" placeholder="Enter First and Last name" value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Facebook profile</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="linkedin" type="text" placeholder="Enter Facebook profile" value="{{ old('facebook') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Twitter profile </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="twitter" type="text" placeholder="Enter Twitter profile" value="{{ old('twitter') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Instagram profile </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="instagram" type="text" placeholder="Enter Instagram profile" value="{{ old('instagram') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="email" type="email" placeholder="Enter Email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Upload Image <font color="#ce1827">*</font></label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Biography <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <textarea class="description" name="bio">{{ old('bio') }}</textarea>
                        </div>
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
    <hr>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
            width: 1110,
            height: 300
        });
    </script>
@endsection
