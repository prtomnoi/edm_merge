@extends('layout')

@section('title', 'Campaign')

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
    </style>
    <link rel="stylesheet"
        href="{{ asset('assets/css/subpage-base-style.css?v=' . filemtime(public_path('assets/css/subpage-base-style.css'))) }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/css/article-style.css?v=' . filemtime(public_path('assets/css/article-style.css'))) }}" />
    <div class="main">
        <section class="header-sec">
            {{ view('animation-wrapper') }}
            {{-- {{ view('gadget-menu') }} --}}
            {{-- <div class="animation-wrapper">
              <div id="stars-group-1"></div>
              <div id="stars-group-2"></div>
              <div id="stars-group-3"></div>
              <div id="stars-group-4"></div>
              <div id="stars-group-5"></div>
              <div id="stars-group-6"></div>
            </div>
            <div class="gadget-menu">
              <a href=""
                ><img src="assets/img/gadget-icons/fb-icon.svg" alt=""
              /></a>
              <a href=""
                ><img src="assets/img/gadget-icons/yt-icon.svg" alt=""
              /></a>
              <a href=""
                ><img src="assets/img/gadget-icons/gadget-edm-icon.svg" alt=""
              /></a>
              <a href=""
                ><img src="assets/img/gadget-icons/joinus-icon.svg" alt=""
              /></a>
            </div> --}}
            <div class="title">
                <div class="sub-text">
                    <h1>Our Campaign</h1>
                    <div class="sub-breadcrumb">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="#">Our Campaign</a>
                    </div>
                </div>
                <div class="sub-search">
                    <div class="form-div">
                        <input class="inputSearch"  type="search" placeholder="SEARCH" name="search" id="search" class="" />
                        <button type="submit" class="buttonSearch" onclick="searchInputPortfolios()">
                            <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                        </button>
                    <div>
                </div>
            </div>
        </section>

        {{-- <section class="campaign" style="text-align: left;">
            <div class="campaign-header">
                <span id="resultDate">loading ..</span>
                <div class="campaign-thumbnail">
                    <img id="resultImages" src="{{ asset('assets/img/article-thumb.jpg') }}" alt="" />
                </div>
                <div class="campaign-h-des">
                    <div>

                        <h2 id="resultTitle2">Loading ...</h2>
                        <p id="resultDetail">
                            Loading ...
                        </p>
                    </div>
                    <div class="morebtn">
                        <a href="" id="resultLink">READ MORE</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <div class="campaign-cards" id="campaign-cards">
        </div>
        <div class="d-flex align-content-center align-items-lg-center w-100" id="demo">
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">
    <script src="{{asset('assets/js/pagination.js')}}"></script>
    <script>
        const queryString = window.location.search;
        const params = new URLSearchParams(queryString);
        const paramsSearch = params.get('search');
        const newsApiUrlFetch = 'https://edmcompany.co.th/api/portfolios';
        function template(data) {
            var html = '';
            data.forEach(element => {
                html += '<div class="act-card company">';
                html += '<a href="'+element.link+'" target="_blank">';
                html += '<img src="' + element.image + '" alt="">';
                html += '</a>';
                html += '<div>';
                html += '<span class="description">' + element.title + '</span>';
                html += '<a href="'+element.link+'" target="_blank">READ MORE</a>';
                html += '</div>';
                html += '</div>';
            });
            return html;
        }
        async function fetchPortfolios() {
            try {
                const response = await fetch(newsApiUrlFetch);
                const newsData = await response.json();
                const activityCards = document.getElementById('campaign-cards');
                $('#demo').pagination({
                    dataSource: newsData.data,
                    pageSize: 6,
                    showPrevious: true,
                    showNext: true,
                    callback: function(data, pagination) {
                        // template method of yourself
                        var html = template(data)
                        activityCards.innerHTML = html;
                    }
                });
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }
        function searchInputPortfolios() {
            const search = document.getElementById('search').value;
            const paramSearch = encodeURIComponent(paramsSearch);
            const newsApiUrl = 'https://edmcompany.co.th/api/portfolios?search=' + search || paramSearch || '';
            async function fetchPortfoliosSearch() {
                try {
                    const response = await fetch(newsApiUrl);
                    const newsData = await response.json();
                    const activityCards = document.getElementById('campaign-cards');
                    const demo = document.getElementById('demo');
                    demo.innerHTML = '';
                    activityCards.innerHTML = '';
                    $('#demo').pagination({
                        dataSource: newsData.data,
                        pageSize: 6,
                        showPrevious: true,
                        showNext: true,
                        callback: function(data, pagination) {
                            // template method of yourself
                            var html = template(data);
                            activityCards.innerHTML = html;
                        }
                    });
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
            fetchPortfoliosSearch()
        }
        if (paramsSearch) {
            searchInputPortfolios()
        } else {
            fetchPortfolios()
        }
        // document.addEventListener('DOMContentLoaded', () => {
        //     const queryString = window.location.search;
        //     const params = new URLSearchParams(queryString);
        //     const paramsSearch = params.get('search');
        //     const campaignApiUrl = 'https://edmcompany.co.th/api/campaigns';

            // function template(data) {
            //     var html = '';
            //     data.forEach(element => {
            //         console.log((element.created_at ? element.created_at : ''));
            //         html += '<div class="act-card">';
            //         html += '<span>' + (element.created_at ? element.created_at : '') + '</span>';
            //         html += '<a href="our-campaign/' + element.id + '?view=' + element.id + '">';
            //         html += '<img src="' + element.image + '" alt="">';
            //         html += '</a>';
            //         html += '<div>';
            //         html += '<span>' + element.title + '</span>'
            //         // if(element.signature)
            //         // {
            //         //     html += '<span>'+ element.signature  +'</span>';
            //         // } else
            //         // {
            //         //     html += '<span> </span>';
            //         // }
            //         html += '<span> </span>';
            //         html += '<span>' + element.title + '</span>';
            //         html += '<a href="our-campaign/' + element.id + '?view=' + element.id +
            //             '">READ MORE</a>';
            //         html += '</div>';
            //         html += '</div>';
            //     });

            //     return html;
            // }

            // async function fetchCampaigns() {
            //     try {
            //         const response = await fetch(campaignApiUrl);
            //         const campaignData = await response.json();
            //         console.log(campaignData.data);
            //         const campaignCards = document.getElementById('campaign-cards');
            //         $('#demo').pagination({
            //             dataSource: campaignData.data,
            //             pageSize: 3,
            //             showPrevious: true,
            //             showNext: true,
            //             callback: function(data, pagination) {
            //                 // template method of yourself
            //                 var html = template(data)
            //                 campaignCards.innerHTML = html;
            //             }
            //         });
            //         // campaignData.data.forEach(campaignItem => {
            //         //     const actCard = document.createElement('div');
            //         //     actCard.classList.add('act-card');

            //         //     const spanDate = document.createElement('span');
            //         //     spanDate.textContent = campaignItem.created_at;

            //         //     const img = document.createElement('img');
            //         //     img.src = campaignItem.image;
            //         //     img.alt = '';

            //         //     const divContent = document.createElement('div');

            //         //     const spanTitle = document.createElement('span');
            //         //     spanTitle.textContent = campaignItem.title;

            //         //     const spanAuthor = document.createElement('span');
            //         //     spanAuthor.textContent = `By ${campaignItem.signature}`;

            //         //     const spanDescription = document.createElement('span');
            //         //     spanDescription.textContent = campaignItem.title;

            //         //     const aReadMore = document.createElement('a');
            //         //     aReadMore.href = 'campaign-detail.html?view=' + campaignItem.id;
            //         //     aReadMore.textContent = 'READ MORE';

            //         //     divContent.appendChild(spanTitle);
            //         //     divContent.appendChild(spanAuthor);
            //         //     divContent.appendChild(spanDescription);
            //         //     divContent.appendChild(aReadMore);

            //         //     actCard.appendChild(spanDate);
            //         //     actCard.appendChild(img);
            //         //     actCard.appendChild(divContent);

            //         //     campaignCards.appendChild(actCard);
            //         // });
            //     } catch (error) {
            //         console.error('Error fetching campaigns:', error);
            //     }
            // }
            // fetchCampaigns();
            // const hash = window.location.hash; // Get the hash part of the URL

            // Check if hash includes #contactSection
            // if (hash.includes('#contactSection')) {
            //     const targetSection = document.getElementById('contactSection'); // Get the element with the id "contactSection"
            //     if (targetSection) {
            //     targetSection.scrollIntoView({
            //         behavior: 'smooth' // Add smooth scrolling for better user experience
            //     });
            //     }
            // }
        // });

        // fetch("https://edmcompany.co.th/api/campaigns-limit/1")
        //     .then(function(response) {
        //         return response.json();
        //     })
        //     .then(function(data) {
        //         document.getElementById("resultDate").innerHTML = data.data[0].created_at;

        //         const spanDescription = document.getElementById("resultTitle2");


        //         if (currentLanguage == 'eng') {
        //             spanDescription.innerHTML = data.data[0].title_en || data.data[0].title;
        //         } else {
        //             spanDescription.innerHTML = data.data[0].title;
        //         }
        //         console.log(data.data[0].image);

        //         document.getElementById("resultImages").src = data.data[0].image;
        //         document.getElementById("resultDetail").innerHTML = data.data[0].short_detail;
        //         document.getElementById("resultLink").href = "campaign-detail.html?view=" + data.data[0].id;


        //     })
        //     .catch(function(e) {
        //         console.log(e);
        //     });
    </script>
@endsection
