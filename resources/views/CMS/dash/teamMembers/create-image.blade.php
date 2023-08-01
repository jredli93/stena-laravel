@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Team Members Create Img')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Add Image to Team Member</h1>
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

                <form class="form-horizontal" role="form" method="POST" action="/team-member-store-picture" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Upload Image<font color="#ce1827">*</font></label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="teamMemberId" value="{{$teamMember->id}}">
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-dark" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

