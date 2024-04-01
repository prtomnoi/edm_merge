<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'EDM') | EDM </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css?v=3') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/base-style.css?v=' . filemtime(public_path('assets/css/base-style.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css?v=' . filemtime(public_path('assets/css/slick-theme.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css?v=' . filemtime(public_path('assets/css/slick.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/index.css?v='  . filemtime(public_path('assets/css/index.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navbar_style.css?v=' . filemtime(public_path('assets/css/navbar_style.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/particle-anim.css?v=' . filemtime(public_path('assets/css/particle-anim.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/benefit-style.css?v=' . filemtime(public_path('assets/css/benefit-style.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vtuber-style.css?v=' . filemtime(public_path('assets/css/vtuber-style.css')))  }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/yt-slider.css?v=' . filemtime(public_path('assets/css/yt-slider.css'))) }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/article-style.css?v=5') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/contact-us.css?v=' . filemtime(public_path('assets/css/contact-us.css'))) }}" />

    <style>
        .video-iframe {
            width: 100%;
            /* Adjust the width as needed */
            height: 300px;
            /* Adjust the height as needed */
        }

        /* .creator-card-des > div {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: wrap;
        max-width: 200px;
      }
      .creator-card-des > div > span:first-of-type {
            font-size: 1rem;
        } */
    </style>
</head>

<body>
    <div class="side-menu">
        <svg class="close-btn" id="close-sidenav-btn" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
            <path fill="#ffff"
                d="M12.45 38.7 9.3 35.55 20.85 24 9.3 12.5l3.15-3.2L24 20.8 35.55 9.3l3.15 3.2L27.2 24l11.5 11.55-3.15 3.15L24 27.2Z" />
        </svg>

        <div class="side-btn-section">
            <a href="{{ url('edm-media/index') }}" class="side-btn"><img src="{{ asset('assets/img/edm-logo.png') }}"
                    alt="" /></a>
            {{-- <a href="{{ url('edm-media/index') }}" class="side-btn">ABOUT US</a> --}}
            {{-- <div class="side-collapse">
                <a href="#forCreator" class="side-btn" data-bs-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="forCreator">FOR CREATOR</a>
                <div class="collapse" id="forCreator">
                    <div class="card card-body">
                        <a href="{{ route('influencer.index') }}">Creator</a>
                        <a href="{{ route('vtuber-community.index') }}">VTuber</a>
                    </div>
                </div>
            </div> --}}
            <div class="side-collapse">
                <a href="#forBrand" class="side-btn" data-bs-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="forBrand">FOR BRAND</a>
                <div class="collapse" id="forBrand">
                    <div class="card card-body">
                        <a href="{{ route('branding.index') }}">Service</a>
                        <a href="">Campaign</a>
                    </div>
                </div>
            </div>
            {{-- <a href="{{ route('news-activity.index') }}" class="side-btn">NEWS</a> --}}
            <a href="#contactSectionMedia" class="side-btn">CONTACT US</a>
            <div class="lang-change-btns">
                <a href="#" class="active" id="thaiBtn"><img src="{{ asset('assets/img/THAILAND.png') }}"
                        alt="" />
                    TH</a>
                {{-- <a href="#" id="engBtn"><img src="{{ asset('assets/img/UK.png') }}" alt="" /> ENG</a> --}}
            </div>
        </div>
    </div>
    <nav class="">
        <!-- Nav Hamberger menu -->
        <div class="nav-menu">
            <img src="{{ asset('assets/img/menu.svg') }}" alt="" />
        </div>

        <div class="nav-btns">
            <a href="{{ url('edm-media/index') }}"><img src="{{ asset('assets/img/edm-logo.png') }}"
                    alt="" /></a>
            <div class="nav-btns-wrapper">
                {{-- <a href="{{ url('edm-media/index') }}">ABOUT US</a> --}}
                {{-- <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn underline" menus-dropdown-btn>
                        FOR CREATOR
                        <img src="{{ asset('assets/img/expand.svg') }}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('vtuber-community.index') }}">VTuber</a>
                        <a href="{{ url('edm-media/index') }}">Creator</a>
                    </div>
                </div> --}}
                <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn underline" menus-dropdown-btn>
                        FOR BRAND
                        <img src="{{ asset('assets/img/expand.svg') }}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('branding.index') }}">Service</a>
                        <a href="{{ route('our-campaign.index') }}">Campaign</a>
                    </div>
                </div>
                {{-- <a href="{{ route('news-activity.index') }}">NEWS</a> --}}
                {{-- <a href="{{ route('contact-us.index') }}" class="underline">CONTACT US</a> --}}
                <a href="#contactSectionMedia" class="underline">CONTACT US</a>
                <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn" menus-dropdown-btn>
                        <img src="{{ asset('assets/img/thai-lang-icon.png') }}" alt="" />
                        <span>TH</span>
                        <img src="{{ asset('assets/img/expand.svg') }}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="#"><img src="{{ asset('assets/img/thai-lang-icon.png') }}" id="thaiBtn2"
                                alt="" />
                            TH</a>
                        {{-- <a href="#"><img src="{{ asset('assets/img/UK.png') }}" id="engBtn2"
                                alt="" /> ENG</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            {{-- @php
                $socal = app()->call('\App\Http\Controllers\Controller@getLink');
            @endphp
            {!! $socal !!} --}}
            {{ view('gadget-menu') }}
            @yield('content')

            <footer>
                <div class="footer-top">
                    <div class="footer-logos">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/img/edm_logo_com.svg') }}"
                                alt="" /></a>
                        <a href="{{ url('edm-media/index') }}"><img src="{{ asset('assets/img/edm-logo.png') }}"
                                alt="" /></a>
                    </div>


                </div>
                <div class="footer-bot">
                    <span>COPYRIGHT <span>&copy;</span> <span id="year">2023</span> EDM HOLDING ALL RIGHTS
                        RESERVED.</span>
                    <a href="#" class="text-white">Terms of use I Privacy Policy I Contact us</a>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
        integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('assets/js/navbar.js?v=6') }}"></script>
    @yield('scripts')
    <script>
        const newsApiUrl = 'https://edmcompany.co.th/api/settings';
        async function fetchNews() {
            try {
                const response = await fetch(newsApiUrl);
                const newsData = await response.json();
                const gadGet = document.getElementById('gadget-menu');
                const anchorTags = gadGet.querySelectorAll('.gadget-menu a');
                const a_array = [...anchorTags]; // convert node to array
                // if (anchorTags.length != 0) {

                //     anchorTags[0].setAttribute('href', newsData[0].facebook);
                //     anchorTags[1].setAttribute('href', newsData[0].youtube);
                //     anchorTags[2].setAttribute('href', newsData[0].url);
                //     anchorTags[3].setAttribute('href', newsData[0].contact);
                // }
                // console.log()
                a_array.forEach(function(event) {
                    const eventId = event.getAttribute('id');
                    if (eventId == 'facebook') {
                        event.setAttribute('href', newsData[0].facebook);
                    } else if (eventId == 'youtube') {
                        event.setAttribute('href', newsData[0].youtube);
                    } else if (eventId == 'url') {
                        event.setAttribute('href', newsData[0].url);
                    }
                    // else if (eventId == 'contact') {
                    //     event.setAttribute('href', newsData[0].contact);
                    // }
                });
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }
        fetchNews()

        var footerYear = document.getElementById('year');
        footerYear.innerHTML = new Date().getFullYear();
        const section = document.querySelectorAll('a[href="#contactSectionMedia"]')
        for (let index = 0; index < section.length; index++) {
            section[index].addEventListener('click', function(event) {
                const targetSection = document.getElementById('contactSectionMedia');
            if (window.location.pathname != "/branding" || window.location.pathname != "/branding#contactSectionMedia") {
                window.location.href = "branding#contactSectionMedia";
            }
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
        }
    </script>
</body>

</html>
