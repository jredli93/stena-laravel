@extends('pages.layouts.app')
@section('content')
  <body>
  <!-- header -->
  <section class="contact-top-header">
      <div class="container">
          <div class="row">
              <div class="col">
                  <h2 class="m-0">O nama</h2>
              </div>
          </div>
      </div>
  </section>
  <section class="contact-bottom-header">
      <div class="container">
          <div class="row">
              <div class="col-6 text-center text-md-left mb-4 mb-md-0 col-md-3">
                  <a href="https://www.facebook.com/evroatlantski.savet.srbije" target="_blank">
                      <img
                          src="{{asset('/eacs/img/svg/share-facebook.svg')}}"
                          alt="facebook"
                          class="img-fluid"
                          style="height: 40px"
                      />
                  </a>
              </div>
              <div class="col-6 text-center text-md-left mb-4 mb-md-0 col-md-3">
                  <a href="https://twitter.com/eacs_info" target="_blank">
                      <img
                          src="{{asset('/eacs/img/svg/share-twitter.svg')}}"
                          alt="twitter"
                          class="img-fluid"
                          style="height: 40px"
                      />
                  </a>
              </div>
              <div class="col-6 text-center text-md-left mb-4 mb-md-0 col-md-3">
                  <a href="https://www.instagram.com/evroatlantski_savet_srbije/" target="_blank">
                      <img
                          src="{{asset('/eacs/img/svg/share-instagram.svg')}}"
                          alt="instagram"
                          class="img-fluid"
                          style="height: 40px"
                      />
                  </a>
              </div>
              <div class="col-6 text-center text-md-left mb-4 mb-md-0 col-md-3">
                  <a href="https://www.youtube.com/channel/UCopNDFDndpkniKKst7I-G2A" target="_blank">
                      <img
                          src="{{asset('/eacs/img/svg/youtube.svg')}}"
                          alt="youtube"
                          class="img-fluid"
                          style="height: 40px"
                      />
                  </a>
              </div>
          </div>
      </div>
  </section>
  <!-- end header -->
    <!-- about section -->
    <section class="about">
      <div class="container">
        <div class="row">
          <div class="col p-0">
            <h3 class="section-title text-center">Naša priča</h3>
            <hr class="w-50" />
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-12 col-md-8 mx-auto">
            <p class="mb-5 text-justify">
                Evroatlantski savet Srbije je nevladina i neprofitna organizacija čiji je osnovni cilj promocija evroatlantskih vrednosti
                u srpskom društvu i podrška integraciji Republike Srbije u evroatlantsku zajednicu.
                Promocija demokratije, vladavine prava, tržišne ekonomije, pune zaštite ljudskih i manjinskih prava,
                slobodnog protoka ljudi, roba i kapitala, slobodna razmena ideja, promovisanje kulture mira i dijaloga,
                jačanje kooperativnog koncepta bezbednosti, proširivanje kapaciteta ljudske bezbednosti,
                podizanje opšteg nivoa bezbednosne kulture u srpskom društvu, podrška jačanju institucionalnih kapaciteta
                srpskog društva da odgovori na aktuelne bezbednosne izazove, rizike i pretnje i promovisanje evroatlantskih
                integracija Srbije predstavlja osnovnu stratešku misiju Evroatlantskog saveta Srbije.
                Evroatlantski savet je organizacija civilnog društva otvorena za sve pojedince i
                organizacije koje prihvataju njenu misiju.
            </p>
            <p class="mb-5 text-justify">
                <b>Misija</b><br>
                - Podrške javnoj diplomatiji u oblasti evroatlantskih integracija i evroatlantske saradnje Republike Srbije;<br>
                - Organizovanjem stručnih i naučnih skupova, seminara i okruglih stolova posvećenih pitanjima evroatlantskih integracija, nacionalne, regionalne i globalne bezbednosti;<br>
                Evroatlantski savet svoju misiju ostvaruje putem:
                - Sprovođenjem stručnih i naučnih projekata iz oblasti evroatlantskih integracija, nacionalne, regionalne i globalne bezbednosti;<br>
                - Organizovanjem promotivnih aktivnosti usmerenih na razvijanje pozitivnih stavova o evroatlanskim integracijama i saradnji Republike Srbije;<br>
                - Organizovanjem edukativnih aktivnosti radi upoznavanja, pre svega mladih, sa benefitimaevroatlantskih integracija, političkim i tehničkim aspektima pridruživanja i ulogom koju građani i lokalne zajednice mogu igrati u tim procesima;<br>
                - Sprovođenjem projekata usmerenih na podizanje nivoa bezbednosne kulture;<br>
                - Razvijanjem međunarodne saradnje i upoznavanjem sa primerima dobrih praksi u oblasti rešavanja vanrednih situacija i zaštite životne sredine;<br>
                - Razvijanjem saradnje sa akademskom zajednicom u oblasti evroatlantskih integracija i bezbednosti<br>
                - Razvijanjem saradnje sa medijima radi promocije evroatlantskih vrednosti<br>
            </p>
          </div>
        </div>
        <div class="row my-5">
            @foreach($photos as $photo)
              <div class="col-md-4 mb-4 mb-md-0">
                <img
                  src="{{asset('storage/images/'.$photo->photo)  }}"
                  alt="placeholder"
                  class="img-fluid"
                />
              </div>
            @endforeach
        </div>
      </div>
    </section>
    <!-- end about section -->

    <!-- team section -->
    <section>
      <div class="container">
        <div class="row mb-4">
          <div class="col p-0">
            <h3 class="section-title text-center">Naš tim</h3>
            <hr class="w-50" />
          </div>
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
            <!-- team member -->
            <div class="col-lg-6 text-center text-md-left py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-5 mb-4">
                        <img
                            src="{{asset('storage/images/'.$member->photo)}}"
                            alt=""
                            class="img-fluid rounded-circle"
                            style="height: 180px; width: 180px"
                        />
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <h4 class="font-weight-bold">{{$member->fullName}}</h4>
                        <small class="text-muted">{{$member->title}}</small>
                        <div class="team-member-social-icons mt-3">
                            @if($member->facebook)
                            <a href="{{$member->facebook}}">
                                <img
                                    src="{{asset('eacs/img/svg/team-member-facebook.svg')}}"
                                    alt="facebook"
                                    class="img-fluid mr-2"
                                    style="height: 30px"
                                />
                            </a>
                            @endif
                            @if($member->twitter)
                                <a href="{{$member->twitter}}">
                                    <img
                                        src="{{asset('eacs/img/svg/team-member-twitter.svg')}}"
                                        alt="twitter"
                                        class="img-fluid mr-2"
                                        style="height: 30px"
                                    />
                                </a>
                                @endif
                                @if($member->instagram)
                                    <a href="{{$member->instagram}}">
                                        <img
                                            src="{{asset('eacs/img/svg/team-member-instagram.svg')}}"
                                            alt="instagram"
                                            class="img-fluid mr-2"
                                            style="height: 30px"
                                        />
                                    </a>
                                @endif
                            @if($member->email)
                                    <a href="{{$member->email}}">
                                        <img
                                            src="{{asset('eacs/img/svg/team-member-email.svg')}}"
                                            alt="email"
                                            class="img-fluid mr-2"
                                            style="height: 30px"
                                        />
                                    </a>
                                @endif

                        </div>
                        <p class="m-0 mt-3">
                          {!! $member->bio !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end team member -->
        </div>
      </div>
    </section>
    <!-- end team section -->

  @include('pages.includes.news-section')
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
                    <!-- end video item -->

            @endforeach
        </div>
      </div>
    </section>

@endsection
