<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'EDM') | Branding </title>
    <link rel="stylesheet" href="{{asset('edm-management/assets/fonts/fonts.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/base-style.css?v=' . filemtime(public_path('edm-management/assets/css/base-style.css'))) }}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/index.css?v='  . filemtime(public_path('edm-management/assets/css/index.css')))}}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/navbar_style.css?v=' . filemtime(public_path('edm-management/assets/css/navbar_style.css'))) }}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/particle-anim.css?v=' . filemtime(public_path('edm-management/assets/css/particle-anim.css'))) }}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/management-style.css?v='  . filemtime(public_path('edm-management/assets/css/management-style.css')))}}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/article-style.css?v='  . filemtime(public_path('edm-management/assets/css/article-style.css')))}}" />
    <link rel="stylesheet" href="{{asset('edm-management/assets/css/contact-us.css?v=' . filemtime(public_path('edm-management/assets/css/contact-us.css')))}}" />
    <link rel="shotcut icon" type="image/svg+xml" href="{{ asset('assets/img/edm_logo_com.svg') }}">
</head>

<body>
    <div class="side-menu">
        <svg class="close-btn" id="close-sidenav-btn" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
            <path fill="#ffff"
                d="M12.45 38.7 9.3 35.55 20.85 24 9.3 12.5l3.15-3.2L24 20.8 35.55 9.3l3.15 3.2L27.2 24l11.5 11.55-3.15 3.15L24 27.2Z" />
        </svg>

        <div class="side-btn-section">
            <a href="index.html" class="side-btn"><img src="{{asset('edm-management/assets/img/edm-logo.png')}}" alt="" /></a>

            <a href="{{route('our-work.index')}}" class="side-btn">OUR WORK</a>
            <a href="#serviceSection" class="side-btn">SERVICE</a>
            <a href="#contactSectionManagement" class="side-btn">CONTACT US</a>
            <div class="lang-change-btns">
                <a href="" class="active" id="thaiBtn"><img src="{{asset('edm-management/assets/img/thai-lang-icon.png')}}" width="20"
                        alt="" /> TH</a>
                {{-- <a href="" id="engBtn"><img src="{{asset('edm-management/assets/img/UK.png')}}" width="20" alt="" /> ENG</a> --}}
            </div>
        </div>
    </div>

    <div class="main">
        <nav class="">
            <!-- Nav Hamberger menu -->
            <div class="nav-menu">
                <img src="{{asset('edm-management/assets/img/menu.svg')}}" alt="" />
            </div>

            <div class="nav-btns">
                <a href="{{url('edm-management/index')}}"><img src="{{asset('edm-management/assets/img/edm-logo-2.png')}}" alt="" /></a>
                <div class="nav-btns-wrapper">
                    <a href="{{route('our-work.index')}}" class="underline-our">OUR WORK</a>
                    <a href="#serviceSection" class="underline">SERVICE</a>
                    <a href="#contactSectionManagement" class="underline">CONTACT US</a>
                    {{-- <div class="nav-dropdown" data-dropdown>
                        <button class="nav-dropdown-btn" data-dropdown-button>
                            <img src="{{asset('edm-management/assets/img/thai-lang-icon.png')}}" alt="" /> TH
                            <img src="{{asset('edm-management/assets/img/expand.svg')}}" alt="" />
                        </button>
                        <div class="nav-dropdown-menu">
                            <a href=""><img src="{{asset('edm-management/assets/img/thai-lang-icon.png')}}" width="20" alt="" id="thaiBtn2" />
                                TH</a>
                            <a href=""><img src="{{asset('edm-management/assets/img/UK.png')}}" width="20" alt="" id="engBtn2" /> ENG</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </nav>
        {{ view('gadget-menu') }}
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')

        <footer>
            <div class="footer-top">
                <div class="footer-logos">
                    <a href="{{url('/')}}"><img src="{{asset('edm-management/assets/img/edm_logo_com.svg')}}" alt="" /></a>
                    <a href="{{url('edm-management/index')}}"><img src="{{asset('edm-management/assets/img/edm-logo-2.png')}}" alt="" /></a>
                </div>

                <form action="{{route('our-work.index')}}" method="GET">
                    <input type="search" placeholder="SEARCH" name="search" />
                    <button type="submit">
                        <img src="{{asset('edm-management/assets/img/icon_search.svg')}}" alt="" />
                    </button>
                </form>
            </div>
            <div class="footer-bot">
                <span>COPYRIGHT <span>&copy;</span><span id="year">2023</span> EDM HOLDING ALL RIGHTS
                    RESERVED.</span>
                <a href="">Terms of use I Privacy Policy</a>
            </div>
        </footer>
        <!-- end main content-->
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{asset('edm-management/assets/js/navbar.js')}}"></script>
    {{-- <script>
        const apiUrl = 'https://edmcompany.co.th/api/portfolio-items-limit/3'; // Replace with your API URL
        const worksContainer = document.querySelector('.works-container');

        // Fetch data from the API and populate the HTML structure
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                data.data.forEach(item => {
                    const workItem = document.createElement('div');
                    workItem.classList.add('work-item');

                    const workImgs = document.createElement('div');
                    workImgs.classList.add('work-imgs');
                    for (let i = 0; i < Math.min(item.images.length, 3); i++) {
                        const img = document.createElement('img');
                        img.src = item.images[i].image;
                        img.alt = 'Work Image';
                        workImgs.appendChild(img);
                    }


                    const workTxt = document.createElement('div');
                    workTxt.classList.add('work-txt');
                    workTxt.innerHTML = `
              <h3>${item.title}</h3>
              <p>${item.short_detail_en}</p>
              <div class="morebtn">
                <a href="our-work-detail.html?view=${item.id}">LOAD MORE</a>
              </div>
            `;

                    workItem.appendChild(workImgs);
                    workItem.appendChild(workTxt);
                    worksContainer.appendChild(workItem);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });

        document.querySelector('a[href="#serviceSection"]').addEventListener('click', function(event) {
            event.preventDefault();

            const targetSection = document.getElementById('serviceSection');

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
        document.querySelector('a[href="#contactSection"]').addEventListener('click', function(event) {
            event.preventDefault();

            const targetSection = document.getElementById('contactSection');

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script> --}}
    @yield('scripts')
    <!-- Google tag (gtag.js) --> <script async src="[https://www.googletagmanager.com/gtag/js?id=G-BD0DNRZH9H](https://www.googletagmanager.com/gtag/js?id=G-BD0DNRZH9H)"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-BD0DNRZH9H'); </script>
    <script>
         const settingApiUrl = 'https://edmcompany.co.th/api/settings/2';
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
        const dataMenuSection = document.querySelectorAll('a[href="#contactSectionManagement"]');
        const dataMenuService = document.querySelectorAll('a[href="#serviceSection"]');
        for (let i = 0; i < dataMenuService.length; i++)
        {
            dataMenuService[i].addEventListener("click", function() {
                const targetSection = document.getElementById('serviceSection');
            if (window.location.pathname != "/index" || window.location.pathname != "/index#serviceSection") {
                window.location.href = "/edm-management/index#serviceSection";
            }
            // else {
            //     // ไปยังหน้า branding

            // }
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
            });
        }
        for (let i = 0; i < dataMenuSection.length; i++) {
            dataMenuSection[i].addEventListener("click", function() {
                const targetSection = document.getElementById('contactSectionManagement');
            if (window.location.pathname != "/index" || window.location.pathname != "/index#contactSectionManagement") {
                window.location.href = "/edm-management/index#contactSectionManagement";
            }
            // else {
            //     // ไปยังหน้า branding

            // }
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
