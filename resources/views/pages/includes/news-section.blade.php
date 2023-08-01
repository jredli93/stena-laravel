<!-- feature section -->
<section class="feature">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <h3 class="section-title">Izdvojene vesti</h3>
                <hr />
            </div>
        </div>
        <div class="row">
            <!-- feature item -->
            @foreach($newsFooter as $item)
                <div class="col-sm-12 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <a href="" class="post-link">
                            <img
                                src="{{asset('storage/images/'.$item->photo)}}"
                                alt="placeholder"
                                class="card-img img-fluid"
                            />
                            <div class="card-img-overlay">
                                <div class="feature-post-date text-white">
                                    <img
                                        src="{{asset('eacs/img/svg/time.svg')}}"
                                        alt="time"
                                        class="img-fluid mr-1"
                                    />
                                    {{$item->created_at->format('d-m-Y')}}
                                </div>
                                <h2 class="feature-post-title text-white">
                                    {{$item->title}}
                                </h2>
                            </div>
                        </a>
                    </div>
                </div>
        @endforeach
        <!-- end feature item -->
        </div>
    </div>
</section>
<!-- end feature section -->
