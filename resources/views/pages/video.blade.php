@extends('pages.layouts.app')
@section('content')
    <!-- video list section -->
    <section class="video-list">
      <div class="container">
        <div class="row">
          <!-- video list -->
          <div class="col-md-9">
            <div class="col p-0">
              <h3 class="section-title">Video</h3>
              <hr />
            </div>
              @if(count($videos) < 1)
              <div class="col p-0">
                  <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

              </div>
              @endif
            <!-- video item -->
              @foreach($videos as $video)

                  <div class="row mt-4">
                      <div class="col-md-5">
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

                      <div class="col-md-7 mt-4 mt-md-0">
                          <h4 class="video-post-title font-weight-bold">
                              {{$video->title}}
                          </h4>
                          <small class="text-muted">{{$video->guest}} - {{$video->created_at}}</small>
                          <p class="m-0 mt-3">
                             {!! $video->text !!}
                          </p>
                      </div>
                  </div>
              @endforeach
            <!-- end video item -->

              <!-- pagination -->
              <section class="pagination">
                  <nav aria-label="Page navigation">
                      {{-- Pagination --}}
                      <div class="d-flex justify-content-center">
                          {!! $videos->links("pagination::bootstrap-4") !!}
                      </div>
                  </nav>
              </section>
              <!-- end pagination -->
          </div>
          <!-- end video list -->
        </div>
      </div>
    </section>
    <!-- end video list section -->

@endsection
