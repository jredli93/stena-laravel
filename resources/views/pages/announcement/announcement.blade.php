@extends('pages.layouts.app')
@section('content')

    <!-- post section -->
    <section class="post">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <img src="{{asset('storage/images/'.$announcement->photo)}}" alt="" class="img-fluid mb-3" />
                    <small class="text-muted">{{$announcement->author}} - {{$announcement->created_at->format('d-m-Y')}}</small>
                    <div class="category-list d-flex my-4">

                        @foreach($announcement->arrayTags as $tag)
                            <div class="category-item mr-3">{{$tag}}</div>
                        @endforeach
                    </div>
                    <h1>
                        {{$announcement->title}}
                    </h1>
                    <hr />
                    <p class="mt-5 text-justify">
                        {!! $announcement->text !!}
                    </p>
                    <!-- social share buttons -->
                    <div class="social-share my-5">
                        <a href="#">
                            <button class="btn-social-share mr-2 mb-2 mb-md-0">
                                <img
                                    src="{{asset('eacs/img/svg/share-facebook.svg')}}"
                                    alt="facebook"
                                    class="img-fluid mr-2"
                                />
                                Podeli
                            </button>
                        </a>
                        <a href="#">
                            <button class="btn-social-share mr-2 mb-2 mb-md-0">
                                <img
                                    src="{{asset('eacs/img/svg/share-twitter.svg')}}"
                                    alt="twitter"
                                    class="img-fluid mr-2"
                                />
                                Podeli
                            </button>
                        </a>
                        <a href="#">
                            <button class="btn-social-share mr-2 mb-2 mb-md-0">
                                <img
                                    src="{{asset('eacs/img/svg/share-instagram.svg')}}"
                                    alt="instagram"
                                    class="img-fluid mr-2"
                                />
                                Podeli
                            </button>
                        </a>
                    </div>
                    <!-- end social share buttons -->
                </div>
            @include('pages.includes.news-section')
            <!-- end feature section -->
            </div>
        </div>
    </section>
    <!-- end video list section -->

@endsection
