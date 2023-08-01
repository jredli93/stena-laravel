@extends('pages.layouts.app')
@section('content')

    <!-- publications list section -->
    <section class="publication-list">
      <div class="container">
        <div class="row">
          <!-- publication list -->
          <div class="col-md-9">
            <div class="col p-0">
              <h3 class="section-title">Publikacije</h3>
              <hr />
            </div>
              @if(count($publications) < 1)
                  <div class="col p-0">
                      <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

                  </div>
          @endif
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
                        <a href="{{ asset('/storage/pdf/'. $publication->pdf)  }}" target="_blank">
                          <h6>
                                {{$publication->title}}
                          </h6>
                        </a>
                        <small class="text-muted">{{$item->crated_at->format('d-m-Y')}}</small>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
          <!-- pagination -->
              <section class="pagination">
                  <nav aria-label="Page navigation">
                      {{-- Pagination --}}
                      <div class="d-flex justify-content-center">
                          {!! $publications->links("pagination::bootstrap-4") !!}
                      </div>
                  </nav>
              </section>
              <!-- end pagination -->
          </div>
          <!-- end publication list -->
        </div>
      </div>
    </section>
    <!-- end publications list section -->

@endsection
