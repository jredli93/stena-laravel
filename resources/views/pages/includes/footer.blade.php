<!-- back to top arrow -->
<button class="scroll-to-top">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="34.707"
        height="21.692"
        viewBox="0 0 34.707 21.692"
    >
        <path
            id="arrow-up"
            d="M0,22.1l4.091,4.093L17.359,12.687,30.616,26.192,34.707,22.1,17.359,4.5Z"
            transform="translate(0 -4.5)"
            fill="#fff"
        />
    </svg>
</button>
<!-- end back to top arrow -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="font-weight-bold mb-4">O nama</h5>
                <p>
                    Evroatlantski savet Srbije je nevladina i neprofitna organizacija čiji je osnovni cilj promocija
                    evroatlantskih vrednosti u srpskom društvu i podrška integraciji Republike Srbije u evroatlantsku zajednicu.
                </p>
                <div class="footer-social-links mt-4">
                    <a href="https://www.facebook.com/evroatlantski.savet.srbije" target="_blank">
                        <img
                            src="{{asset('eacs/img/svg/facebook.svg')}}"
                            alt="facebook"
                            class="img-fluid mr-2"
                        />
                    </a>
                    <a href="https://www.instagram.com/evroatlantski_savet_srbije/" target="_blank">
                        <img
                            src="{{asset('eacs/img/svg/instagram.svg')}}"
                            alt="instagram"
                            class="img-fluid mr-2"
                        />
                    </a>
                    <a href="https://twitter.com/eacs_info" target="_blank">
                        <img
                            src="{{asset('eacs/img/svg/twitter.svg')}}"
                            alt="twitter"
                            class="img-fluid mr-2"
                        />
                    </a>
                    <a href="https://www.youtube.com/channel/UCopNDFDndpkniKKst7I-G2A" target="_blank">
                        <img
                            src="{{asset('eacs/img/svg/youtube.svg')}}"
                            alt="youtube"
                            class="img-fluid mr-2"
                        />
                    </a>
                </div>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <h5 class="font-weight-bold mb-4">Brzi linkovi</h5>
                <a href="{{route('get-all-news')}}">
                    <p>Vesti</p>
                </a>
                <a href="{{route('get-all-publications')}}">
                    <p>Publikacije</p>
                </a>
                <a href="{{route('video')}}">
                    <p>Video</p>
                </a>
                <a href="{{route('contact')}}">
                    <p>Kontakt</p>
                </a>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <h5 class="font-weight-bold mb-4">Poslednje vesti</h5>
                @foreach($newsFooter as $item)
                    <div class="mb-3">
                        <p class="footer-post-date m-0">{{$item->created_at->format('d-m-Y')}}</p>
                        <a href="/vest/{{$item->id}}">
                            <h2 class="footer-post-title">
                                {{$item->title}}
                            </h2>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- footer bottom -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col text-white text-center">
                <p class="m-0">
                    Izrada
                    <a href="#">{dev}@design</a>
                    | 2021.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('eacs/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('eacs/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('eacs/js/main.js')}}"></script>
