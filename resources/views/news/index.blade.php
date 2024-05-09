@extends('layout2')
@section('title', 'News And Activity')

@section('content')
    <style>
        .inputSearch {
            padding: 0.5rem 1rem;
            background: #0e0e0e;
            border: 2px solid #343434;
            border-radius: 0.3rem 0 0 0.3rem;
            color: white;
        }

        .buttonSearch {
            border: none;
            background: #343434;
            padding: 0.5rem;
            border-radius: 0 0.3rem 0.3rem 0;
        }

        .form-div {
            display: flex;
        }

        .paginationjs {
            margin: auto;
            padding-bottom: 20px;
        }
        .image-container {
          position: relative;
          width: 100%; /* Adjust width as needed */
          padding-top: 56.25%; /* 9/16 = 0.5625 */
          overflow: hidden;
      }

      .image-container img {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          object-fit: cover; 
      }
    </style>
    <section class="header-sec">

        <div class="title">
            <div class="sub-text">
                <h1>News And Activity</h1>
                <div class="sub-breadcrumb">
                    <a href="{{ route('news-activity.index') }}">Home</a>
                    <a href="">News And Activity</a>
                </div>
            </div>
            <div class="sub-search">
                {{-- <div class="form-div"> --}}
                <div class="form-div">
                    <input class="inputSearch"  type="search" placeholder="SEARCH" name="search" id="search" class="" />
                    <button type="submit" class="buttonSearch" onclick="searchInput()">
                        <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                    </button>
                <div>
                {{-- </div> --}}
            </div>
        </div>
    </section>

    <section class="campaign" style="text-align: left;">
        <div class="campaign-header">
            <span id="resultDate">loading ..</span>
            <div class="campaign-thumbnail">
              <div class="image-container">
                <img id="resultImages" src="{{ asset('assets/img/article-thumb.jpg') }}" alt="" />
              </div>
            </div>
            <div class="campaign-h-des">
                <div>

                    <h2 id="resultTitle2">Loading ...</h2>
                    <p id="resultDetail">
                        Loading ...
                    </p>
                </div>
                <div class="morebtn">
                    <a href="#" id="resultLink">READ MORE</a>
                </div>
            </div>
        </div>
    </section>

    <div class="campaign-cards" id="activity-cards">
    </div>
    <div class="d-flex align-content-center align-items-lg-center w-100" id="demo">
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">
    <script src="{{asset('assets/js/pagination.js')}}"></script>
    <script>
        const queryString = window.location.search;
        const params = new URLSearchParams(queryString);
        const paramsSearch = params.get('search');
        const newsApiUrl = 'https://edmcompany.co.th/api/news';

        function template(data) {
            var html = '';
            data.forEach(element => {
                html += '<div class="act-card company">';
                html += '<span>' + element.created_at + '</span>';
                html += '<a href="news-activity/' + element.id + '?view=' + element.id + '">';
                html += '<div class="image-container"><img src="' + element.image + '" alt=""></div>';
                html += '</a>';
                html += '<div>';
                // html += '<span>' + element.type + '</span>'
                    // if(element.signature)
                    // {
                    //     html += '<span>'+ element.signature  +'</span>';
                    // } else
                    // {
                    //     html += '<span> </span>';
                    // }
                html += '<span class="description">' + element.title + '</span>';
                html += '<a href="news-activity/' + element.id + '?view=' + element.id + '">READ MORE</a>';
                html += '</div>';
                html += '</div>';
            });

            return html;
        }
        async function fetchNews() {
            try {
                const response = await fetch(newsApiUrl);
                const newsData = await response.json();
                const activityCards = document.getElementById('activity-cards');
                $('#demo').pagination({
                    dataSource: newsData.data,
                    pageSize: 15,
                    showPrevious: true,
                    showNext: true,
                    callback: function(data, pagination) {
                        // template method of yourself
                        var html = template(data)
                        activityCards.innerHTML = html;
                    }
                });
                // newsData.data.forEach(newsItem => {
                //     const isTitleNull = currentLanguage == 'eng' ? newsItem.title_en == null : newsItem.title ==
                //         null;
                //     if (!isTitleNull) {
                //         const actCard = document.createElement('div');
                //         actCard.classList.add('act-card');

                //         const dateSpan = document.createElement('span');
                //         dateSpan.textContent = newsItem.created_at;

                //         const img = document.createElement('img');
                //         img.src = newsItem.image;
                //         img.alt = '';

                //         const divContent = document.createElement('div');
                //         const typeSpan = document.createElement('span');
                //         typeSpan.textContent = newsItem.type;

                //         const authorSpan = document.createElement('span');
                //         authorSpan.textContent = `By ${newsItem.signature}`;

                //         // Display the appropriate title based on the selected language
                //         const titleSpan = document.createElement('span');
                //         if (currentLanguage == 'eng') {
                //             titleSpan.textContent = newsItem.title_en || newsItem.title;
                //         } else {
                //             titleSpan.textContent = newsItem.title;
                //         }

                //         const readMoreLink = document.createElement('a');
                //         readMoreLink.href = 'news-activity/'+newsItem.id+'?view=' + newsItem.id;
                //         readMoreLink.textContent = 'READ MORE';

                //         divContent.appendChild(typeSpan);
                //         divContent.appendChild(authorSpan);
                //         divContent.appendChild(titleSpan);
                //         divContent.appendChild(readMoreLink);

                //         actCard.appendChild(dateSpan);
                //         actCard.appendChild(img);
                //         actCard.appendChild(divContent);

                //         activityCards.appendChild(actCard);
                //     }
                // });
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }
        if (paramsSearch) {
            searchInput()
        } else {
            fetchNews()
        }


        fetch("https://edmcompany.co.th/api/news-limit/1")
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                document.getElementById("resultDate").innerHTML = data.data[0].created_at;

                const spanDescription = document.getElementById("resultTitle2");


                if (currentLanguage == 'eng') {
                    spanDescription.innerHTML = data.data[0].title_en || data.data[0].title;
                } else {
                    spanDescription.innerHTML = data.data[0].title;
                }
                console.log(data.data[0].image);

                document.getElementById("resultImages").src = data.data[0].image;
                document.getElementById("resultDetail").innerHTML = data.data[0].short_detail;
                document.getElementById("resultLink").href = "/news-activity/" + data.data[0].id + "?view=" + data.data[
                    0].id;


            })
            .catch(function(e) {
                console.log(e);
            });

        function searchInput() {
            const search = document.getElementById('search').value;
            const paramSearch = encodeURIComponent(paramsSearch);
            const newsApiUrl = 'https://edmcompany.co.th/api/news?search=' + search || paramSearch || '';
            async function fetchNewsSearch() {
                try {
                    const response = await fetch(newsApiUrl);
                    const newsData = await response.json();
                    const activityCards = document.getElementById('activity-cards');
                    const demo = document.getElementById('demo');
                    demo.innerHTML = '';
                    activityCards.innerHTML = '';
                    $('#demo').pagination({
                        dataSource: newsData.data,
                        pageSize: 3,
                        showPrevious: true,
                        showNext: true,
                        callback: function(data, pagination) {
                            // template method of yourself
                            var html = template(data)
                            activityCards.innerHTML = html;
                        }
                    })
                    // newsData.data.forEach(newsItem => {
                    //     const isTitleNull = currentLanguage == 'eng' ? newsItem.title_en == null : newsItem
                    //         .title ==
                    //         null;
                    //     if (!isTitleNull) {
                    //         const actCard = document.createElement('div');
                    //         actCard.classList.add('act-card');

                    //         const dateSpan = document.createElement('span');
                    //         dateSpan.textContent = newsItem.created_at;

                    //         const img = document.createElement('img');
                    //         img.src = newsItem.image;
                    //         img.alt = '';

                    //         const divContent = document.createElement('div');
                    //         const typeSpan = document.createElement('span');
                    //         typeSpan.textContent = newsItem.type;

                    //         const authorSpan = document.createElement('span');
                    //         authorSpan.textContent = `By ${newsItem.signature}`;

                    //         // Display the appropriate title based on the selected language
                    //         const titleSpan = document.createElement('span');
                    //         if (currentLanguage == 'eng') {
                    //             titleSpan.textContent = newsItem.title_en || newsItem.title;
                    //         } else {
                    //             titleSpan.textContent = newsItem.title;
                    //         }

                    //         const readMoreLink = document.createElement('a');
                    //         readMoreLink.href = 'news-activity/' + newsItem.id + '?view=' + newsItem.id;
                    //         readMoreLink.textContent = 'READ MORE';

                    //         divContent.appendChild(typeSpan);
                    //         divContent.appendChild(authorSpan);
                    //         divContent.appendChild(titleSpan);
                    //         divContent.appendChild(readMoreLink);

                    //         actCard.appendChild(dateSpan);
                    //         actCard.appendChild(img);
                    //         actCard.appendChild(divContent);

                    //         activityCards.appendChild(actCard);
                    //     }
                    // });
                    // const paginations = document.getElementById('demo');

                } catch (error) {
                    console.error('Error fetching news:', error);
                }
            }
            fetchNewsSearch()
        }
    </script>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EDM - News And Activity</title>

    <link rel="stylesheet" href="assets/fonts/fonts.css?v=3" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/base-style.css?v=5" />
    <link rel="stylesheet" href="assets/css/navbar_style.css?v=3" />
    <link rel="stylesheet" href="assets/css/particle-anim.css?v=3" />
    <link rel="stylesheet" href="assets/css/subpage-base-style.css?v=3" />
    <link rel="stylesheet" href="assets/css/article-style.css?v=5" />
    <link rel="stylesheet" href="assets/css/index.css?v=3" />
  </head>
  <body>
    <div class="side-menu">
      <svg
        class="close-btn"
        id="close-sidenav-btn"
        xmlns="http://www.w3.org/2000/svg"
        height="48"
        width="48"
      >
        <path
          fill="#ffff"
          d="M12.45 38.7 9.3 35.55 20.85 24 9.3 12.5l3.15-3.2L24 20.8 35.55 9.3l3.15 3.2L27.2 24l11.5 11.55-3.15 3.15L24 27.2Z"
        />
      </svg>

      <div class="side-btn-section">
       <a href="index.html" class="side-btn" >
         <img src="assets/img/edm-company-logo.png" alt=""/>
        </a>

        <div class="side-collapse">
          <a
            href="#forBrand"
            class="side-btn"
            data-bs-toggle="collapse"
            role="button"
            aria-expanded="false"
            aria-controls="forBrand"
            >FOR BRAND</a
          >
          <div class="collapse" id="forBrand">
            <div class="card card-body">
              <a href="branding.html">Service</a>
              <a href="">Campaign</a>
            </div>
          </div>
        </div>
        <a href="news-activity.html" class="side-btn">NEWS</a>
        <a href="contact-us.html" class="side-btn">CONTACT US</a>
    <div class="lang-change-btns">
        <a href="#" class="active" id="thaiBtn"><img src="assets/img/THAILAND.png" alt="" /> TH</a>
        <a href="#" id="engBtn"><img src="assets/img/UK.png" alt="" /> ENG</a>
    </div>
      </div>
    </div>

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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/navbar.js?v=6"></script>
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
            console.log(data.data[0].image);

          document.getElementById("resultImages").src = data.data[0].image;
          document.getElementById("resultDetail").innerHTML = data.data[0].short_detail;
          document.getElementById("resultLink").href = "news-activity-detail.html?view="+data.data[0].id;


        })
        .catch(function (e) {
          console.log(e);
        });
    </script>
  </body>
</html> --}}
