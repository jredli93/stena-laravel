@extends('pages.layouts.app')
@section('content')

    <!-- news list section -->
    <section class="news-list">
        <div class="container">
            <div class="row">
                <!-- news list -->
                <div class="col-md-9">
                    @if(count($news) == 0 && count($analysis) == 0 && count($publications) == 0)
                        <div class="col p-0">
                            <h3 class="section-title">Nema odgovarajucih rezultata za ovu pretragu!</h3>
                            <hr />
                        </div>
                    @endif
                    @if(count($news) > 0)
                    <div class="col p-0">
                        <h3 class="section-title">Vesti</h3>
                        <hr />
                    </div>
                    <!-- news item -->
                    @foreach($news as $item)
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <img
                                    src="{{asset('storage/images/'.$item->photo)}}"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>

                            <div class="col-md-7 mt-4 mt-md-0">
                                <a href="/vest/{{$item->id}}">
                                    <h4 class="news-post-title font-weight-bold">
                                        {{$item->title}}
                                    </h4>
                                </a>
                                <small class="text-muted">{{$item->author}} - 22. mart 2021</small>
                                <p class="m-0 mt-3">
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                        <!-- end news item -->
                @endforeach
                    @endif
                        @if(count($analysis)  > 0)
                    <div class="col p-0" style="margin-top: 20px">
                        <h3 class="section-title">Analize</h3>
                        <hr />
                    </div>
                    <!-- news item -->
                    @foreach($analysis as $item)
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <img
                                    src="{{asset('storage/images/'.$item->photo)}}"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>

                            <div class="col-md-7 mt-4 mt-md-0">
                                <a href="/vest/{{$item->id}}">
                                    <h4 class="news-post-title font-weight-bold">
                                        {{$item->title}}
                                    </h4>
                                </a>
                                <small class="text-muted">{{$item->author}} - 22. mart 2021</small>
                                <p class="m-0 mt-3">
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                        <!-- end news item -->
                    @endforeach
                        @endif
                        @if(count($publications) > 0)
                    <div class="col p-0" style="margin-top: 20px">
                        <h3 class="section-title">Publikacije</h3>
                        <hr />
                    </div>
                    @foreach($publications as $publication)
                    <!-- publication item -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="publication-card d-flex align-items-center p-3">
                                    <img
                                        src="{{asset('/eacs/img/svg/note.svg')}}"
                                        alt="note"
                                        class="img-fluid"
                                        style="width: 40px; height: 40px"
                                    />
                                    <div class="ml-4">
                                        <a href="{{ asset('/storage/pdf') .'/'. $publication->pdf }}" target="_blank">
                                            <h6>
                                                {{$publication->title}}
                                            </h6>
                                        </a>
                                        <small class="text-muted">22. mart 2021</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @endif
                </div>
                <!-- end news list -->
            </div>
        </div>
    </section>
    <!-- end news list section -->



@endsection

