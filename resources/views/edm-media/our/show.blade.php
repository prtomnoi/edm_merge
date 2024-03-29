@extends('layout')

@section('title', 'Campaign')

@section('content')
    <style>
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
                    {{-- <form action=""> --}}
                    <div class="form-div">
                        <input type="search" placeholder="SEARCH"  class="inputSearch" id="searchInput" />
                        <button type="submit"  onclick="searchInput()" class="buttonSearch">
                            <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                        </button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </section>
        <section class="article-detail">
            <div class="article-header">
                <span id="resultDate">loading ..</span>
                <img id="resultImage" src="" alt="" />
                <div class="article-h-text">
                    <!-- <span>Gameplay</span>
                                            <span>By KillMax Trone</span> -->
                    <span style="" id="resultTitle2">loading ..</span>
                </div>
            </div>
            <div class="article-body">
                <div class="container">
                    <div id="resultImages" class="row"></div>
                    <div class="article-textfield" id="resultDetail">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
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
        fetch("https://edmcompany.co.th/api/campaigns/" + view)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data.data[0].title)
                document.getElementById("resultDate").innerHTML = data.data[0].created_at;
                // const spanDescription1 = document.getElementById("resultTitle");
                const spanDescription = document.getElementById("resultTitle2");


                // if (currentLanguage == 'eng') {
                //     spanDescription1.innerHTML = data.data[0].title_en || data.data[0].title;
                //     spanDescription.innerHTML = data.data[0].title_en || data.data[0].title;
                // } else {
                //     spanDescription1.innerHTML = data.data[0].title;
                //     spanDescription.innerHTML = data.data[0].title;
                // }
                // spanDescription1.innerHTML = data.data[0].title;
                spanDescription.innerHTML = data.data[0].title;
                const imagesContainer = document.getElementById("resultImages");
                const col = document.createElement("div");
                col.classList.add("col-md-2", "mb-2");

                // const img = document.createElement("img");
                // img.src = data.data[0].image;
                // img.alt = "Image Alt Text";

                // col.appendChild(img);
                // imagesContainer.appendChild(col);
                // img.addEventListener('click', function() {
                //     openImagePreview(img.src);
                // });
                // data.data[0].images.forEach(imageData => {
                //     const col = document.createElement("div");
                //     col.classList.add("col-md-2", "mb-2");

                //     const img = document.createElement("img");
                //     img.src = imageData.image;
                //     img.alt = "Image Alt Text";

                //     col.appendChild(img);
                //     imagesContainer.appendChild(col);
                //     img.addEventListener('click', function() {
                //         openImagePreview(img.src);
                //     });
                // });

                document.getElementById("resultImage").src = data.data[0].image;
                const Description = document.getElementById("resultDetail");
                if (currentLanguage == 'eng') {
                    Description.innerHTML = data.data[0].detail_en || data.data[0].detail;
                } else {
                    Description.innerHTML = data.data[0].detail;
                }

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
            window.location.href = `{{ route('our-campaign.index') }}?search=${search}`;
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
