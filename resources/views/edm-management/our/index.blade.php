@extends('edm-management.layout')

@section('title', 'Our Work')

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

        /*
                                    .pagination {
                                        display: inline-block;
                                        text-align: center;
                                    }

                                    .pagination a {
                                        color: white;
                                        float: left;
                                        padding: 8px 16px;
                                        text-decoration: none;
                                    }

                                    .pagination a.active {
                                        background-color: #4CAF50;
                                        color: white;
                                    }

                                    .pagination a:hover:not(.active) {
                                        background-color: #ddd;
                                    } */
    </style>
    <link rel="stylesheet" href="{{ asset('edm-management/assets/css/subpage-base-style.css?v=3') }}" />
    <div class="main">
        <section class="header-sec sidepage-h">
            <div class="animation-wrapper">
                <div id="stars-group-1"></div>
                <div id="stars-group-2"></div>
                <div id="stars-group-3"></div>
                <div id="stars-group-4"></div>
                <div id="stars-group-5"></div>
                <div id="stars-group-6"></div>
            </div>
            <div class="title">
                <div class="sub-text">
                    <h1>Our Work</h1>
                    <div class="sub-breadcrumb">
                        <a href="{{ url('/edm-management/index') }}">Home</a>
                        <a href="#">Our Work</a>
                    </div>
                </div>
                <div class="sub-search">
                    {{-- <form> --}}
                    <div class="form-div">
                        <input class="inputSearch" type="search" placeholder="SEARCH" id="searchInput"
                            value="{{ request()->search ?? '' }}" />
                        <button type="submit" class="buttonSearch" onclick="searchInput()">
                            <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                        </button>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </section>

        {{-- <section class="campaign" style="text-align: left;">
            <div class="campaign-header">
                <span id="resultDate">loading ..</span>
                <div class="campaign-thumbnail">
                    <img id="resultImages" src="assets/img/article-thumb.jpg" alt="" />
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

        <div class="campaign-cards" id="activity-cards">

        </div>
        <div class="d-flex align-content-center align-items-lg-center w-100" id="demo">
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">
    <script src="https://pagination.js.org/dist/2.6.0/pagination.js"></script>
    <script>
        const newsApiUrl = 'https://edmcompany.co.th/api/portfolio-items';
        const queryString = window.location.search;
        const params = new URLSearchParams(queryString);
        const paramsSearch = params.get('search');
        function template(data) {
            var html = '';
            data.forEach(element => {
                html += '<div class="act-card">';
                html += '<span>' + element.created_at + '</span>';
                html += '<a href="our-work/' + element.id + '?view=' + element.id + '">';
                html += '<img src="' + element.image + '" alt="">';
                html += '</a>';
                html += '<div>';
                html += '<span></span>';
                html += '<span></span>';
                html += '<span>' + element.title + '</span>';
                html += '<a href="our-work/' + element.id + '?view=' + element.id + '">READ MORE</a>';
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
                    pageSize: 6,
                    showPrevious: true,
                    showNext: true,
                    callback: function(data, pagination) {
                        // template method of yourself
                        var html = template(data);
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



                //         const link = document.createElement('a');
                //         link.href = 'our-work/' + newsItem.id + '?view=' + newsItem.id;
                //         link.appendChild(img);

                //         const divContent = document.createElement('div');
                //         const typeSpan = document.createElement('span');
                //         typeSpan.textContent = newsItem.type;

                //         const authorSpan = document.createElement('span');
                //         authorSpan.textContent = ``;

                //         const titleSpan = document.createElement('span');
                //         if (currentLanguage == 'eng') {
                //             titleSpan.textContent = newsItem.title_en || newsItem.title;
                //         } else {
                //             titleSpan.textContent = newsItem.title;
                //         }

                //         const readMoreLink = document.createElement('a');
                //         readMoreLink.href = 'our-work/' + newsItem.id + '?view=' + newsItem.id;
                //         readMoreLink.textContent = 'READ MORE';

                //         divContent.appendChild(typeSpan);
                //         divContent.appendChild(authorSpan);
                //         divContent.appendChild(titleSpan);
                //         divContent.appendChild(readMoreLink);

                //         actCard.appendChild(dateSpan);
                //         actCard.appendChild(link);
                //         actCard.appendChild(divContent);

                //         activityCards.appendChild(actCard);
                //     }
                // });
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }
        if(paramsSearch)
        {
            searchInput()
        } else
        {
            fetchNews()
        }


        // fetch("https://edmcompany.co.th/api/portfolio-items-limit/1")
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

        //         document.getElementById("resultImages").src = data.data[0].image;
        //         document.getElementById("resultDetail").innerHTML = data.data[0].short_detail;
        //         document.getElementById("resultLink").href = "our-work/" + data.data[0].id + "?view=" + data
        //             .data[0].id;


        //     })
        //     .catch(function(e) {

        //     });

        function searchInput() {
            const search = document.getElementById('searchInput').value;
            const paramSearch = encodeURIComponent(paramsSearch);
            const newsApiUrl = 'https://edmcompany.co.th/api/portfolio-items?search=' + search || paramSearch || '';
            async function fetchNewsSearch() {
                try {
                    const response = await fetch(newsApiUrl);
                    const newsData = await response.json();
                    const activityCards = document.getElementById('activity-cards');
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
                    //     const isTitleNull = currentLanguage == 'eng' ? newsItem.title_en == null :
                    //         newsItem
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



                    //         const link = document.createElement('a');
                    //         link.href = 'our-work/' + newsItem.id + '?view=' + newsItem.id;
                    //         link.appendChild(img);

                    //         const divContent = document.createElement('div');
                    //         const typeSpan = document.createElement('span');
                    //         typeSpan.textContent = newsItem.type;

                    //         const authorSpan = document.createElement('span');
                    //         authorSpan.textContent = ``;

                    //         const titleSpan = document.createElement('span');
                    //         if (currentLanguage == 'eng') {
                    //             titleSpan.textContent = newsItem.title_en || newsItem.title;
                    //         } else {
                    //             titleSpan.textContent = newsItem.title;
                    //         }

                    //         const readMoreLink = document.createElement('a');
                    //         readMoreLink.href = 'our-work/' + newsItem.id + '?view=' + newsItem.id;
                    //         readMoreLink.textContent = 'READ MORE';

                    //         divContent.appendChild(typeSpan);
                    //         divContent.appendChild(authorSpan);
                    //         divContent.appendChild(titleSpan);
                    //         divContent.appendChild(readMoreLink);

                    //         actCard.appendChild(dateSpan);
                    //         actCard.appendChild(link);
                    //         actCard.appendChild(divContent);

                    //         activityCards.appendChild(actCard);
                    //     }
                    // });
                } catch (error) {
                    console.error('Error fetching news:', error);
                }
            }
            fetchNewsSearch()
        }
    </script>
@endsection
