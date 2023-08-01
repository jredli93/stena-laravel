@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Edit Publication')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Edit Publication</h1>
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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('update.publication') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Title <font color="#ce1827">*</font></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="title" type="text" value="{{$publication->title}}" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="publicationId" value="{{$publication->id}}">
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

@endsection
