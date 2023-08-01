@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Edit Profile')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
{{--            <!-- left column -->--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="text-center">--}}
{{--                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">--}}
{{--                    <h6>Upload a different photo...</h6>--}}

{{--                    <input type="file" class="form-control">--}}
{{--                </div>--}}
{{--            </div>--}}

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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('update.user') }}">
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
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="exampleInputPassword1">Password <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter New Password" autocomplete="new-password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="password-confirm">{{ __('Confirm Password') }} <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" autocomplete="new-password" required>
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
@endsection
