<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EDM - Company and Services</title>

    <link rel="stylesheet" href="assets/fonts/fonts.css?v=3" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('assets/css/base-style.css?v=' . filemtime(public_path('assets/css/base-style.css'))) }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/index.css?v='  . filemtime(public_path('assets/css/index.css'))) }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/navbar_style.css?v=' . filemtime(public_path('assets/css/navbar_style.css'))) }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/edm_logo_com.svg') }}">
    <meta property="og:title" content="Edm company">
    <meta property="og:url" content="https://edmcompany.co.th/">
    <meta property="og:image" content="https://edmcompany.co.th/backend/uploads/news/news09052024-663c65ef21d54.jpg">
    <meta property="og:description" content="บริษัท ที่มีวิสัยทัศน์ มุ่งมั่นสร้างสรรค์เพื่อนำเสนอเทคโนโลยีใหม่ ให้กับลูกค้าและพาร์ทเนอร์  และเป็นผู้เชี่ยวชาญด้านการตลาดสื่อสังคมออนไลน์ แพลตฟอร์มโซเชียลมีเดีย">
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
            <a href="{{ route('news-activity.index') }}" class="side-btn">News</a>
            <a href="{{ route('contact-us.index') }}" class="side-btn">CONTACT US</a>

            {{-- <div class="lang-change-btns">
                <a href="#" class="active" id="thaiBtn"><img src="{{ asset('assets/img/THAILAND.png') }}"
                        alt="" /> TH</a>
                <a href="#" id="engBtn"><img src="assets/img/UK.png" alt="" /> ENG</a>
            </div> --}}
        </div>
    </div>

    <main>
        <video autoplay muted loop id="map-bg">
            <source src="{{ asset('assets/img/map-bg.mp4') }}" type="video/mp4"  />
            Your browser does not support HTML5 video.
        </video>
        <nav class="">
            <!-- Nav Hamberger menu -->
            <div class="nav-menu">
                <img src="{{ asset('assets/img/menu.svg') }}" alt="" />
            </div>

            <div class="nav-btns">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/edm-company-logo.png') }}"
                        alt="" /></a>
                <div class="nav-btns-wrapper">
                    <ul class="menu">
                        <a href="#" collapse-button="company">COMPANY AND SERVICES</a>
                        <ul>
                            <div class="top-collapse-wrapper" collapse-content="company">
                                <div class="top-sec">
                                    <div class="top-link-item">
                                        <a href="{{ url('edm-management/index') }}" target="_black" rel="noopener noreferrer"><img src="{{ asset('assets/img/edm-logo-2.png') }}"
                                                alt="" /></a>
                                        <ul>
                                            <li>Network Solution</li>
                                            <li>Network Comsulting</li>
                                            <li>Event</li>
                                            <li>Live Steam Broadcast</li>
                                        </ul>
                                    </div>
                                    <div class="top-link-item">
                                        <a href="{{ url('edm-media/index') }}" target="_black" rel="noopener noreferrer"><img src="{{ asset('assets/img/edm-logo.png') }}"
                                                alt="" /></a>
                                        <ul>
                                            <li>KOLs</li>
                                            <li>Media Reach</li>
                                            <li>Marketing Consulting</li>
                                        </ul>
                                    </div>
                                    {{-- <div class="top-link-item">
                                <img src="{{asset('assets/img/edm-innovation.png')}}" alt="" />
                                <ul>
                                  <li><a href="#"> Virtual Reality </a></li>
                                  <li><a href="#"> Software Development </a></li>
                                </ul>
                              </div> --}}
                                </div>
                            </div>
                        </ul>
                    </ul>
                    <a href="{{ route('news-activity.index') }}" class="underline">NEWS</a>
                    <ul class="contact-us-ul">
                        <a href="#" collapse-button="contact">CONTACT US</a>
                        <ul>
                            <div class="top-collapse-wrapper" collapse-content="contact">
                                <div class="top-sec">
                                    <div class="contact-us-header">
                                        <p>Have Question?</p>
                                        <h1>CONTACT US</h1>
                                        <div>
                                            <img src="{{ asset('assets/img/google-map-icon.png') }}" alt="" />
                                            <p>
                                                {{-- 250/48 Sammakorn Soi 42 Ramkhamhaeng 112, Saphansung
                                                Sub-district, Saphansung District, Bangkok Thailand 10240 --}}
                                                250/48 Ramkhamhaeng 112 Ramkhamhaeng rd.
                                                Saphansung, Saphansung, Bangkok Thailand 10240
                                            </p>
                                        </div>
                                    </div>
                                    <form class="main-contact-us-form" id="contact-us-form">
                                        @csrf
                                        <div>
                                            <input type="text" name="company" value="CENTER" hidden>
                                            <input type="text" title="name" placeholder="Enter Your Name" name="name" />
                                            <input type="tel" title="phone" placeholder="Enter Your Phone Number" name="phone" />
                                        </div>
                                        <div>
                                            <input type="email" title="email" placeholder="Enter Your Email" name="email" />
                                            <input type="text" title="company" placeholder="Enter Your Company"
                                                name="user_company" />
                                        </div>
                                        <textarea name="message" id="" rows="4" placeholder="Enter your message"></textarea>
                                        <button type="submit">SEND</button>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </ul>

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
        {{-- {{ view('center-nav') }} --}}
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
                <form class="main-contact-us-form" id="contact-us-form">
                    @csrf
                    <div>
                        <input type="text" name="company" value="CENTER" hidden>
                        <input type="text" title="name" placeholder="Enter Your Name" name="name" />
                        <input type="tel" title="phone" placeholder="Enter Your Phone Number" name="phone" />
                    </div>
                    <div>
                        <input type="email" title="email" placeholder="Enter Your Email" name="email" />
                        <input type="text" title="company" placeholder="Enter Your Company"
                            name="user_company" />
                    </div>
                    <textarea name="message" id="" rows="4" placeholder="Enter your message"></textarea>
                    <button type="submit">SEND</button>
                </form>
            </div>
        </div> --}}
        <div class="links-sec">
            <div class="link-item orange" data-dropdown>
                <a href="{{ url('edm-management/index') }}"
                        style="color: inherit" target="_black" rel="noopener noreferrer"><h1>MANAGEMENT</h1></a>
                <div class="links-wrapper">
                    <ul>
                        <li><a href="#"> Network Solution </a></li>
                        <li><a href="#"> Network Comsulting </a></li>
                        <li><a href="#"> Event </a></li>
                        <li><a href="#"> Live Steam Broadcast </a></li>
                    </ul>
                </div>
            </div>
            <div class="link-item blue">
                <a href="{{ url('edm-media/index') }}" style="color: inherit" target="_black" rel="noopener noreferrer"><h1>MEDIA</h1></a>
                <div class="links-wrapper">
                    <ul>
                        <li><a href="#">KOLs</a></li>
                        <li><a href="#">Media Reach</a></li>
                        <li><a href="#">Marketing Consulting</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/navbarindex.js?v=6') }}"></script>
    <script>
        const instaForm = document.getElementById("contact-us-form");
        instaForm.addEventListener("submit", (event) => {
            event.preventDefault();
            // event.stopPropagation();
            let instaFormData = new FormData(instaForm);

            let url = `api/contact_centers`;

            fetch(url, {
                    method: "POST",
                    body: instaFormData,
                })
                .then((data) => data.json())
                .then((response) => {
                    instaForm.reset();
                    alert('Thank you! Your submission has been send.');
                })
                .catch((err) => console.error(err));
        });
    </script>
</body>

</html>
