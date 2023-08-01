@extends('pages.layouts.app')
@section('content')

    <!-- news list section -->
    <section class="news-list">
      <div class="container">
        <div class="row">
          <!-- news list -->
          <div class="col-md-9">
            <div class="col p-0">
              <h3 class="section-title">Vesti</h3>
              <hr />
            </div>
              @if(count($news) < 1)
                  <div class="col p-0">
                      <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

                  </div>
              @endif
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
                    <small class="text-muted">{{$item->author}} - {{$item->created_at->format('d-m-Y')}}</small>
                    <p class="m-0 mt-3">
                      {{$item->description}}
                    </p>
                  </div>
                </div>
                <!-- end news item -->
          @endforeach
            <!-- pagination -->
            <section class="pagination">
              <nav aria-label="Page navigation">
                  {{-- Pagination --}}
                  <div class="d-flex justify-content-center">
                      {!! $news->links("pagination::bootstrap-4") !!}
                  </div>
              </nav>
            </section>
            <!-- end pagination -->
          </div>
          <!-- end news list -->
        </div>
      </div>
    </section>
    <!-- end news list section -->



  @endsection
