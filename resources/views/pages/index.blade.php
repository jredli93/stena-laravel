@extends('pages.layouts.app')
@section('content')
    <!-- header / hero section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 p-0">
                    <!-- big post item -->
                    @if(count($news) > 0)

                    <div class="card">
                        <a href="/vest/{{$news->first()->id}}" class="post-link">

                            <img
                                src="{{asset('storage/images/' . $news->first()->photo)}}"
                                alt="food"
                                class="card-img img-fluid card-img-custom"
                            />
                            <div class="card-img-overlay">
                                <div class="newsTitleMain">
                                                     <span><img
                                                             src="{{asset('eacs/img/svg/time.svg')}}"
                                                             alt="time"
                                                             class="img-fluid mr-1"
                                                             style="width: 14px; height: 14px"
                                                         />
                                                         {{ $news->first()->created_at->format('d-m-Y') }}</span>
                                    <div>
                                        {{$news->first()->title}}
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                @endif
                    <!-- end big post item -->
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="row">
                        <!-- small post item -->
                        @foreach($news as $key => $item)
                            @if($key > 0)
                                <div class="col-md-6 p-0 newsSmallBoxs">
                                    <div class="card card-custom">
                                        <a href="/vest/{{$item->id}}" style="height: 100%">
                                            <img
                                                src="{{asset('storage/images/' . $item->photo)}}"
                                                alt="placeholder"
                                                class="card-img img-fluid"
                                                style="object-fit: cover;height: 100%;"
                                            />
                                            <div class="card-img-overlay">
                                                <div class="newsTitle">
                                                     <span><img
                                                             src="{{asset('eacs/img/svg/time.svg')}}"
                                                             alt="time"
                                                             class="img-fluid mr-1"
                                                             style="width: 14px; height: 14px"
                                                         />
                                                    {{$news->first()->created_at->format('d-m-Y') }}</span>
                                                    <div>
                                                        {{$item->title}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end header / hero section -->
    <section class="video">
        <div class="container">
        <div class="row" style="display: flex">
            @foreach($photos as $item)
                    <div class="pt-0 col-md-6 mb-3 mainPageGallery">
                        <img class="img-fluid" src="{{ asset('storage/images/'.$item->photo)}}">
                    </div>
            @endforeach

        </div>
    </div>

    @if(count($videos) > 0)
    <!-- video section -->
    <section class="video">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <h3 class="section-title">Video</h3>
                    <hr />
                </div>
            </div>
            <div class="row">
                @foreach($videos as $video)
                <!-- video item -->
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe
                            width="560"
                            height="315"
                            class="embed-responsive-item"
                            src="{{$video->video}}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>

                @endforeach

                <!-- end video item -->
            </div>
            @endif
        </div>
    </section>
    <!-- end video section -->

@endsection

