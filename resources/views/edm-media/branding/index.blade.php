@extends('layout')

@section('title', 'Brand')

@section('content')
    <div class="main">
        <section class="header-sec">
            {{ view('animation-wrapper') }}
            {{-- {{view('gadget-menu')}} --}}
            {{-- <div class="animation-wrapper">
                <div id="stars-group-1"></div>
                <div id="stars-group-2"></div>
                <div id="stars-group-3"></div>
                <div id="stars-group-4"></div>
                <div id="stars-group-5"></div>
                <div id="stars-group-6"></div>
            </div>
            <div class="gadget-menu">
                <a href=""><img src="assets/img/gadget-icons/fb-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/yt-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/gadget-edm-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/joinus-icon.svg" alt="" /></a>
            </div> --}}

            <img src="{{ asset('assets/img/edm-logo.png') }}" alt="" />
            <p class="header-des">
                {{-- ผู้เชี่ยวชาญทางด้านการดูแลบริหารจัดการครีเอเตอร์
                ที่คอยสนับสนุนในทุกความฝันที่คุณอยากจะเป็น
                โดยมุ่งเน้นให้คุณเติบโตแบบก้าวกระโดดในทุกโซเชียลมีเดีย แพลตฟอร์ม
                ทั้งในด้านการขยายกลุ่มผู้ชมและการเพิ่มรายได้ --}}
                ทีมงานมืออาชีพของเรามีความเชี่ยวชาญในการดูแล และบริหารจัดการงานอินฟลูเอนเซอร์, แคมเปญการตลาด,
                และสื่อออนไลน์ เราเข้าใจถึงความสำคัญของการบริหารจัดการงานสปอนเซอร์ ป้องกันการถูกแฮ็ค จัดการเรื่องภาษี
                ดังนั้นเราพร้อมที่จะเป็นพันธมิตรที่มั่นคง และมุ่งมั่นในการจัดการเรื่องที่เกี่ยวกับธุรกิจของคุณอย่างมืออาชีพ
            </p>
        </section>

        <section class="solution-sec">
            <div class="solution-title">
                <h1>Our Services</h1>
                <p>
                    {{-- Because we are expert in media platform and influencer. We think
                    about your brand and value proposition as priority, so every problem
                    about influencer and digital innovation can be solved with our
                    hands. --}}
                    เพราะเราคือผู้เชี่ยวชาญด้านสื่อออนไลน์แพลตฟอร์ฒต่างๆ และ อินฟลูเอนเซอร์
                    เราถือว่าแบรนด์และการนำเสนอคุณค่าของแบรนด์คุณเป็นสิ่งสำคัญ
                    ดังนั้นทุกปัญหาเกี่ยวกับอินฟลูเอนเซอร์และนวัตกรรมดิจิทัลสามารถแก้ไขได้ด้วยมือของเรา
                </p>
            </div>

            <div class="solu-icons">
                <div class="solu-items">
                    <lottie-player src="{{ asset('assets/img/animated-icons/branding-icons/bar_chart.json') }}"
                        background="transparent" speed="1" hover loop="true"></lottie-player>
                    <span>Marketing Solution</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{ asset('assets/img/animated-icons/branding-icons/credit_bereau.json') }}"
                        background="transparent" speed="1" hover loop="true"></lottie-player>
                    <span>Content Creator</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{ asset('assets/img/animated-icons/branding-icons/avatar.json') }}"
                        background="transparent" speed="1" hover loop="true"></lottie-player>
                    <span>KOLs</span>
                </div>
                {{-- <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/branding-icons/event.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Event</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/branding-icons/live.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Live Streaming Broadcast</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/branding-icons/feedback.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Social Sharing</span>
                </div> --}}
            </div>
        </section>

        <section class="partfolio-sec">
            {{-- <h1>Portfolio</h1>
            <p>
                Today, EDM works with more than 60 clients with needs for technology,
                internet, media and innovation, reaching more than 20 million gamers
                through 80 projects and events.
            </p> --}}
            {{-- <div class="tabs-container">
                <ul class="nav nav-pills" id="portfolio-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-youTube-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-youTube" type="button" role="tab" aria-controls="pills-youTube"
                            aria-selected="true">
                            YouTube
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tiktok-tab" data-bs-toggle="pill" data-bs-target="#pills-tiktok"
                            type="button" role="tab" aria-controls="pills-tiktok" aria-selected="false"
                            onclick="loadData(2)">
                            TikTok
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-facebook-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook"
                            aria-selected="false" onclick="loadData(3)">
                            Facebook
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-twitch-tab" data-bs-toggle="pill" data-bs-target="#pills-twitch"
                            type="button" role="tab" aria-controls="pills-twitch" aria-selected="false"
                            onclick="loadData(4)">
                            Twitch
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-instagram-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-instagram" type="button" role="tab"
                            aria-controls="pills-instagram" aria-selected="false" onclick="loadData(5)">
                            Instagram
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="portfolio-tabContent">
                    <div class="tab-pane fade show active" id="pills-youTube" role="tabpanel"
                        aria-labelledby="pills-youTube-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-1"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-tiktok" role="tabpanel" aria-labelledby="pills-tiktok-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-2"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-3"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-twitch" role="tabpanel" aria-labelledby="pills-twitch-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-4"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-instagram" role="tabpanel" aria-labelledby="pills-instagram-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-5"></div>
                    </div>
                </div>
            </div> --}}
        </section>
        <section class="partfolio-sec">
            <h1>Our Work</h1>
            <p>
                {{-- Today, EDM works with more than 60 clients with needs for technology,
                internet, media and innovation, reaching more than 20 million gamers
                through 80 projects and events. --}}
                ปัจจุบัน EDM ทำงานร่วมกับลูกค้ามากกว่า 60 รายที่มีความต้องการเทคโนโลยี อินเทอร์เน็ต
                สื่อ และนวัตกรรม เราสามารถเข้าถึงเกมเมอร์มากกว่า 20 ล้านคนผ่าน 80 โปรเจ็กต์และกิจกรรมต่างๆ
            </p>
            <div class="tabs-container" id="tabs-containe">
                {{-- <ul class="nav nav-pills" id="portfolio-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-youTube-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-youTube" type="button" role="tab" aria-controls="pills-youTube"
                            aria-selected="true">
                            YouTube
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tiktok-tab" data-bs-toggle="pill" data-bs-target="#pills-tiktok"
                            type="button" role="tab" aria-controls="pills-tiktok" aria-selected="false"
                            onclick="loadData(2)">
                            TikTok
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-facebook-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook"
                            aria-selected="false" onclick="loadData(3)">
                            Facebook
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-twitch-tab" data-bs-toggle="pill" data-bs-target="#pills-twitch"
                            type="button" role="tab" aria-controls="pills-twitch" aria-selected="false"
                            onclick="loadData(4)">
                            Twitch
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-instagram-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-instagram" type="button" role="tab"
                            aria-controls="pills-instagram" aria-selected="false" onclick="loadData(5)">
                            Instagram
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="portfolio-tabContent">
                    <div class="tab-pane fade show active" id="pills-youTube" role="tabpanel"
                        aria-labelledby="pills-youTube-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-1"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-tiktok" role="tabpanel" aria-labelledby="pills-tiktok-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-2"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-3"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-twitch" role="tabpanel" aria-labelledby="pills-twitch-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-4"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-instagram" role="tabpanel" aria-labelledby="pills-instagram-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-5"></div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="tabs-container">
                <ul class="nav nav-pills" id="portfolio-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-youTube-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-youTube" type="button" role="tab" aria-controls="pills-youTube"
                            aria-selected="true"
                            onclick="loadData(1)">
                            YouTube
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tiktok-tab" data-bs-toggle="pill" data-bs-target="#pills-tiktok"
                            type="button" role="tab" aria-controls="pills-tiktok" aria-selected="false"
                            onclick="loadData(2)">
                            TikTok
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-facebook-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook"
                            aria-selected="false" onclick="loadData(3)">
                            Facebook
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-twitch-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-twitch" type="button" role="tab" aria-controls="pills-twitch"
                            aria-selected="false" onclick="loadData(4)">
                            Twitch
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-instagram-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-instagram" type="button" role="tab"
                            aria-controls="pills-instagram" aria-selected="false" onclick="loadData(5)">
                            Instagram
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="portfolio-tabContent">
                    <div class="tab-pane fade show active" id="pills-youTube" role="tabpanel"
                        aria-labelledby="pills-youTube-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-1"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-tiktok" role="tabpanel" aria-labelledby="pills-tiktok-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-2"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-3"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-twitch" role="tabpanel" aria-labelledby="pills-twitch-tab"
                        tabindex="0">
                        <div class="activity-cards" id="campaign-cards-4"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-instagram" role="tabpanel"
                        aria-labelledby="pills-instagram-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-5"></div>
                    </div>
                </div>
            </div> --}}
        </section>
        <section class="activity-sec">
            <div class="activity-item">
                <div class="activity-item-h">
                    <h1 onclick="read()">News and Activity</h1>
                    <hr />
                </div>
                <div class="activity-cards" id="activity-cards"></div>
            </div>
        </section>

        <section class="gallery">
            <h1>Gallery</h1>
            {{-- <div class="sub-slider-container">
                <ul class="vtuber-slider" id="vtuber-slider"></ul>
            </div> --}}
        </section>
        <div class="slider-gallery">
            <div class="flex justify-content-around">
                <div id="image-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list" id="vtuber-slider">
                            {{-- <li class="splide__slide">
                                <img src="{{asset('assets/img/activity_img_1.png')}}">
                            </li>
                            <li class="splide__slide">
                                <img src="{{asset('assets/img/activity_img_1.png')}}">
                            </li>
                            <li class="splide__slide">
                                <img src="{{asset('assets/img/activity_img_1.png')}}">
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>

        {{-- <div id="carouselExampleControls" class="carousel slide slidemain" data-bs-ride="carousel">
            <div class="carousel-inner slider" id="vtuber-slider">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div> --}}

        <section class="partner-sec mt-2">
            <div class="partner-header">
                <h1>Our Trusted Partner</h1>
                <p>
                    {{-- EDM Media ทำงานร่วมกับแบรนด์ชั้นนำมากมาย
                    และคอยช่วยให้คำแนะนำการทำแคมเปญ การตลาดโดยใช้อินฟลูเอนเซอร์
                    เพื่อตอบโจทย์แบรนด์ สื่อสารได้ตรงกลุ่มเป้าหมาย
                    และมีประสิทธิภาพมากที่สุด --}}
                    EDM Media คือ มืออาชีพด้านการดูแลบริหารจัดการครีเอเตอร์ในประเทศไทย
                    โดยทีมงานผู้มีประสบการณ์กว่า 10 ปี ที่จะเข้ามาช่วยให้คุณสามารถสร้างสรรค์คอนเทนต์ได้อย่างสบายใจ
                    ไม่ต้องห่วงปัญหา เพราะเรามีทั้งพาร์ทเนอร์ และผู้เชี่ยวชาญ ที่สามารถดูแล และให้คำปรึกษาอย่างมืออาชีพ
                </p>
                <p>
                    {{-- เราเป็นเอเจนซี่มีความสัมพันธ์ใกล้ชิดและรู้จักกลุ่มคนดูของอินฟลูเอนเซอร์เป็นอย่างดี
                    ทำให้เราทำงานด้วยความรวดเร็ว และช่วยวิเคราะห์ข้อมูล
                    เลือกใช้อินฟลูเอนเซอร์ได้เหมาะสมกับสินค้า --}}
                    ด้วยบริการที่ทำให้คุณมั่นใจ เพื่อให้คุณสามารถสร้างสรรค์ และบริหารจัดการช่องของคุณได้อย่างสบายใจ
                </p>
            </div>
            {{ view('../partner-logo') }}
            {{-- <div class="partner-logo">
                <div>
                    <img src="assets/img/customers-icons/3BBLOGO.png" alt="" />
                    <img src="assets/img/customers-icons/advice.png" alt="" />
                    <img src="assets/img/customers-icons/ais.png" alt="" />
                    <img src="assets/img/customers-icons/AKRA-MEDIA-logo.png" alt="" />
                    <img src="assets/img/customers-icons/amd.png" alt="" />
                    <img src="assets/img/customers-icons/AMP.png" alt="" />
                    <img src="assets/img/customers-icons/anymind.png" alt="" />
                    <img src="assets/img/customers-icons/bex.png" alt="" />
                    <img src="assets/img/customers-icons/buzzpurr.png" alt="" />
                    <img src="assets/img/customers-icons/cligk.png" alt="" />
                    <img src="assets/img/customers-icons/ditology.png" alt="" />
                    <img src="assets/img/customers-icons/dtac.png" alt="" />
                    <img src="assets/img/customers-icons/Enter-Logo.png" alt="" />
                    <img src="assets/img/customers-icons/five-star.png" alt="" />
                    <img src="assets/img/customers-icons/foundeast_logo.png" alt="" />
                    <img src="assets/img/customers-icons/game-fever.png" alt="" />
                    <img src="assets/img/customers-icons/gamingdose.png" alt="" />
                    <img src="assets/img/customers-icons/Gushcloud-Logo.png" alt="" />
                    <img src="assets/img/customers-icons/HypeFactory.png" alt="" />
                    <img src="assets/img/customers-icons/IGG.png" alt="" />
                    <img src="assets/img/customers-icons/ik-media.png" alt="" />
                    <img src="assets/img/customers-icons/ini3.png" alt="" />
                    <img src="assets/img/customers-icons/kray.png" alt="" />
                    <img src="assets/img/customers-icons/LG-LINKWORLD.png" alt="" />
                    <img src="assets/img/customers-icons/lita.png" alt="" />
                    <img src="assets/img/customers-icons/logo-dream-Guardians-studio.png" alt="" />
                    <img src="assets/img/customers-icons/logo-mc-PNG.png" alt="" />
                    <img src="assets/img/customers-icons/logo.png" alt="" />
                    <img src="assets/img/customers-icons/logoNMB.png" alt="" />
                    <img src="assets/img/customers-icons/mad.png" alt="" />
                    <img src="assets/img/customers-icons/madeviral.png" alt="" />
                    <img src="assets/img/customers-icons/MDG-logo.png" alt="" />
                    <img src="assets/img/customers-icons/MZT-LOGO.png" alt="" />
                    <img src="assets/img/customers-icons/Pixela.png" alt="" />
                    <img src="assets/img/customers-icons/planup.png" alt="" />
                    <img src="assets/img/customers-icons/playpark.png" alt="" />
                    <img src="assets/img/customers-icons/pops.png" alt="" />
                    <img src="assets/img/customers-icons/rabbits.png" alt="" />
                    <img src="assets/img/customers-icons/ripples.png" alt="" />
                    <img src="assets/img/customers-icons/rog.png" alt="" />
                    <img src="assets/img/customers-icons/sailson.png" alt="" />
                    <img src="assets/img/customers-icons/SanDisk.png" alt="" />
                    <img src="assets/img/customers-icons/shin-a.png" alt="" />
                    <img src="assets/img/customers-icons/star-speedy-growth.png" alt="" />
                    <img src="assets/img/customers-icons/talon.png" alt="" />
                    <img src="assets/img/customers-icons/TQPR-Logo.png" alt="" />
                    <img src="assets/img/customers-icons/Up-and-above.png" alt="" />
                    <img src="assets/img/customers-icons/vero.png" alt="" />
                    <img src="assets/img/customers-icons/wd_black.png" alt="" />
                    <img src="assets/img/customers-icons/whim-logo.png" alt="" />
                    <img src="assets/img/customers-icons/youdao.png" alt="" />
                    <img src="assets/img/customers-icons/ZORKA.png" alt="" />
                </div>
            </div> --}}
        </section>

        <section class="contact-us">
            <h1>
                เราคือผู้เชี่ยวชาญด้านการตลาด โดยใช้ อินฟลูเอนเซอร์ในประเทศไทยที่
                สามารถช่วยให้คุณประสบความสำเร็จ
            </h1>

            <hr class="section-line" />
            <div class="contact-us-form">
                <div id="contactSectionMedia">
                    <p>Have Question?</p>
                    <h2>CONTACT US</h2>
                    <p>
                        Got doubts? Reach out to us and we will help you out with your
                        queries. You can ask us anything, we are available for you.
                    </p>
                </div>
                <form action="">
                    <input type="text" placeholder="Enter Your Name" />
                    <input type="email" placeholder="Enter Your Email" />
                    <textarea name="" id="" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="{{asset('assets/css/splide.min.css')}}">
    <script src="{{asset('assets/js/splide.min.js')}}"></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const apiUrl = "https://edmcompany.co.th/api/branding-gallery";
        const newsApiUrl = "https://edmcompany.co.th/api/news";
        const campaignApiUrl = "https://edmcompany.co.th/api/campaigns";

        async function fetchImages() {
          try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            const vtuberSlider = document.getElementById("vtuber-slider");

            data.data.forEach((imageUrl,index) => {
                const vtuberItem = document.createElement("li");
                vtuberItem.classList.add("splide__slide");
                const img = document.createElement("img");
                img.src = imageUrl.image;

              vtuberItem.appendChild(img);
              vtuberSlider.appendChild(vtuberItem);
            });
            var splide = new Splide('#image-slider', {
            type: 'loop',
            perPage: 3,
            gap: 10,
            arrows: true,
            pagination: true,
            autoplay: true,
            rewind: true,
            breakpoints: {
                1024: {
                perPage: 2, // Show only 1 image per slide on mobile
                arrows: false,
                rewind: true,
                type: 'loop',
                },
                940: { // Target screens below 640px
                perPage: 1, // Show only 1 image per slide on mobile
                arrows: false,
                rewind: true,
                type: 'loop',
                pagination: false,
                },
            }
            });

            splide.mount();

            // setTimeout(() => {
            //   // Initialize the Slick slider
            //   $(vtuberSlider).slick({
            //     infinite: true,
            //     centerMode: true,
            //     infinite: true,
            //     centerPadding: "0",
            //     slidesToShow: 3,
            //     slidesToScroll: 3,
            //     arrows: false,
            //     responsive: [
            //       {
            //         breakpoint: 1400,
            //         settings: {
            //           slidesToShow: 1,
            //           slidesToScroll: 1,
            //           centerPadding: 0,
            //         },
            //       },
            //     ],
            //   });
            // }, 1500);
          } catch (error) {
            console.error("Error fetching images:", error);
          }
        }

        async function fetchNews() {
          try {
            const response = await fetch(newsApiUrl);
            const newsData = await response.json();

            const activityCards = document.getElementById("activity-cards");

            newsData.data.forEach((newsItem) => {
              const actCard = document.createElement("div");
              actCard.classList.add("act-card", "company");

              const dateSpan = document.createElement("span");
              dateSpan.textContent = newsItem.created_at;

              const img = document.createElement("img");
              img.src = newsItem.image;
              img.alt = "";

              const divContent = document.createElement("div");
              divContent.classList.add("div-activity-cards");
              const typeSpan = document.createElement("span");
              typeSpan.textContent = newsItem.type;

              const authorSpan = document.createElement("span");
              authorSpan.textContent = ''; //`By ${newsItem.signature}`;

              const descriptionSpan = document.createElement("span");
              descriptionSpan.classList.add('description');
              descriptionSpan.textContent = newsItem.title;

              const readMoreLink = document.createElement("a");
              var url = `{{route('news-activity.show', ['news_activity' => 'newsItem.id', 'view' => 'newsItem.id'])}}`;
              readMoreLink.href = url.replaceAll('newsItem.id', newsItem.id);
                // "news-activity/"+newsItem.id+"?view=" + newsItem.id;
              readMoreLink.textContent = "READ MORE";

                //   divContent.appendChild(typeSpan);
                //   divContent.appendChild(authorSpan);
              divContent.appendChild(descriptionSpan);
              divContent.appendChild(readMoreLink);

              actCard.appendChild(dateSpan);
              actCard.appendChild(img);
              actCard.appendChild(divContent);

              activityCards.appendChild(actCard);
            });
          } catch (error) {
            console.error("Error fetching news:", error);
          }
        }

        // async function fetchCampaigns() {
        //   try {
        //     const response = await fetch(campaignApiUrl);
        //     const campaignData = await response.json();
        //     console.log( campaignData.data);
        //     const campaignCards = document.getElementById('campaign-cards');

        //     campaignData.data.forEach(campaignItem => {
        //       const campaignCard = document.createElement('div');
        //       campaignCard.classList.add('act-card');

        //       const dateSpan = document.createElement('span');
        //       dateSpan.textContent = campaignItem.created_at;

        //       const img = document.createElement('img');
        //       img.src = campaignItem.image;
        //       img.alt = '';

        //       const divContent = document.createElement('div');
        //       const typeSpan = document.createElement('span');
        //       typeSpan.textContent = campaignItem.group;

        //       const authorSpan = document.createElement('span');
        //       authorSpan.textContent = `By ${campaignItem.signature}`;

        //       const descriptionSpan = document.createElement('span');
        //       descriptionSpan.textContent = campaignItem.title;

        //       const readMoreLink = document.createElement('a');
        //       readMoreLink.href = "campaign-detail.html?view="+campaignItem.id;
        //       readMoreLink.textContent = 'READ MORE';

        //       divContent.appendChild(typeSpan);
        //       divContent.appendChild(authorSpan);
        //       divContent.appendChild(descriptionSpan);
        //       divContent.appendChild(readMoreLink);

        //       campaignCard.appendChild(dateSpan);
        //       campaignCard.appendChild(img);
        //       campaignCard.appendChild(divContent);

        //       campaignCards.appendChild(campaignCard);
        //     });
        //   } catch (error) {
        //     console.error('Error fetching campaigns:', error);
        //   }
        // }
        const hash = window.location.hash; // Get the hash part of the URL
        const targetSection = document.getElementById('contactSectionMedia'); // Get the element with the id "contactSection"

        if (hash === '#contactSectionMedia' && targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth' // Add smooth scrolling for better user experience
                });
        }
        fetchNews();
        group();
        // loadData(1);
        fetchImages();
      });
      function templateGroup(data)
      {
        let html = "";
        let html2 = "";
        html += `<ul class="nav nav-pills" id="portfolio-tab" role="tablist">`;
        html2 += `<div class="tab-content" id="portfolio-tabContent">`;
        data.forEach((element, index) => {
            if(index == 0)
            {
                html += `<li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-${element.title}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-${element.title}" type="button" role="tab" aria-controls="pills-${element.title}"
                            aria-selected="true"
                            onclick="loadData(${element.id})">
                            ${element.title}
                        </button>
                    </li>`;
            html2 += `<div class="tab-pane fade show active" id="pills-${element.title}" role="tabpanel"
                        aria-labelledby="pills-${element.title}-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-${element.id}"></div>
                    </div>`;
            } else {
                html += `<li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-${element.title}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-${element.title}" type="button" role="tab" aria-controls="pills-${element.title}"
                            aria-selected="true"
                            onclick="loadData(${element.id})">
                            ${element.title}
                        </button>
                    </li>`;
            html2 += `<div class="tab-pane fade" id="pills-${element.title}" role="tabpanel"
                        aria-labelledby="pills-${element.title}-tab" tabindex="0">
                        <div class="activity-cards" id="campaign-cards-${element.id}"></div>
                    </div>`;
            }

        });
        html += `</ul>`;
        html2 += `</div>`;
        return html + html2;
      }
      async function group()
      {
        const response = await fetch("https://edmcompany.co.th/api/groups");
        const result = await response.json();
        const tabGroup = document.getElementById("tabs-containe");
        tabGroup.innerHTML = templateGroup(result.data)
        if(result.data)
        {
            // console.log(result.data[0].id)
            await loadData(result.data[0].id)
        }

      }
      async function loadData(id) {
        const portUrl = "https://edmcompany.co.th/api/portfolios-group/" + id;
        try {
          const response = await fetch(portUrl);
          const campaignData = await response.json();
        //   console.log(campaignData.data);
          const campaignCards = document.getElementById("campaign-cards-" + id);
          campaignCards.innerHTML = "";

          campaignData.data.forEach((campaignItem) => {
            const campaignCard = document.createElement("div");
            campaignCard.classList.add("act-card");

            const dateSpan = document.createElement("span");
            dateSpan.textContent = campaignItem.created_at;

            const img = document.createElement("img");
            img.src = campaignItem.image;
            img.alt = "";

            const divContent = document.createElement("div");
            const typeSpan = document.createElement("span");
            typeSpan.textContent = campaignItem.group;

            const authorSpan = document.createElement("span");
            authorSpan.textContent = ``;

            const descriptionSpan = document.createElement("span");
            descriptionSpan.classList.add('description');
            descriptionSpan.textContent = campaignItem.title;

            const readMoreLink = document.createElement("a");
            readMoreLink.href = campaignItem.link;
            readMoreLink.textContent = "READ MORE";
            readMoreLink.target = "_blank";

            // divContent.appendChild(typeSpan);
            // divContent.appendChild(authorSpan);
            divContent.appendChild(descriptionSpan);
            divContent.appendChild(readMoreLink);

            campaignCard.appendChild(dateSpan);
            campaignCard.appendChild(img);
            campaignCard.appendChild(divContent);

            campaignCards.appendChild(campaignCard);
          });
        } catch (error) {
          console.error("Error fetching campaigns:", error);
        }
      }

    </script>
@endsection
