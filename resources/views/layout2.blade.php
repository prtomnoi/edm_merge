<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="utf-8" />
    <title>EDM - @yield('title', 'EDM')</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/subpage-base-style.css?v=' . filemtime(public_path('assets/css/subpage-base-style.css'))) }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/vtuber-style.css?v=3') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/yt-slider.css?v=3') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/article-style.css?v=' . filemtime(public_path('assets/css/article-style.css'))) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/contact-us.css?v=' . filemtime(public_path('assets/css/contact-us.css'))) }}" />
    <link rel="shotcut icon" href="{{ asset('favicon.jpg') }}">
    <meta property="og:title" content="Edm company">
    <meta property="og:url" content="https://edmcompany.co.th/">
    <meta property="og:image" content="https://edmcompany.co.th/assets/img/edm-company-og.jpg">
    <meta property="og:description" content="บริษัท ที่มีวิสัยทัศน์ มุ่งมั่นสร้างสรรค์เพื่อนำเสนอเทคโนโลยีใหม่ ให้กับลูกค้าและพาร์ทเนอร์  และเป็นผู้เชี่ยวชาญด้านการตลาดสื่อสังคมออนไลน์ แพลตฟอร์มโซเชียลมีเดีย">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Edm company">
    <meta name="twitter:description" content="บริษัท ที่มีวิสัยทัศน์ มุ่งมั่นสร้างสรรค์เพื่อนำเสนอเทคโนโลยีใหม่ ให้กับลูกค้าและพาร์ทเนอร์  และเป็นผู้เชี่ยวชาญด้านการตลาดสื่อสังคมออนไลน์ แพลตฟอร์มโซเชียลมีเดีย">
    <meta name="twitter:image" content="https://edmcompany.co.th/assets/img/edm-company-og.jpg">
    <meta name="twitter:url" content="https://edmcompany.co.th/">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BD0DNRZH9H"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-BD0DNRZH9H');
    </script>

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
            <a href="{{ url('/') }}" class="side-btn"><img src="{{ asset('assets/img/edm-company-logo.png') }}"
                    alt="" /></a>
            <a href="{{ route('news-activity.index') }}" class="side-btn">COMPANY AND SERVICES</a>
            <a href="{{ route('news-activity.index') }}" class="side-btn">NEWS</a>
            <a href="{{ route('contact-us.index') }}" class="side-btn">CONTACT US</a>

            {{-- <div class="lang-change-btns">
                <a href="#" class="active" id="thaiBtn"><img src="{{ asset('assets/img/THAILAND.png') }}"
                        alt="" /> TH</a>
                <a href="#" id="engBtn"><img src="assets/img/UK.png" alt="" /> ENG</a>
            </div> --}}
        </div>
    </div>
    {{-- <nav class="">
        <!-- Nav Hamberger menu -->
        <div class="nav-menu">
            <img src="{{asset('assets/img/menu.svg')}}" alt="" />
        </div>

        <div class="nav-btns">
            <a href="{{url('/')}}"><img src="{{asset('assets/img/edm-company-logo.png')}}" alt="" /></a>
            <div class="nav-btns-wrapper">
                <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn" menus-dropdown-btn>
                        FOR BRAND
                        <img src="{{asset('assets/img/expand.svg')}}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{route('branding.index')}}">Service</a>
                        <a href="{{route('our-campaign.index')}}">Campaign</a>
                    </div>
                </div>
                <a href="{{route('news-activity.index')}}">NEWS</a>
                <a href="{{route('contact-us.index')}}">CONTACT US</a>
                <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn" menus-dropdown-btn>
                        <img src="{{asset('assets/img/thai-lang-icon.png')}}" alt="" />
                        <span>TH</span>
                        <img src="{{asset('assets/img/expand.svg')}}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="#"><img src="{{asset('assets/img/thai-lang-icon.png')}}" id="thaiBtn2" alt="" />
                            TH</a>
                        <a href="#"><img src="{{asset('assets/img/UK.png')}}" id="engBtn2" alt="" /> ENG</a>
                    </div>
                </div>
            </div>
        </div>
    </nav> --}}
    <nav class="">
        <!-- Nav Hamberger menu -->
        <div class="nav-menu">
            <img src="{{ asset('assets/img/menu.svg') }}" alt="" />
        </div>

        <div class="nav-btns">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/edm-company-logo.png') }}"
                    alt="" /></a>
            <div class="nav-btns-wrapper">
                <a href="#" collapse-button="company">COMPANY AND SERVICES</a>
                <a href="{{ route('news-activity.index') }}" class="underline">NEWS</a>
                <a href="#contactSectionMedia">CONTACT US</a>
                {{-- <div class="nav-dropdown" menus-dropdown>
                    <button class="nav-dropdown-btn" menus-dropdown-btn>
                        <img src="{{ asset('assets/img/thai-lang-icon.png') }}" alt="" />
                        <span>TH</span>
                        <img src="{{ asset('assets/img/expand.svg') }}" alt="" />
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="#"><img src="{{ asset('assets/img/thai-lang-icon.png') }}" id="thaiBtn2"
                                alt="" />
                            TH</a>
                        <a href="#"><img src="{{ asset('assets/img/UK.png') }}" id="engBtn2"
                                alt="" /> ENG</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </nav>
    {{ view('center-nav') }}
    {{-- <div class="top-collapse-wrapper" collapse-content="company">
        <div class="top-sec">
            <div class="top-link-item">
                <img src="{{ asset('assets/img/edm-logo-2.png') }}" alt="" />
                <ul>
                    <li><a href="#"> Network Solution </a></li>
                    <li><a href="#"> Network Comsulting </a></li>
                    <li><a href="#"> Event </a></li>
                    <li><a href="#"> Live Steam Broadcast </a></li>
                </ul>
            </div>
            <div class="top-link-item">
                <img src="{{ asset('assets/img/edm-logo.png') }}" alt="" />
                <ul>
                    <li><a href="#"> KOLs </a></li>
                    <li><a href="#"> Media Reach</a></li>
                    <li><a href="#"> Marketing Consulting</a></li>
                </ul>
            </div>
            <div class="top-link-item">
                <img src="{{ asset('assets/img/edm-innovation.png') }}" alt="" />
                <ul>
                    <li><a href="#"> Virtual Reality </a></li>
                    <li><a href="#"> Software Development </a></li>
                </ul>
            </div>
        </div>
    </div> --}}
    {{-- <div class="top-collapse-wrapper" collapse-content="company">
        <div class="top-sec">
            <div class="top-link-item">
                <a href="{{ url('edm-management/index') }}"><img src="{{ asset('assets/img/edm-logo-2.png') }}"
                        alt="" /></a>
                <ul>
                    <li>Network Solution</li>
                    <li>Network Comsulting</li>
                    <li>Event</li>
                    <li>Live Steam Broadcast</li>
                </ul>
            </div>
            <div class="top-link-item">
                <a href="{{ url('edm-media/index') }}"><img src="{{ asset('assets/img/edm-logo.png') }}"
                        alt="" /></a>
                <ul>
                    <li>KOLs</li>
                    <li>Media Reach</li>
                    <li>Marketing Consulting</li>
                </ul>
            </div> --}}
            {{-- <div class="top-link-item">
        <img src="{{asset('assets/img/edm-innovation.png')}}" alt="" />
        <ul>
          <li><a href="#"> Virtual Reality </a></li>
          <li><a href="#"> Software Development </a></li>
        </ul>
      </div> --}}
        {{-- </div>
    </div> --}}
    {{-- <div class="top-collapse-wrapper" collapse-content="contact">
        <div class="top-sec">
            <div class="contact-us-header">
                <p>Have Question?</p>
                <h1>CONTACT US</h1>
                <div>
                    <img src="{{ asset('assets/img/google-map-icon.png') }}" alt="" />
                    <p>
                        250/48 Sammakorn Soi 42 Ramkhamhaeng 112, Saphansung
                        Sub-district, Saphansung District, Bangkok Thailand 10240
                    </p>
                </div>
            </div>
            <form action="" class="main-contact-us-form">
                <div>
                    <input type="text" title="name" placeholder="Enter Your Name" />
                    <input type="tel" title="phone" placeholder="Enter Your Phone Number" />
                </div>
                <div>
                    <input type="email" title="email" placeholder="Enter Your Email" />
                    <input type="text" title="company" placeholder="Enter Your Company" />
                </div>
                <textarea name="" id="" rows="4" placeholder="Enter your message"></textarea>
                <button type="submit">SEND</button>
            </form>
        </div>
    </div> --}}
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
                        <a href="{{url('/')}}"><img src="{{ asset('assets/img/edm-company-logo.png') }}" alt="" /></a>
                    </div>


                </div>
                <div class="footer-bot" id="footer-bot">
                    <span>COPYRIGHT <span>&copy;</span> <span id="year">2023</span> EDM HOLDING ALL RIGHTS
                        RESERVED.</span>
                    <a href="#" class="text-white">terms of use I privacy policy I contact us</a>
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
        const settingApiUrl = 'https://edmcompany.co.th/api/settings/3';
        async function fetchSetting() {
            try {
                const response = await fetch(settingApiUrl);
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
                        event.setAttribute('href', newsData.facebook || '#');
                    } else if (eventId == 'youtube') {
                        event.setAttribute('href', newsData.youtube || '#');
                    } else if (eventId == 'url') {
                        event.setAttribute('href', newsData.url || '#');
                    }
                    // else if (eventId == 'contact') {
                    //     event.setAttribute('href', newsData[0].contact);
                    // }
                });
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }
        fetchSetting()
        var footerYear = document.getElementById('year');
        footerYear.innerHTML = new Date().getFullYear();
    </script>
</body>

</html>
