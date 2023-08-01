@extends('CMS.dash.layouts.admin-dash-layout')
@section('title', 'Team Members Gallery')

@section('content')

    <section class="content" style="padding-right: 1%; padding-left: 1%; padding-top: 1%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Illuminate\Support\Facades\Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="card card-dark">
                        <div class="card-header">
                            <h4 class="card-title">Team Member Image</h4>
                            <a href="{{route('team.member.create.picture', $teamMember->id)}}">
                                <button class="btn btn-light float-right">Change picture</button>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            @if($teamMember->photo)
                                <div class="row">
                                    <div class="col-sm-12" style=" padding-bottom: 1%;">
                                        <a href="{{ asset('/storage/images/' . $teamMember->photo) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                            <img src="{{ asset('/storage/images/' . $teamMember->photo) }}" class="img-fluid mb-2"/>
                                        </a>
                                        <form class="form-horizontal" role="form" method="POST" action="{{route('delete.team.member.picture', $teamMember->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <div>
                                                <button value="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    There is no images!
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
