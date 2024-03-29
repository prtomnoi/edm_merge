@extends('../layout')

@section('title', 'EDM')

@section('content')
    <div class="main">
        <section class="header-sec">
            {{view('animation-wrapper')}}
            {{-- {{view('gadget-menu')}} --}}
            <h1 class="header-title">
                เติมเต็มความฝัน <br />
                ให้คุณประสบความสำเร็จเร็วขึ้น
            </h1>
            <p class="header-des">
                ผู้เชี่ยวชาญทางด้านการดูแลบริหารจัดการครีเอเตอร์
                ที่คอยสนับสนุนในทุกความฝันที่คุณอยากจะเป็น
                โดยมุ่งเน้นให้คุณเติบโตแบบก้าวกระโดดในทุกโซเชียลมีเดีย แพลตฟอร์ม
                ทั้งในด้านการขยายกลุ่มผู้ชมและการเพิ่มรายได้
            </p>
            <div class="joinus-header">
                <p>อัพเกรด เพื่อยกระดับสู่เส้นทาง</p>
                <p>ครีเอเตอร์มืออาชีพ</p>
                <div class="morebtn mt-2">
                    <a href="{{route('contact-us.index')}}">Join Us</a>
                </div>
            </div>
        </section>

        {{-- <section class="stats-sec">
            <div class="stats-numb">
                <div class="numbs-item">
                    <p>100</p>
                    <p>ครีเอเตอร์</p>
                </div>
                <div class="numbs-item">
                    <p>80M</p>
                    <p>ผู้ติดตาม</p>
                </div>
                <div class="numbs-item">
                    <p>3,000M</p>
                    <p>จำนวนผู้เข้าชม</p>
                </div>
                <div class="numbs-item">
                    <p>8M</p>
                    <p>ชั่วโมงการรับชม</p>
                </div>
            </div>

            <div class="stats-des">
                <p>
                    EDM Media ผู้นำด้านการดูแลบริหารจัดการครีเอเตอร์ในประเทศไทย
                    โดยทีมงานผู้มีประสบการณ์กว่า 10 ปี
                    ที่จะเข้ามาช่วยติดอาวุธให้กับครีเอเตอร์
                    พัฒนาตัวตนของคุณออกมาแสดงให้ชัดเจนมากขึ้น
                    ให้คุณเป็นครีเอเตอร์ที่ไม่เหมือนใครและเติบโตบนโลกออนไลน์อย่างยั่งยืน
                </p>
                <p>
                    ด้วยการใช้เครื่องมือวิเคราะห์ข้อมูลเชิงลึก
                    การวางแผนคอนเท้นต์เพื่อรักษาแฟนคลับปัจจุบันและเข้าถึงกลุ่มผู้ชมใหม่
                    เพื่อขยายโอกาสให้คุณได้ทำงานร่วมกับแบรนด์สินค้าชั้นนำ
                    จากทั่วโลกอย่างเป็นมืออาชีพ
                </p>
            </div>
        </section> --}}

        <section class="solution-sec">
            <div class="solution-title">
                <h1>Our Solution</h1>
                <p>
                    ปลดล็อคขีดความสามารถให้ช่องของคุณก้าวไปสู่การเป็นครีเอเตอร์มืออาชีพ
                    ด้วยสิทธิประโยชน์ต่างๆ ที่เราคัดสรรมา
                    โดยคำนึกถึงความต้องการของคุณเป็นหลัก
                </p>
            </div>

            <div class="solu-icons">
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/Laptop.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Channel Growth</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/Bag-of-Money.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Platform Monetization</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/Handshake.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Brand Sponsorships</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/Care.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Support And Training</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/Diagram.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Community</span>
                </div>
                <div class="solu-items">
                    <lottie-player src="{{asset('assets/img/animated-icons/blue-icons/User.json')}}" background="transparent"
                        speed="1" hover loop="true"></lottie-player>
                    <span>Creator Business</span>
                </div>
            </div>
        </section>

        <hr class="section-line" />

        <section class="creator-sec">
            <div class="creator-header">
                <img src="{{asset('assets/img/edm-logo.png')}}" alt="" />
                <span>Our Creator</span>
            </div>

            <div class="creator-cards-sec" id="influencerResult"></div>

            <div class="morebtn">
                <a href="{{route('influencer.index')}}">LOAD MORE</a>
            </div>
        </section>

        <section class="v-commu-sec">
            <div class="v-commu-header">
                <h1>VTuber Community</h1>
                <span>VTuber
                    เป็นผู้ให้ความบันเทิงทางออนไลน์ที่ใช้อวตารเสมือนจริงที่สร้างขึ้นโดยใช้
                    คอมพิวเตอร์กราฟิก และเทคโนโลยีการจับภาพเคลื่อนไหวแบบเรียลไทม์ ทำให้
                    VTuber สามารถโต้ตอบกับผู้ชมได้อย่างคล่องแคล่วและสนุกสนาน
                    ซึ่งเป็นสไตล์การสร้างเนื้อหาที่ได้รับความนิยม ในหลายประเทศ
                    ที่ประเทศไทยมีสังกัด VTuber มืออาชีพ ที่ได้รับความนิยมอย่างสูง
                    เป็นตัวแทนของความคิดและความเป็นตัวตนของคนไทยในโลกออนไลน์ อย่าง
                    Pixela Project และ Polygon Project</span>
            </div>

            <div class="vtuber-slider" id="vtuber-slider"></div>

            <div class="morebtn">
                <a href="{{route('vtuber-community.index')}}">LOAD MORE</a>
            </div>
        </section>

        <section class="partner-sec">
            <div class="partner-header">
                <h1>Our Trusted Partner</h1>
                <p>
                    EDM Media ทำงานร่วมกับแบรนด์ชั้นนำมากมาย
                    และคอยช่วยให้คำแนะนำการทำแคมเปญ การตลาดโดยใช้อินฟลูเอนเซอร์
                    เพื่อตอบโจทย์แบรนด์ สื่อสารได้ตรงกลุ่มเป้าหมาย
                    และมีประสิทธิภาพมากที่สุด
                </p>
                <p>
                    เราเป็นเอเจนซี่มีความสัมพันธ์ใกล้ชิดและรู้จักกลุ่มคนดูของอินฟลูเอนเซอร์เป็นอย่างดี
                    ทำให้เราทำงานด้วยความรวดเร็ว และช่วยวิเคราะห์ข้อมูล
                    เลือกใช้อินฟลูเอนเซอร์ได้เหมาะสมกับสินค้า
                </p>
            </div>
            {{view('partner-logo')}}
            {{view('work-platforms')}}
        </section>

        <section class="activity-sec">
            <div class="activity-item">
                <div class="activity-item-h">
                    <h1>News and Activity</h1>
                    <hr />
                </div>

                <!-- result news -->
                <div class="activity-cards" id="activity-cards"></div>

                <div class="morebtn">
                    <a href="{{route('news-activity.index')}}">LOAD MORE</a>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-item-h">
                    <h1>Our Campaign</h1>
                    <hr />
                </div>
                <div class="activity-cards" id="campaign-cards"></div>
                <div class="morebtn">
                    <a href="{{route('our-campaign.index')}}">LOAD MORE</a>
                </div>
            </div>
        </section>

        <section class="vdo-highlight">
            <h1>Influencer's Video Highlight</h1>
            <div class="vdo-container" id="vdo-container"></div>
        </section>

        <section class="joinus-sec">
            <span>
                เราคือผู้เชี่ยวชาญด้านการตลาด โดยใช้ อินฟลูเอนเซอร์ในประเทศไทยที่
                สามารถช่วยให้คุณประสบความสำเร็จ
            </span>
            <div class="morebtn">
                <a href="{{route('contact-us.index')}}">Join Us</a>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
      const apiUrl = "https://edmcompany.co.th/api/vtuber-gallery";
      const newsApiUrl = "https://edmcompany.co.th/api/news-pin";
      const campaignApiUrl = "https://edmcompany.co.th/api/campaigns";
      const videoApiUrl = "https://edmcompany.co.th/api/influencer-video";
      const ApiUrl = "https://edmcompany.co.th/api/influencers-pin";
      const baseUrl = window.location.origin;

      async function fetchImages() {
        try {
          const response = await fetch(apiUrl);
          const data = await response.json();

          const vtuberSlider = document.getElementById("vtuber-slider");

          data.data.forEach((imageUrl) => {
            const vtuberItem = document.createElement("div");
            vtuberItem.classList.add("vtuber-item");

            const img = document.createElement("img");
            img.src = imageUrl.image;
            img.alt = "";

            vtuberItem.appendChild(img);
            vtuberSlider.appendChild(vtuberItem);
          });

          // Initialize the Slick slider
          $(vtuberSlider).slick({
            infinite: true,
            centerMode: true,
            infinite: true,
            centerPadding: "0",
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
            responsive: [
              {
                breakpoint: 1400,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  centerPadding: 0,
                },
              },
            ],
          });
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
            actCard.classList.add("act-card");

            const dateSpan = document.createElement("span");
            dateSpan.textContent = newsItem.created_at;

            const img = document.createElement("img");
            img.src = newsItem.image;
            img.alt = "";

            const divContent = document.createElement("div");
            const typeSpan = document.createElement("span");
            typeSpan.textContent = newsItem.type;

            const authorSpan = document.createElement("span");
            authorSpan.textContent = `By ${newsItem.signature}`;

            const descriptionSpan = document.createElement("span");
            descriptionSpan.textContent = newsItem.title;

            const readMoreLink = document.createElement("a");
            readMoreLink.href =
            baseUrl+"/news-activity/"+newsItem.id+"?view=" + newsItem.id;
            readMoreLink.textContent = "READ MORE";

            // divContent.appendChild(typeSpan);
            // divContent.appendChild(authorSpan);
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

      async function fetchCampaigns() {
        try {
          const response = await fetch(campaignApiUrl);
          const campaignData = await response.json();
          console.log(campaignData.data);
          const campaignCards = document.getElementById("campaign-cards");

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
            authorSpan.textContent = `By ${campaignItem.signature}`;

            const descriptionSpan = document.createElement("span");
            descriptionSpan.textContent = campaignItem.title;

            const readMoreLink = document.createElement("a");
            readMoreLink.href =
              "campaign-detail.html?view=" + campaignItem.id;
            readMoreLink.textContent = "READ MORE";

            divContent.appendChild(typeSpan);
            divContent.appendChild(authorSpan);
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

      async function fetchVideos() {
        try {
          const response = await fetch(videoApiUrl);
          const videoData = await response.json();

          const vdoContainer = document.getElementById("vdo-container");

          videoData.data.forEach((videoItem) => {
            const vdoCard = document.createElement("div");
            vdoCard.classList.add("vdo-card");

            const dateSpan = document.createElement("span");
            dateSpan.textContent = videoItem.date;

            const vdoCardBody = document.createElement("div");
            vdoCardBody.classList.add("vdo-card-body");

            const videoEmbed = document.createElement("iframe");
            videoEmbed.src = videoItem.url;
            videoEmbed.frameborder = "0";
            videoEmbed.allowfullscreen = "true";
            videoEmbed.classList.add("video-iframe"); // Add a class for styling

            const divContent = document.createElement("div");
            const typeSpan = document.createElement("span");
            typeSpan.textContent = videoItem.type;

            const titleSpan = document.createElement("span");
            titleSpan.textContent = videoItem.title;

            divContent.appendChild(typeSpan);
            divContent.appendChild(titleSpan);

            vdoCardBody.appendChild(videoEmbed);
            vdoCardBody.appendChild(divContent);

            vdoCard.appendChild(dateSpan);
            vdoCard.appendChild(vdoCardBody);

            vdoContainer.appendChild(vdoCard);
          });
        } catch (error) {
          console.error("Error fetching videos:", error);
        }
      }

      async function fetchInfluencers() {
        try {
          const response = await fetch(ApiUrl);
          const influencersData = await response.json();

          const influencerResult =
            document.getElementById("influencerResult");
          var result = "";
          influencersData.data.forEach((item) => {
            result += `<div class="creator-card">
          <img src="${item.image}" alt="" />
          <div class="creator-links">
            <a href="${
              item.facebook_url != null ? item.facebook_url : "#"
            }" ${
              item.facebook_url != null ? 'class="d-block"' : 'class="d-none"'
            } >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g id="Brands / Facebook">
                  <path
                    id="Vector"
                    d="M18.83 9.44C18.7383 9.30429 18.6146 9.19319 18.4699 9.11647C18.3252 9.03975 18.1638 8.99975 18 9H15V7H17.2C17.4652 7 17.7196 6.89464 17.9071 6.70711C18.0946 6.51957 18.2 6.26522 18.2 6V2C18.2 1.73478 18.0946 1.48043 17.9071 1.29289C17.7196 1.10536 17.4652 1 17.2 1H14C12.4617 1 10.9865 1.61107 9.89878 2.69878C8.81107 3.78649 8.2 5.26174 8.2 6.8V9H6C5.73478 9 5.48043 9.10536 5.29289 9.29289C5.10536 9.48043 5 9.73478 5 10V14C5 14.2652 5.10536 14.5196 5.29289 14.7071C5.48043 14.8946 5.73478 15 6 15H8.2V22C8.2 22.2652 8.30536 22.5196 8.49289 22.7071C8.68043 22.8946 8.93478 23 9.2 23H14C14.2652 23 14.5196 22.8946 14.7071 22.7071C14.8946 22.5196 15 22.2652 15 22V15H16.4C16.6003 15.0002 16.796 14.9402 16.9618 14.8279C17.1276 14.7156 17.2559 14.5561 17.33 14.37L18.93 10.37C18.9904 10.2186 19.0129 10.0547 18.9954 9.89259C18.978 9.7305 18.9212 9.57512 18.83 9.44ZM15.72 13H14C13.7348 13 13.4804 13.1054 13.2929 13.2929C13.1054 13.4804 13 13.7348 13 14V21H10.2V14C10.2 13.7348 10.0946 13.4804 9.90711 13.2929C9.71957 13.1054 9.46522 13 9.2 13H7V11H9.2C9.46522 11 9.71957 10.8946 9.90711 10.7071C10.0946 10.5196 10.2 10.2652 10.2 10V6.8C10.2026 5.79299 10.6038 4.82798 11.3159 4.11591C12.028 3.40384 12.993 3.00264 14 3H16.2V5H15.4C15.0614 4.95067 14.7163 4.97137 14.3861 5.06082C14.0558 5.15026 13.7474 5.30655 13.48 5.52C13.3177 5.6899 13.1915 5.8909 13.109 6.11089C13.0265 6.33087 12.9894 6.56529 13 6.8V10C13 10.2652 13.1054 10.5196 13.2929 10.7071C13.4804 10.8946 13.7348 11 14 11H16.52L15.72 13Z"
                    fill="#ffff"
                  />
                </g>
              </svg>
            </a>
            <a href="${item.twiter_url != null ? item.twiter_url : "#"}" ${
              item.twiter_url != null ? 'class="d-block"' : 'class="d-none"'
            }>
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M22.9912 3.95021C22.9913 3.77357 22.9446 3.60007 22.8558 3.44735C22.7671 3.29464 22.6394 3.16817 22.4859 3.08084C22.3324 2.9935 22.1584 2.94842 21.9818 2.95017C21.8052 2.95193 21.6322 3.00046 21.4804 3.09083C20.8951 3.43921 20.265 3.70601 19.6074 3.88383C18.6684 3.07806 17.4708 2.63713 16.2334 2.64164C14.876 2.6432 13.5723 3.17223 12.5976 4.11702C11.623 5.06181 11.0536 6.3484 11.0098 7.70512C8.33378 7.27838 5.90843 5.88164 4.19625 3.78126C4.09308 3.65609 3.96133 3.55757 3.81211 3.494C3.66288 3.43043 3.50056 3.40368 3.33883 3.41601C3.17719 3.42932 3.02122 3.4818 2.88442 3.56892C2.74762 3.65603 2.63409 3.77516 2.55367 3.91601C2.1412 4.63582 1.9043 5.44276 1.86222 6.27131C1.82014 7.09986 1.97406 7.92666 2.31148 8.68456L2.30953 8.68651C2.15788 8.77991 2.03272 8.91066 1.94603 9.06625C1.85935 9.22185 1.81403 9.39708 1.81441 9.57519C1.81257 9.72211 1.82139 9.86898 1.84078 10.0146C1.94292 11.2729 2.50056 12.4507 3.40914 13.3271C3.3475 13.4446 3.30988 13.5731 3.29848 13.7052C3.28708 13.8373 3.30212 13.9704 3.34273 14.0967C3.73884 15.3308 4.58123 16.3727 5.70504 17.0185C4.56328 17.46 3.33046 17.614 2.11519 17.4668C1.89026 17.4386 1.66242 17.4876 1.46904 17.6059C1.27566 17.7242 1.12822 17.9047 1.0509 18.1178C0.973592 18.3309 0.970999 18.5639 1.04355 18.7787C1.1161 18.9935 1.25949 19.1772 1.45019 19.2998C3.54028 20.646 5.97387 21.3617 8.45996 21.3613C11.2792 21.393 14.0299 20.4921 16.2842 18.7988C18.5385 17.1054 20.1699 14.7145 20.9248 11.998C21.2778 10.8146 21.4581 9.58648 21.46 8.35157C21.46 8.28614 21.46 8.21876 21.459 8.15138C21.9811 7.58831 22.3855 6.92668 22.6486 6.20527C22.9117 5.48387 23.0282 4.7172 22.9912 3.95021ZM19.6845 7.16212C19.5194 7.35746 19.4358 7.60891 19.4511 7.86427C19.4609 8.02927 19.4599 8.19527 19.4599 8.35157C19.4579 9.39511 19.3049 10.4329 19.0058 11.4326C18.3893 13.744 17.015 15.7817 15.1029 17.2192C13.1908 18.6568 10.8516 19.4111 8.45996 19.3613C7.60084 19.3616 6.74468 19.2606 5.90918 19.0606C6.97459 18.7172 7.97077 18.1879 8.85156 17.4971C9.01378 17.3693 9.13251 17.1945 9.19145 16.9967C9.25038 16.7988 9.24664 16.5875 9.18073 16.3918C9.11483 16.1961 8.98999 16.0257 8.82334 15.9038C8.65669 15.7819 8.4564 15.7145 8.24996 15.7109C7.41879 15.698 6.62509 15.363 6.03609 14.7764C6.18551 14.7481 6.33395 14.7129 6.48141 14.6709C6.69742 14.6094 6.88645 14.477 7.01807 14.295C7.14969 14.1131 7.21623 13.8921 7.20698 13.6677C7.19773 13.4433 7.11324 13.2285 6.96709 13.058C6.82095 12.8874 6.62167 12.7711 6.40133 12.7275C5.91887 12.6323 5.46487 12.427 5.07464 12.1277C4.68441 11.8284 4.36845 11.4432 4.15133 11.002C4.33206 11.0266 4.51394 11.0419 4.69625 11.0479C4.91283 11.0511 5.12484 10.9854 5.30162 10.8603C5.47841 10.7351 5.6108 10.5569 5.67965 10.3516C5.74563 10.1443 5.74223 9.92123 5.66998 9.7161C5.59772 9.51096 5.46055 9.33499 5.27926 9.21485C4.83941 8.92182 4.4791 8.52427 4.23061 8.0578C3.98213 7.59134 3.85322 7.07052 3.85543 6.54201C3.85543 6.47561 3.85738 6.4092 3.86129 6.34377C6.10255 8.43402 9.00961 9.66621 12.0703 9.82326C12.2248 9.82934 12.3786 9.80024 12.5202 9.73816C12.6618 9.67607 12.7875 9.58262 12.8877 9.46486C12.9869 9.34596 13.0571 9.20566 13.0928 9.05501C13.1286 8.90437 13.1289 8.74748 13.0937 8.5967C13.0365 8.35806 13.0073 8.11357 13.0068 7.86818C13.0077 7.01271 13.3479 6.19254 13.9528 5.58764C14.5577 4.98274 15.3779 4.64251 16.2334 4.64161C16.6735 4.64043 17.1091 4.7305 17.5127 4.90615C17.9162 5.0818 18.279 5.3392 18.5781 5.66212C18.6934 5.7862 18.8386 5.87871 18.9998 5.93085C19.161 5.98299 19.3328 5.99303 19.499 5.96001C19.9097 5.88006 20.3146 5.7724 20.7109 5.63775C20.4406 6.19072 20.0952 6.70369 19.6845 7.16212Z"
                  fill="white"
                />
              </svg>
            </a>
            <a href="${item.youtube_url != null ? item.youtube_url : "#"}" ${
              item.youtube_url != null ? 'class="d-block"' : 'class="d-none"'
            }>
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M15.4 11.16L10.5 8.00005C10.348 7.91228 10.1755 7.86608 10 7.86608C9.82446 7.86608 9.65202 7.91228 9.5 8.00005C9.35174 8.08557 9.22791 8.20771 9.14036 8.35479C9.05282 8.50187 9.00449 8.66895 9 8.84005V15.16C9.0013 15.3382 9.05019 15.5129 9.14161 15.6658C9.23303 15.8188 9.36367 15.9445 9.52 16.0301C9.66543 16.1157 9.83123 16.1606 10 16.16C10.1771 16.1479 10.3487 16.093 10.5 16L15.4 12.84C15.5403 12.7494 15.6557 12.625 15.7356 12.4783C15.8155 12.3315 15.8574 12.1671 15.8574 12C15.8574 11.833 15.8155 11.6686 15.7356 11.5218C15.6557 11.3751 15.5403 11.2507 15.4 11.16ZM11 13.32V10.68L13 12L11 13.32ZM19.38 4.51005L17.83 4.31005C13.991 3.84001 10.109 3.84001 6.27 4.31005L4.72 4.51005C3.97471 4.59116 3.2854 4.94392 2.78368 5.50098C2.28195 6.05803 2.00297 6.78036 2 7.53005V16.47C2.00636 17.2086 2.28051 17.9198 2.77155 18.4715C3.26259 19.0233 3.93715 19.3781 4.67 19.47L6.22 19.66C8.13776 19.8931 10.0681 20.0066 12 20C13.9323 20 15.8627 19.8798 17.78 19.64L19.33 19.4501C20.0628 19.3581 20.7374 19.0033 21.2285 18.4515C21.7195 17.8998 21.9936 17.1886 22 16.4501V7.53005C21.9985 6.78803 21.7265 6.072 21.235 5.51609C20.7435 4.96017 20.0662 4.6025 19.33 4.51005H19.38ZM20.05 16.51C20.0508 16.762 19.9565 17.0049 19.7859 17.1903C19.6154 17.3757 19.3811 17.4899 19.13 17.51L17.58 17.7001C13.9077 18.1601 10.1923 18.1601 6.52 17.7001L4.97 17.51C4.71889 17.4899 4.48463 17.3757 4.31406 17.1903C4.1435 17.0049 4.04919 16.762 4.05 16.51V7.53005C4.06192 7.282 4.16055 7.04601 4.32869 6.86325C4.49683 6.68049 4.7238 6.56256 4.97 6.53005L6.47 6.30005C10.1427 5.8467 13.8573 5.8467 17.53 6.30005L19.08 6.49005C19.3262 6.52256 19.5532 6.64049 19.7213 6.82325C19.8894 7.00601 19.9881 7.242 20 7.49005L20.05 16.51Z"
                  fill="white"
                />
              </svg>
            </a>
            <a href="${
              item.instagram_url !== "" ? item.instagram_url : "#"
            }" ${
              item.instagram_url != null
                ? 'class="d-block"'
                : 'class="d-none"'
            }>
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g id="Brands / Instagram">
                  <path
                    id="Vector"
                    d="M17.34 5.46C17.1027 5.46 16.8707 5.53038 16.6733 5.66224C16.476 5.79409 16.3222 5.98151 16.2313 6.20078C16.1405 6.42005 16.1168 6.66133 16.1631 6.89411C16.2094 7.12689 16.3236 7.34071 16.4915 7.50853C16.6593 7.67635 16.8731 7.79064 17.1059 7.83694C17.3387 7.88324 17.5799 7.85948 17.7992 7.76866C18.0185 7.67783 18.2059 7.52402 18.3378 7.32668C18.4696 7.12935 18.54 6.89734 18.54 6.66C18.54 6.34174 18.4136 6.03652 18.1885 5.81147C17.9635 5.58643 17.6583 5.46 17.34 5.46ZM21.94 7.88C21.9206 7.0503 21.7652 6.2294 21.48 5.45C21.2257 4.78313 20.83 4.17928 20.32 3.68C19.8248 3.16743 19.2196 2.77418 18.55 2.53C17.7727 2.23616 16.9508 2.07721 16.12 2.06C15.06 2 14.72 2 12 2C9.28 2 8.94 2 7.88 2.06C7.04915 2.07721 6.22734 2.23616 5.45 2.53C4.78168 2.77665 4.17693 3.16956 3.68 3.68C3.16743 4.17518 2.77418 4.78044 2.53 5.45C2.23616 6.22734 2.07721 7.04915 2.06 7.88C2 8.94 2 9.28 2 12C2 14.72 2 15.06 2.06 16.12C2.07721 16.9508 2.23616 17.7727 2.53 18.55C2.77418 19.2196 3.16743 19.8248 3.68 20.32C4.17693 20.8304 4.78168 21.2234 5.45 21.47C6.22734 21.7638 7.04915 21.9228 7.88 21.94C8.94 22 9.28 22 12 22C14.72 22 15.06 22 16.12 21.94C16.9508 21.9228 17.7727 21.7638 18.55 21.47C19.2196 21.2258 19.8248 20.8326 20.32 20.32C20.8322 19.8226 21.2283 19.2182 21.48 18.55C21.7652 17.7706 21.9206 16.9497 21.94 16.12C21.94 15.06 22 14.72 22 12C22 9.28 22 8.94 21.94 7.88ZM20.14 16C20.1327 16.6348 20.0178 17.2637 19.8 17.86C19.6403 18.2952 19.3839 18.6884 19.05 19.01C18.7256 19.3405 18.3332 19.5964 17.9 19.76C17.3037 19.9778 16.6748 20.0927 16.04 20.1C15.04 20.15 14.67 20.16 12.04 20.16C9.41 20.16 9.04 20.16 8.04 20.1C7.38089 20.1123 6.72459 20.0109 6.1 19.8C5.68578 19.6281 5.31136 19.3728 5 19.05C4.66809 18.7287 4.41484 18.3352 4.26 17.9C4.01586 17.2952 3.88044 16.6519 3.86 16C3.86 15 3.8 14.63 3.8 12C3.8 9.37 3.8 9 3.86 8C3.86448 7.35106 3.98295 6.70795 4.21 6.1C4.38605 5.67791 4.65627 5.30166 5 5C5.30381 4.65617 5.67929 4.3831 6.1 4.2C6.70955 3.98004 7.352 3.86508 8 3.86C9 3.86 9.37 3.8 12 3.8C14.63 3.8 15 3.8 16 3.86C16.6348 3.86728 17.2637 3.98225 17.86 4.2C18.3144 4.36865 18.7223 4.64285 19.05 5C19.3777 5.30718 19.6338 5.68273 19.8 6.1C20.0223 6.70893 20.1373 7.35178 20.14 8C20.19 9 20.2 9.37 20.2 12C20.2 14.63 20.19 15 20.14 16ZM12 6.87C10.9858 6.87198 9.99496 7.17453 9.15265 7.73942C8.31035 8.30431 7.65438 9.1062 7.26763 10.0438C6.88089 10.9813 6.78072 12.0125 6.97979 13.0069C7.17886 14.0014 7.66824 14.9145 8.38608 15.631C9.10392 16.3474 10.018 16.835 11.0129 17.0321C12.0077 17.2293 13.0387 17.1271 13.9755 16.7385C14.9123 16.35 15.7129 15.6924 16.2761 14.849C16.8394 14.0056 17.14 13.0142 17.14 12C17.1413 11.3251 17.0092 10.6566 16.7512 10.033C16.4933 9.40931 16.1146 8.84281 15.6369 8.36605C15.1592 7.88929 14.5919 7.51168 13.9678 7.25493C13.3436 6.99818 12.6749 6.86736 12 6.87ZM12 15.33C11.3414 15.33 10.6976 15.1347 10.15 14.7688C9.60234 14.4029 9.17552 13.8828 8.92348 13.2743C8.67144 12.6659 8.6055 11.9963 8.73398 11.3503C8.86247 10.7044 9.17963 10.111 9.64533 9.64533C10.111 9.17963 10.7044 8.86247 11.3503 8.73398C11.9963 8.6055 12.6659 8.67144 13.2743 8.92348C13.8828 9.17552 14.4029 9.60234 14.7688 10.15C15.1347 10.6976 15.33 11.3414 15.33 12C15.33 12.4373 15.2439 12.8703 15.0765 13.2743C14.9092 13.6784 14.6639 14.0454 14.3547 14.3547C14.0454 14.6639 13.6784 14.9092 13.2743 15.0765C12.8703 15.2439 12.4373 15.33 12 15.33Z"
                    fill="#ffff"
                  />
                </g>
              </svg>
            </a>
          </div>
          <div class="creator-card-des">
            <img src="${item.icon}" alt="" />
            <div>
              <span>${item.name}</span>
              <span
                ><img
                  src="assets/img/creator-sub-icon.png"
                  alt=""
                />${item.youtube_subscribe}</span
              >
            </div>
          </div>
        </div>`;
          });

          influencerResult.innerHTML = result;
        } catch (error) {
          console.error("Error fetching campaigns:", error);
        }
      }

      fetchInfluencers();
      fetchVideos();
      fetchNews();
      fetchCampaigns();
      fetchImages();
    });
  </script>
@endsection
