@extends('pages.layouts.app')
@section('content')

    <!-- projects list section -->
    <section class="project-list">
        <div class="container">
            <div class="row">
                <!-- project list -->
                <div class="col-md-9">
                    <div class="col p-0">
                        <h3 class="section-title">Projekti</h3>
                        <hr />
                    </div>
                    @if(count($projects) < 1)
                        <div class="col p-0">
                            <h4 class="section-title">Trenutno nema sadržaja za prikazivanje.</h4>

                        </div>
                @endif
                @foreach($projects as $project)
                    <!-- project item -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="project-card d-flex align-items-center p-3">
                                    <img
                                        src="{{asset('/eacs/img/svg/note.svg')}}"
                                        alt="note"
                                        class="img-fluid"
                                        style="width: 40px; height: 40px"
                                    />
                                    <div class="ml-4">
                                        <a href="{{ asset('/storage/pdf') .'/'. $project->pdf }}" target="_blank">
                                            <h6>
                                                {{$project->title}}
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
                                {!! $projects->links("pagination::bootstrap-4") !!}
                            </div>
                        </nav>
                    </section>
                    <!-- end pagination -->
                </div>
                <!-- end project list -->
            </div>
        </div>
    </section>
    <!-- end projects list section -->

@endsection
