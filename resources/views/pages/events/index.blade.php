@extends('pages.layouts.app')
@section('content')

    <!-- events list section -->
    <section class="events-list">
      <div class="container">
        <div class="row">
          <!-- events list -->
          <div class="col-md-9">
            <div class="col p-0">
              <h3 class="section-title">Događaji</h3>
              <hr />
            </div>
              @if(count($events) < 1)
                  <div class="col p-0">
                      <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

                  </div>
              @endif
            <!-- events item -->
              @foreach($events as $item)
                <div class="row mt-4">
                  <div class="col-md-5">
                    <img
                      src="{{asset('storage/images/'.$item->photo)}}"
                      alt=""
                      class="img-fluid"
                    />
                  </div>

                  <div class="col-md-7 mt-4 mt-md-0">
                    <a href="/događaj/{{$item->id}}">
                      <h4 class="events-post-title font-weight-bold">
                       {{$item->title}}
                      </h4>
                    </a>
                    <small class="text-muted">{{$item->author}} - {{$item->created_at->format('d-m-Y')}}</small>
                    <p class="m-0 mt-3">
                      {{$item->description}}
                    </p>
                  </div>
                </div>
                <!-- end events item -->
          @endforeach
            <!-- pagination -->
            <section class="pagination">
              <nav aria-label="Page navigation">
                  {{-- Pagination --}}
                  <div class="d-flex justify-content-center">
                      {!! $events->links("pagination::bootstrap-4") !!}
                  </div>
              </nav>
            </section>
            <!-- end pagination -->
          </div>
          <!-- end events list -->
        </div>
      </div>
    </section>
    <!-- end events list section -->



  @endsection
