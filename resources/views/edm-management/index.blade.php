@extends('edm-management.layout')

@section('title', 'EDM Management')

@section('content')
    <section class="header-sec">
        <div class="animation-wrapper">
            <div id="stars-group-1"></div>
            <div id="stars-group-2"></div>
            <div id="stars-group-3"></div>
            <div id="stars-group-4"></div>
            <div id="stars-group-5"></div>
            <div id="stars-group-6"></div>
        </div>

        <img src="assets/img/edm-logo-2.png" alt="" />
        <p class="header-des">
            Upgrade your business with innovation and professional consultants. To make your work easier and save your time more than ever.
            <br/><br/>
            We focus on reults. For us,It's all abount what adds value for you and your business. above all, we work with you and lead you to success.
        </p>
    </section>

    <section class="solution-sec" id="serviceSection">
        <div class="solution-title">
            <h1>Our Services</h1>
        </div>

        <div class="solu-icons">
            <div class="solu-items">
                <lottie-player src="assets/img/animated-icons/services-icon/Network.json" background="transparent"
                    speed="1" hover loop></lottie-player>
               
                <span>Network <br/> Consulting</span>
            </div>
            <div class="solu-items">
                <lottie-player src="assets/img/animated-icons/services-icon/Digital Consulting.json"
                background="transparent" speed="1" hover loop></lottie-player>
                <span>Network Solution /<br/> Cabling / Equipment</span>
            </div>
            <div class="solu-items">
                <lottie-player src="assets/img/animated-icons/services-icon/Software.json" background="transparent"
                speed="1" hover loop></lottie-player>
                <span>Software Development</span>
            </div>
        </div>
    </section>

    <section class="our-work">
        <h1>Our Work</h1>
        <p>
            Today, EDM works with more than 60 clients with needs for technology,
            internet, media and innovation, reaching more than 20 million gamers
            through 80 projects and events.
        </p>

        <div class="works-container">
            <!-- load data -->
        </div>
    </section>

    <section class="partner-sec">
        <div class="partner-header">
            <h1>Our Trusted Partner</h1>
            <p>
                EDM Management ทำงานร่วมกับแบรนด์​ชั้นนำมากมาย และคอยช่วยให้คำแนะนำ
                เรื่องการใช้ นวัตกรรม / เทคโนโลยี และ
                ระบบต่างๆที่เกี่ยวข้องกับการใช้งานอินเตอร์เน็ต
                สำหรับงานอีเว้นท์และสถานที่ต่าง ๆ เพื่อให้เกิดประสิทธิภาพมากที่สุด
            </p>
        </div>
        {{view('partner-logo')}}
        {{-- <div class="partner-logo">
            <div>
                <img src="assets/img/manage-partner-icons/1-garena.png" alt="" />
                <img src="assets/img/manage-partner-icons/2-nexon.png" alt="" />
                <img src="assets/img/manage-partner-icons/3-ow.png" />
                <img src="assets/img/manage-partner-icons/4-blizzard.png" alt="" />
                <img src="assets/img/manage-partner-icons/5-Riot_Games_logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/6-valorant-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/7-tencent.png" alt="" />
                <img src="assets/img/manage-partner-icons/8-shopee-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/9-google-play-icon.png" alt="" />
                <img src="assets/img/manage-partner-icons/10-ubisoft.png" alt="" />
                <img src="assets/img/manage-partner-icons/11-Youtube-Logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/12-mvp.png" alt="" />
                <img src="assets/img/manage-partner-icons/13-tgs.png" alt="" />
                <img src="assets/img/manage-partner-icons/14-os.png" alt="" />
                <img src="assets/img/manage-partner-icons/15-nbct.png" alt="" />
                <img src="assets/img/manage-partner-icons/16-BYG.png" alt="" />
                <img src="assets/img/manage-partner-icons/17-tesf.png" alt="" />
                <img src="assets/img/manage-partner-icons/18-ptt.png" alt="" />
                <img src="assets/img/manage-partner-icons/19-toyota-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/20-true-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/21-ais.png" alt="" />
                <img src="assets/img/manage-partner-icons/22-paragon.png" alt="" />
                <img src="assets/img/manage-partner-icons/23-true-icon.png" alt="" />
                <img src="assets/img/manage-partner-icons/24-bts.png" alt="" />
                <img src="assets/img/manage-partner-icons/25-aov.png" alt="" />
                <img src="assets/img/manage-partner-icons/26-rov.png" alt="" />
                <img src="assets/img/manage-partner-icons/27-pubg-m.png" alt="" />
                <img src="assets/img/manage-partner-icons/28-pubg.png" alt="" />
                <img src="assets/img/manage-partner-icons/29-logitech.png" alt="" />
                <img src="assets/img/manage-partner-icons/30-samsung.png" alt="" />
                <img src="assets/img/manage-partner-icons/31-intel.png" alt="" />
                <img src="assets/img/manage-partner-icons/32-wd-black-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/33-fifa-4.png" alt="" />
                <img src="assets/img/manage-partner-icons/34-fifa.png" alt="" />
                <img src="assets/img/manage-partner-icons/35-ea.png" alt="" />
                <img src="assets/img/manage-partner-icons/36-ps.png" alt="" />
                <img src="assets/img/manage-partner-icons/37-facebook-icon.png" alt="" />
                <img src="assets/img/manage-partner-icons/38-acer-predator-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/39-synnex.png" alt="" />
                <img src="assets/img/manage-partner-icons/40-Set-logo.png" alt="" />
                <img src="assets/img/manage-partner-icons/41-bitkub.png" alt="" />
                <img src="assets/img/manage-partner-icons/42-assawinasset.png" alt="" />
                <img src="assets/img/manage-partner-icons/43-krungsri.png" alt="" />
                <img src="assets/img/manage-partner-icons/44-lenovo.png" alt="" />
                <img src="assets/img/manage-partner-icons/45-legion.png" alt="" />
                <img src="assets/img/manage-partner-icons/46-infocomm.png" alt="" />
                <img src="assets/img/manage-partner-icons/47-edtex.png" alt="" />
                <img src="assets/img/manage-partner-icons/48-line.png" alt="" />
                <img src="assets/img/manage-partner-icons/49-bett.png" alt="" />
                <img src="assets/img/manage-partner-icons/50-gg-invitation.png" alt="" />
                <img src="assets/img/manage-partner-icons/51-hat.png" alt="" />
                <img src="assets/img/manage-partner-icons/52-ti_logo.png" alt="" />
            </div>
        </div> --}}
    </section>

    <section class="contact-us" id="contactSection">
        <h1>“Achieve your dreams with great innovation”</h1>

        <hr class="section-line" />
        <div class="contact-us-form">
            <div>
                <p>Have Question?</p>
                <h2>CONTACT US</h2>
                <p>
                    Got doubts? Reach out to us and we will help you out with your
                    queries. You can ask us anything, we are available for you.
                </p>
            </div>
            <form action="">
                <input type="text" placeholder="Enter your name" />
                <input type="email" placeholder="Enter your email" />
                <input type="number" placeholder="Enter your phone number" />
                <input type="text" placeholder="Enter your company name" />
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    const apiUrl = 'https://edm.desdev.me/api/portfolio-items-limit/5'; // Replace with your API URL
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
              <a href="our-work/${item.id}?view=${item.id}">LOAD MORE</a>
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
              targetSection.scrollIntoView({ behavior: 'smooth' });
          }
      });
      document.querySelector('a[href="#contactSection"]').addEventListener('click', function(event) {
          event.preventDefault();

          const targetSection = document.getElementById('contactSection');

          if (targetSection) {
              targetSection.scrollIntoView({ behavior: 'smooth' });
          }
      });
  </script>
@endsection
