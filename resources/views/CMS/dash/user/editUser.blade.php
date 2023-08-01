@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Edit Profile')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
        <!-- edit form column -->
            <div class="col-md-12 personal-info">
                <h3>Personal info</h3>
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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update') }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input class="form-control" name="first_name" type="text" value="{{$user->first_name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input class="form-control" name="last_name" type="text" value="{{$user->last_name}}" required>
                        </div>
                    </div>
                    <input type="hidden" name="userId" value="{{$user->id}}">

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

@endsection
