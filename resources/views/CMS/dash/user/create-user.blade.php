@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Create User')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Create New User</h1>
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

                <form class="form-horizontal" role="form" method="POST" action="/admin/store-user">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input class="form-control" name="first_name" type="text" placeholder="Enter First Name" value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input class="form-control" name="last_name" type="text" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email <font color="#ce1827">*</font></label>
                        <div class="col-lg-8">
                            <input class="form-control" name="email" type="text" placeholder="Enter Email" value="{{ old('email') }}" required>
                        </div>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label class="col-lg-3 control-label" for="exampleInputPassword1">Password <font color="#ce1827">*</font></label>--}}
{{--                        <div class="col-lg-8">--}}
{{--                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter New Password" autocomplete="new-password" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-lg-3 control-label" for="password-confirm">{{ __('Confirm Password') }} <font color="#ce1827">*</font></label>--}}
{{--                        <div class="col-lg-8">--}}
{{--                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" autocomplete="new-password" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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

