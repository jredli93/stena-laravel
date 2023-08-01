@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Publication Pdf Create')

@section('content')
    <div class="container" style="padding-top: 1%;">
        <h1>Add Pdf to Publication</h1>
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

                <form class="form-horizontal" role="form" method="POST" action="/publication-store-pdf" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Upload Pdf<font color="#ce1827">*</font></label>
                        <div class="col-md-6">
                            <input type="file" name="pdfFIle" class="">
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="publicationId" value="{{$publication->id}}">
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

