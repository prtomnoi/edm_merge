@extends('layout2')

@section('title', 'News And Activity')

@section('content')
    <div class="main">
        {{-- <nav>
    <!-- Nav Hamberger menu -->
    <div class="nav-menu">
      <img src="{{asset('assets/img/menu.svg')}}" alt="" />
    </div>

    <div class="nav-btns">
      <a href="{{url('/')}}"><img src="{{asset('assets/img/edm-company-logo.png')}}" alt="" /></a>
      <div class="nav-btns-wrapper">

        <div class="nav-dropdown" data-dropdown>
          <button class="nav-dropdown-btn" data-dropdown-button>
            FOR BRAND
            <img src="{{asset('assets/img/expand.svg')}}" alt="" />
          </button>
          <div class="nav-dropdown-menu">
            <a href="{{route('benefit.index')}}">Service</a>
            <a href="{{route('our-campaign.index')}}">Campaign</a>
          </div>
        </div>
        <a href="news-activity.html">NEWS</a>
        <a href="{{route('contact-us.index')}}">CONTACT US</a>
        <div class="nav-dropdown" data-dropdown>
          <button class="nav-dropdown-btn" data-dropdown-button>
            <img src="{{asset('assets/img/thai-lang-icon.png')}}" alt="" /> TH
            <img src="{{asset('assets/img/expand.svg')}}" alt="" />
          </button>
         <div class="nav-dropdown-menu">
            <a href="#"><img src="{{asset('assets/img/thai-lang-icon.png')}}" id="thaiBtn2" alt="" /> TH</a>
            <a href="#"><img src="{{asset('assets/img/UK.png')}}" id="engBtn2" alt="" /> ENG</a>
          </div>
        </div>
      </div>
    </div>
  </nav> --}}

        <section class="header-sec">
            {{ view('animation-wrapper') }}
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

    </div> --}}

        </section>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-lg-9 col-xl-9">
                        <div class="sub-text">
                            <h1>New And Activity</h1>
                            <div class="sub-breadcrumb">
                                <a href="{{ url('/') }}">Home</a>
                                <a href="{{ route('news-activity.index') }}">New And Activity</a>
                                <a href="#" id="resultTitle"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center mt-2">
                        <div class="sub-search" >
                            <form action="">
                                <input type="search" placeholder="SEARCH" />
                                <button type="submit">
                                    <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <section class="article-detail">
                        <div class="article-header">
                            <span id="resultDate">loading ..</span>
                            <img id="resultImage" src="" alt="" />
                            <div class="article-h-text">
                                <span id="resultTitle2">loading ..</span>
                            </div>
                        </div>
                        <div class="article-body">
                            <div class="article-textfield" id="resultDetail"></div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4 d-flex justify-content-center">
                    <div class="top-recen">
                        <h2 class="text-center">Top Recent</h2>
                        <div class="d-flex w-100 justify-content-center" id="top-recent-cards">
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('scripts')
    <script>
        const Description = document.getElementById("resultDetail");
        Description.innerHTML
        const urlParams = new URLSearchParams(window.location.search);
        const view = urlParams.get("view");

        function formatDateToCustomFormat(isoDateString) {
            const date = new Date(isoDateString);
            const options = {
                month: "long",
                day: "numeric",
                year: "numeric"
            };
            return date.toLocaleDateString("en-US", options);
        }
        fetch("https://edmcompany.co.th/api/news/" + view)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data.data[0])
                document.getElementById("resultDate").innerHTML = data.data[0].created_at;
                const spanDescription1 = document.getElementById("resultTitle");
                const spanDescription = document.getElementById("resultTitle2");

                if (currentLanguage == 'eng') {
                    spanDescription1.innerHTML = data.data[0].title_en || data.data[0].title;
                    spanDescription.innerHTML = data.data[0].title_en || data.data[0].title;
                } else {
                    spanDescription1.innerHTML = data.data[0].title;
                    spanDescription.innerHTML = data.data[0].title;
                }

                document.getElementById("resultImage").src = data.data[0].image;
                const Description = document.getElementById("resultDetail");
                if (currentLanguage == 'eng') {
                    Description.innerHTML = data.data[0].detail_en || data.data[0].detail;
                } else {
                    Description.innerHTML = data.data[0].detail;
                }
                $("img").removeAttr("style");
                $("img").addClass("img-fluid");
                $("img:first").removeClass("img-fluid");
                // $("iframe").removeAttr("height");
                // $("iframe").removeAttr("width");
                // $("iframe").attr('sandbox', 'allow-scripts allow-same-origin');
                $("iframe").addClass("responsive-iframe");
                $("iframe:last").removeClass("responsive-iframe");
                $("iframe:last").addClass("responsive-iframe2");
            })
            .catch(function(e) {
                console.log(e);
            });

        document.addEventListener('DOMContentLoaded', () => {
            const newsApiUrl = 'https://edmcompany.co.th/api/news-top';
            const maxActivities = 3; // Set the maximum number of recent activities to display

            async function fetchTopRecentActivities() {
                try {
                    const response = await fetch(newsApiUrl);
                    const activityData = await response.json();
                    const topRecentCards = document.getElementById('top-recent-cards');

                    for (let i = 0; i < Math.min(activityData.data.length, maxActivities); i++) {
                        const activityItem = activityData.data[i];

                        const actCard = document.createElement('div');
                        actCard.classList.add('act-card');

                        const spanDate = document.createElement('span');
                        spanDate.textContent = activityItem.created_at;

                        const img = document.createElement('img');
                        img.src = activityItem.image;
                        img.alt = '';

                        const divContent = document.createElement('div');

                        const spanTitle = document.createElement('span');
                        spanTitle.textContent = activityItem.type;

                        const spanAuthor = document.createElement('span');
                        spanAuthor.textContent = `By ${activityItem.signature}`;

                        const spanDescription = document.createElement('span');
                        if (currentLanguage == 'eng') {
                            spanDescription.textContent = activityItem.title_en || activityItem.title;
                        } else {
                            spanDescription.textContent = activityItem.title;
                        }


                        const aReadMore = document.createElement('a');
                        aReadMore.href = '/news-activity/' + activityItem.id + '?view=' + activityItem.id;
                        aReadMore.textContent = 'READ MORE';

                        // divContent.appendChild(spanTitle);
                        // divContent.appendChild(spanAuthor);
                        divContent.appendChild(spanDescription);
                        divContent.appendChild(aReadMore);

                        actCard.appendChild(spanDate);
                        actCard.appendChild(img);
                        actCard.appendChild(divContent);

                        topRecentCards.appendChild(actCard);
                    }
                } catch (error) {
                    console.error('Error fetching top recent activities:', error);
                }
            }

            fetchTopRecentActivities();
        });
    </script>
@endsection
