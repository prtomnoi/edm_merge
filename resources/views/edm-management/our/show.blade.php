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
</style>
<link rel="stylesheet" href="{{asset('edm-management/assets/css/subpage-base-style.css?v=3')}}" />
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
                        <a href="{{route('our-work.index')}}">Our Work</a>
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

        <section class="article-detail">
            <div class="article-header">
                <span id="resultDate">loading ..</span>
                <img id="resultImage" src="" alt="" />
                <div class="article-h-text">
                    <!-- <span>Gameplay</span>
                        <span>By KillMax Trone</span> -->
                    <span style="color:#FF4200;" id="resultTitle2">loading ..</span>
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
        const view = '{{$id}};'

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

                data.data[0].images.forEach(imageData => {
                    const col = document.createElement("div");
                    col.classList.add("col-md-2", "mb-2");

                    const img = document.createElement("img");
                    img.src = imageData.image;
                    img.alt = "Image Alt Text";

                    col.appendChild(img);
                    imagesContainer.appendChild(col);
                    img.addEventListener('click', function() {
                        openImagePreview(img.src);
                    });
                });

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
            window.location.href = `{{ route('our-work.index') }}?search=${search}`;
        }

        $("img").removeAttr("style");
        $("img").addClass("img-fluid");
        $("img:first").removeClass("img-fluid");
        $("iframe").removeAttr("height");
        $("iframe").removeAttr("width");
        $("iframe").addClass("responsive-iframe");
        $("iframe:last").removeClass("responsive-iframe");
        $("iframe:last").addClass("responsive-iframe2");
    </script>
@endsection
