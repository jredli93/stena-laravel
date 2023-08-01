<!-- social icons stack  -->
<div class="social-icons d-none d-md-block">
    <a href="https://www.facebook.com/evroatlantski.savet.srbije" target="_blank">
        <img
            src="{{asset('eacs/img/svg/side-facebook.svg')}}"
            alt="facebook"
            class="img-fluid mb-3"
        />
    </a>
    <a href="https://twitter.com/eacs_info" target="_blank">
        <img
            src="{{asset('eacs/img/svg/side-twitter.svg')}}"
            alt="twitter"
            class="img-fluid mb-3"
        />
    </a>
    <a href="https://www.instagram.com/evroatlantski_savet_srbije/" target="_blank">
        <img
            src="{{asset('eacs/img/svg/side-instagram.svg')}}"
            alt="instagram"
            class="img-fluid mb-3"
        />
    </a>
    <a href="https://www.youtube.com/channel/UCopNDFDndpkniKKst7I-G2A" target="_blank">
        <img
            src="{{asset('eacs/img/svg/side-youtube.svg')}}"
            alt="youtube"
            class="img-fluid mb-3"
        />
    </a>
</div>
<!-- end social icons stack  -->
<!-- top bar -->
<div class="top-bar p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-white text-center text-md-left">
                <img src="{{asset('eacs/img/svg/phone.svg')}}" alt="phone" class="img-fluid mr-1" />
                -
            </div>

            <div class="col-md-4 text-white text-center">
                <img src=" {{ asset('eacs/img/svg/email.svg') }}" alt="email" class="img-fluid mr-1" />
                eacs@eacs.com
            </div>
            <div class="col-md-4 text-white text-center text-md-right">
                <a href="https://www.facebook.com/evroatlantski.savet.srbije" target="_blank">
                    <img
                        src="{{ asset('eacs/img/svg/facebook.svg') }}"
                        alt="facebook"
                        class="img-fluid mr-2"
                        style="width: 20px"
                    />
                </a>
                <a href="https://www.instagram.com/evroatlantski_savet_srbije/" target="_blank">
                    <img
                        src=" {{ asset('eacs/img/svg/instagram.svg') }}"
                        alt="instagram"
                        class="img-fluid mr-2"
                        style="width: 20px"
                    />
                </a>
                <a href="https://twitter.com/eacs_info" target="_blank">
                    <img
                        src=" {{asset('eacs/img/svg/twitter.svg')}}"
                        alt="twitter"
                        class="img-fluid mr-2"
                        style="width: 20px"
                    />
                </a>
                <a href="https://www.youtube.com/channel/UCopNDFDndpkniKKst7I-G2A" target="_blank">
                    <img
                        src=" {{ asset('eacs/img/svg/youtube.svg') }}"
                        alt="youtube"
                        class="img-fluid mr-2"
                        style="width: 20px"
                    />
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end top bar -->
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container p-0">
        <a class="navbar-brand" href="/"><img  class="img-fluid" src="{{asset('eacs/img/eacs-logo.png')}}" width="70px" alt="Logo"></a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar"
            aria-controls="navbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mb-2 mb-md-0 mr-3">
                    <a class="nav-link" href="/">Početna</a>
                </li>
                <li class="nav-item dropdown mb-2 mb-md-0 mr-3">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Vesti
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item mb-2" href="{{route('get-all-news')}}">
                            Sve vesti
                        </a>
                        <a class="dropdown-item mb-2" href="{{route('get-all-publications')}}">
                            Publikacije
                        </a>
                        <a class="dropdown-item mb-2" href="{{route('get-all-analysis')}}">Analize</a>
                        <a class="dropdown-item mb-2" href="{{route('get-all-projects')}}">Projekti</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item mb-2" href="{{route('get-all-events')}}">Događaji</a>
                        <a class="dropdown-item mb-2" href="{{route('get-all-announcements')}}">Najave</a>
                    </div>
                </li>
                <li class="nav-item mb-2 mb-md-0 mr-3">
                    <a class="nav-link" href="{{route("video")}}">Video</a>
                </li>
                <li class="nav-item mb-2 mb-md-0 mr-3">
                    <a class="nav-link" href="{{route('contact')}}">Kontakt</a>
                </li>
                <li class="nav-item mb-2 mb-md-0 mr-3">
                    <a class="nav-link" href="{{route('about-us')}}">O nama</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
                <input
                    name="search"
                    class="form-control mr-sm-2 w-75"
                    type="search"
                    placeholder="Pretraga..."
                    aria-label="Search"
                />
                <button class="search-btn my-2 my-sm-0" type="submit">
                    <img
                        src=" {{asset('eacs/img/svg/magnifier.svg')}}"
                        alt="search"
                        class="img-fluid"
                    />
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- end navbar -->
