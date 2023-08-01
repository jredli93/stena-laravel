@extends('pages.layouts.app')
@section('content')


    <!-- header -->
    <section class="contact-top-header">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="m-0">Kontaktirajte nas</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-bottom-header">
      <div class="container p-0">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2 align-self-center">
                <img
                  src="{{asset('eacs/img/svg/phone.svg')}}"
                  alt="phone"
                  class="img-fluid"
                  style="width: 35px"
                />
              </div>
              <div class="col-10">
                <small>Pozovite nas</small>
                <h5>-</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2 align-self-center">
                <img
                  src="{{asset('/eacs/img/svg/email.svg')}}"
                  alt="email"
                  class="img-fluid"
                  style="width: 35px"
                />
              </div>
              <div class="col-10">
                <small>Pišite nam</small>
                <h5>eacs@eacs.com</h5>
              </div>
            </div>
          </div>
          <div class="sol-sm-12 col-lg-4">
            <div class="row">
              <div class="col-2 align-self-center">
                <img
                  src="{{asset('eacs/img/svg/link.svg')}}"
                  alt="home"
                  class="img-fluid"
                  style="width: 35px"
                />
              </div>
              <div class="col-10">
                <small>Pratite nas</small>
                <div>
                    <a href="https://www.facebook.com/evroatlantski.savet.srbije" target="_blank">
                      <img
                        src="{{asset('eacs/img/svg/facebook.svg')}}"
                        alt="facebook"
                        class="img-fluid mr-2"
                        style="width: 25px;"
                      />
                    </a>
                    <a href="https://www.instagram.com/evroatlantski_savet_srbije/" target="_blank">
                      <img
                        src="{{asset('eacs/img/svg/instagram.svg')}}"
                        alt="facebook"
                        class="img-fluid mr-2"
                        style="width: 25px;"
                      />
                    </a>
                    <a href="https://twitter.com/eacs_info" target="_blank">
                      <img
                        src="{{asset('eacs/img/svg/twitter.svg')}}"
                        alt="facebook"
                        class="img-fluid mr-2"
                        style="width: 25px;"
                      />
                    </a>
                    <a href="https://www.youtube.com/channel/UCopNDFDndpkniKKst7I-G2A" target="_blank">
                      <img
                        src="{{asset('eacs/img/svg/youtube.svg')}}"
                        alt="facebook"
                        class="img-fluid mr-2"
                        style="width: 25px;"
                      />
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end header -->

    <!-- form section -->
    <section class="form">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="font-weight-bold">Popunite formu</h4>
            <hr />

              <h5> Trenutno nije moguće poslati poruku. </h5>
            <form class="mt-5">
              <div class="form-group my-4">
                <input disabled
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="Ime..."
                />
              </div>
              <div class="form-group my-4">
                <input disabled
                  type="email"
                  name="email"
                  class="form-control"
                  placeholder="Email adresa..."
                />
              </div>
              <div class="form-group my-4">
                <input disabled
                  type="text"
                  name="subject"
                  class="form-control"
                  placeholder="Naslov..."
                />
              </div>
              <div class="form-group my-4">
                <textarea disabled
                  name="message"
                  cols="30"
                  rows="10"
                  placeholder="Poruka..."
                  class="form-control"
                ></textarea>
              </div>
              <button disabled type="submit" class="button-primary">Pošalji</button>
            </form>
          </div>
          <div class="col-md-6 align-self-center">
            <img
              src="{{asset('eacs/img/eacs-logo.png')}}"
              alt="placeholder"
              class="img-fluid mt-5 mt-md-0"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- end form section -->

@endsection
