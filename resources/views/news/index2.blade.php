@extends('layout')

@section('title', 'News And Activity')

@section('content')
<div class="main">
  <nav>
    <!-- Nav Hamberger menu -->
    <div class="nav-menu">
      <img src="assets/img/menu.svg" alt="" />
    </div>

    <div class="nav-btns">
      <a href="main.html"><img src="assets/img/edm-company-logo.png" alt="" /></a>
      <div class="nav-btns-wrapper">

        <div class="nav-dropdown" data-dropdown>
          <button class="nav-dropdown-btn" data-dropdown-button>
            FOR BRAND
            <img src="assets/img/expand.svg" alt="" />
          </button>
          <div class="nav-dropdown-menu">
            <a href="branding.html">Service</a>
            <a href="our-campaign.html">Campaign</a>
          </div>
        </div>
        <a href="news-activity.html">NEWS</a>
        <a href="contact-us.html">CONTACT US</a>
        <div class="nav-dropdown" data-dropdown>
          <button class="nav-dropdown-btn" data-dropdown-button>
            <img src="assets/img/thai-lang-icon.png" alt="" /> TH
            <img src="assets/img/expand.svg" alt="" />
          </button>
           <div class="nav-dropdown-menu">
            <a href="#"><img src="assets/img/thai-lang-icon.png" id="thaiBtn2" alt="" /> TH</a>
            <a href="#"><img src="assets/img/UK.png" id="engBtn2" alt="" /> ENG</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <section class="header-sec">
    <div class="animation-wrapper">
      <div id="stars-group-1"></div>
      <div id="stars-group-2"></div>
      <div id="stars-group-3"></div>
      <div id="stars-group-4"></div>
      <div id="stars-group-5"></div>
      <div id="stars-group-6"></div>
    </div>
    {{-- <div class="gadget-menu">
      <a href=""
        ><img src="assets/img/gadget-icons/fb-icon.svg" alt=""
      /></a>
      <a href=""
        ><img src="assets/img/gadget-icons/yt-icon.svg" alt=""
      /></a>
      <a href=""
        ><img src="assets/img/gadget-icons/gadget-edm-icon.svg" alt=""
      /></a> --}}

    </div>
    <div class="title">
      <div class="sub-text">
        <h1>News And Activity</h1>
        <div class="sub-breadcrumb">
          <a href="index.html">Home</a>
          <a href="#">News And Activity</a>
        </div>
      </div>
      <div class="sub-search">
        <form action="">
          <input type="search" placeholder="SEARCH" />
          <button type="submit">
            <img src="assets/img/icon_search.svg" alt="" />
          </button>
        </form>
      </div>
    </div>
  </section>

  <section class="campaign" style="text-align: left;">
    <div class="campaign-header">
      <span id="resultDate">loading ..</span>
      <div class="campaign-thumbnail">
        <img id="resultImages" src="assets/img/article-thumb.jpg" alt="" />
      </div>
      <div class="campaign-h-des">
        <div>

          <h2  id="resultTitle2">Loading ...</h2>
          <p id="resultDetail">
            Loading ...
          </p>
        </div>
        <div class="morebtn">
          <a href="" id="resultLink">READ MORE</a>
        </div>
      </div>
    </div>
  </section>

  <div class="campaign-cards" id="activity-cards">
  </div>

  <footer>
    <div class="footer-top">
      <div class="footer-logos">
        <img src="assets/img/edm-company-logo.png" alt="" />
      </div>

      <form action="">
        <input type="search" placeholder="CATEGORIES" />
        <button type="submit">
          <img src="assets/img/icon_search.svg" alt="" />
        </button>
      </form>
    </div>
    <div class="footer-bot">
      <span
        >COPYRIGHT <span>&copy;</span> 2023 EDM HOLDING ALL RIGHTS RESERVED.</span
      >
       <a href="#" class="text-white">Terms of use I Privacy Policy I Contact us</a>
    </div>
  </footer>
</div>
@endsection

@section('scripts')
<script>
    const newsApiUrl = 'https://edmcompany.co.th/api/news';
   async function fetchNews() {
     try {
 const response = await fetch(newsApiUrl);
 const newsData = await response.json();
 const activityCards = document.getElementById('activity-cards');

 newsData.data.forEach(newsItem => {
   const isTitleNull = currentLanguage == 'eng' ? newsItem.title_en == null : newsItem.title == null;
   if (!isTitleNull) {
     const actCard = document.createElement('div');
     actCard.classList.add('act-card');

     const dateSpan = document.createElement('span');
     dateSpan.textContent = newsItem.created_at;

     const img = document.createElement('img');
     img.src = newsItem.image;
     img.alt = '';

     const divContent = document.createElement('div');
     const typeSpan = document.createElement('span');
     typeSpan.textContent = newsItem.type;

     const authorSpan = document.createElement('span');
     authorSpan.textContent = `By ${newsItem.signature}`;

     // Display the appropriate title based on the selected language
     const titleSpan = document.createElement('span');
     if (currentLanguage == 'eng') {
       titleSpan.textContent = newsItem.title_en || newsItem.title;
     } else {
       titleSpan.textContent = newsItem.title;
     }

     const readMoreLink = document.createElement('a');
     readMoreLink.href = 'news-activity-detail.html?view=' + newsItem.id;
     readMoreLink.textContent = 'READ MORE';

     divContent.appendChild(typeSpan);
     divContent.appendChild(authorSpan);
     divContent.appendChild(titleSpan);
     divContent.appendChild(readMoreLink);

     actCard.appendChild(dateSpan);
     actCard.appendChild(img);
     actCard.appendChild(divContent);

     activityCards.appendChild(actCard);
   }
 });
} catch (error) {
 console.error('Error fetching news:', error);
}
 }
 fetchNews()

 fetch("https://edmcompany.co.th/api/news-limit/1")
     .then(function (response) {
       return response.json();
     })
     .then(function (data) {
       document.getElementById("resultDate").innerHTML = data.data[0].created_at;

        const spanDescription = document.getElementById("resultTitle2");


        if (currentLanguage == 'eng') {
           spanDescription.innerHTML = data.data[0].title_en ||  data.data[0].title;
         } else {
           spanDescription.innerHTML =  data.data[0].title;
         }

       document.getElementById("resultImages").src = data.data[0].image;
       document.getElementById("resultDetail").innerHTML = data.data[0].short_detail;
       document.getElementById("resultLink").href = "news-activity/"+data.data[0].id + "?view=" + data.data[0].id;


     })
     .catch(function (e) {
       console.log(e);
     });
 </script>
@endsection
