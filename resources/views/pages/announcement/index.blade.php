@extends('pages.layouts.app')
@section('content')

    <!-- announcements list section -->
    <section class="announcements-list">
      <div class="container">
        <div class="row">
          <!-- announcements list -->
          <div class="col-md-9">
            <div class="col p-0">
              <h3 class="section-title">Najave</h3>
              <hr />
            </div>
              @if(count($announcements) < 1)
                  <div class="col p-0">
                      <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

                  </div>
              @endif
            <!-- announcements item -->
              @foreach($announcements as $item)
                <div class="row mt-4">
                  <div class="col-md-5">
                    <img
                      src="{{asset('storage/images/'.$item->photo)}}"
                      alt=""
                      class="img-fluid"
                    />
                  </div>

                  <div class="col-md-7 mt-4 mt-md-0">
                    <a href="/najava/{{$item->id}}">
                      <h4 class="announcements-post-title font-weight-bold">
                       {{$item->title}}
                      </h4>
                    </a>
                    <small class="text-muted">{{$item->author}} - {{$item->created_at->format('d-m-Y')}}</small>
                    <p class="m-0 mt-3">
                      {{$item->description}}
                    </p>
                  </div>
                </div>
                <!-- end announcements item -->
          @endforeach
            <!-- pagination -->
            <section class="pagination">
              <nav aria-label="Page navigation">
                  {{-- Pagination --}}
                  <div class="d-flex justify-content-center">
                      {!! $announcements->links("pagination::bootstrap-4") !!}
                  </div>
              </nav>
            </section>
            <!-- end pagination -->
          </div>
          <!-- end announcements list -->
        </div>
      </div>
    </section>
    <!-- end announcements list section -->



  @endsection
