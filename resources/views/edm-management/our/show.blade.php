@extends('edm-management.layout');

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
        .responsive-iframe {
        width: 100%;
        height: 450px;
        border: none;
    }
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
                        <a href="{{ url('edm-management/index') }}">Home</a>
                        <a href="{{ route('our-work.index') }}">Our Work</a>
                        <a href="#" id="resultTitle">Win With Strategy And Not Just Weapons</a>
                    </div>
                </div>
                <div class="sub-search">
                    {{-- <form action=""> --}}
                    <div class="form-div">
                        <input type="search" placeholder="SEARCH" class="inputSearch" id="searchInput" />
                        <button type="submit" onclick="searchInput()" class="buttonSearch">
                            <img src="{{ asset('edm-management/assets/img/icon_search.svg') }}" alt="" />
                        </button>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </section>

        {{-- <section class="article-detail">
            <div class="article-header">
                <span id="resultDate">loading ..</span>
                <img id="resultImage" src="" alt="" />
                <div class="article-h-text">
                    <span style="color:#FF4200;" id="resultTitle2">loading ..</span>
                </div>
            </div>
            <div class="container">
                <div class="article-body">


                    <div class="article-textfield" id="resultDetail">

                    </div>
                    <div id="resultImages" class="row">

                    </div>

                </div>
            </div>
        </section> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <section class="article-detail">
                        <div class="article-header">
                            <span id="resultDate">loading ..</span>
                            <div class="image-container">
                                <img id="resultImage" src="" alt="" />
                            </div>
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
                        <h2 class="text-center">Latest Event</h2>
                        <div class="d-flex w-100 justify-content-center" style="flex-wrap: wrap; background: #1d1d1d;" id="top-recent-cards">
                        </div>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')
        <script src="{{ asset('assets/js/splide.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <link href="{{ asset('assets/css/nanogallery2.min.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ asset('assets/js/jquery.nanogallery2.min.js') }}"></script>
        <script>
            const urlParams = new URLSearchParams(window.location.search);
            // const view = urlParams.get("view");
            const view = '{{ $id }};'

            function formatDateToCustomFormat(isoDateString) {
                const date = new Date(isoDateString);
                const options = {
                    month: "long",
                    day: "numeric",
                    year: "numeric"
                };
                return date.toLocaleDateString("en-US", options);
            }
            let modal;
            let modalImage;
            modal = document.getElementById('imagePreviewModal');
            modalImage = document.querySelector('.modal-image');
            fetch("https://edmcompany.co.th/api/portfolio-items/" + view)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
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
                    const imagesContainer = document.getElementById("resultImages");
                    let source = [];
                    data.data[0].images.forEach((imageData, index) => {
                        source.push({
                            src: imageData.image,
                            srct: imageData.image,
                            title: 'Image ' + (index + 1)
                        });
                        // const col = document.createElement("a");
                        // const texts = document.createTextNode("Image " + (index + 1));
                        // col.href = imageData.image;
                        // col.setAttribute('data-ngthumb', imageData.image);
                        // col.setAttribute('data-ngdesc', "");
                        // col.appendChild(texts);
                        // console.log(col);

                        // col.appendChild(img);
                        // imagesContainer.appendChild(col);
                        // Handle image click event
                        // const sliderImages = document.querySelectorAll('.splide__slide img');
                        // img.addEventListener('click', function() {
                        //     // openImagePreview(img.src);
                        //     const largeImagePath = this.dataset.modalImage;
                        //     console.log(largeImagePath);
                        //     modalImage.src = largeImagePath;
                        //     modal.classList.add('show');
                        // });
                    });
                    // setTimeout(() => {
                    //     imagesContainer.setAttribute("data-nanogallery2", `{
            //             "thumbnailWidth": "200",
            //             "thumbnailLabel": {
            //               "position": "overImageOnBottom"
            //             },
            //             "thumbnailAlignment": "center",
            //             "thumbnailOpenImage": true
            //           }`);
                    // }, 1000);
                    $("#resultImages").nanogallery2({
                        // ### gallery settings ###
                        thumbnailHeight: 150,
                        thumbnailWidth: 150,
                        thumbnailLabel: {
                            position: "overImageOnBottom",
                            display: false
                        },
                        // itemsBaseURL:     'https://nanogallery2.nanostudio.org/samples/',

                        // ### gallery content ###
                        items: source,

                    });

                    document.getElementById("resultImage").src = data.data[0].image;
                    const Description = document.getElementById("resultDetail");
                    if (currentLanguage == 'eng') {
                        Description.innerHTML = data.data[0].detail_en || data.data[0].detail;
                    } else {
                        Description.innerHTML = data.data[0].detail;
                    }
                    updateDOMElements();
                    // Handle modal close button click
                    // closeButton.addEventListener('click', function() {
                    //     modal.classList.remove('show'); // Remove visible class from modal
                    //     modalImage.src = ''; // Clear modal image source
                    // });
                })
                .catch(function(e) {
                    console.log(e);
                });

            function openImagePreview(imageSrc) {
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageSrc;

                const imagePreviewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                imagePreviewModal.show();
            }

            function closeImagePreview() {
                modal.style.display = 'none';
            }

            function searchInput() {
                const search = document.getElementById("searchInput").value;
                window.location.href = `{{ route('our-work.index') }}?search=${search}`;
            }
                document.addEventListener('DOMContentLoaded', () => {
                    // https://edmcompany.co.th
                const newsApiUrl = 'https://edmcompany.co.th/api/portfolio-items-top';
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
                            aReadMore.href = '/edm-management/our-work/' + activityItem.id + '?view=' + activityItem.id;
                            aReadMore.textContent = 'Read More';

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
            function updateDOMElements() {
                $("img").removeAttr("style").addClass("img-fluid");
                $("img:first").removeClass("img-fluid");
                $("iframe").removeAttr("height");
                $("iframe").removeAttr("width");
                $("iframe").addClass("responsive-iframe");
         }
            // $("img").removeAttr("style");
            // $("img").addClass("img-fluid");
            // $("img:first").removeClass("img-fluid");
            // $("iframe").removeAttr("height");
            // $("iframe").removeAttr("width");
            // $("iframe").addClass("responsive-iframe");
            // $("iframe:last").removeClass("responsive-iframe");
            // $("iframe:last").addClass("responsive-iframe2");
        </script>
    @endsection
