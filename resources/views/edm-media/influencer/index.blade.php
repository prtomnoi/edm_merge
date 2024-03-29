@extends('layout')

@section('title', 'Creator')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/subpage-base-style.css?v=3') }}" />
    <section class="header-sec mb-5">
        {{view('animation-wrapper')}}
            {{-- {{view('gadget-menu')}} --}}
        {{-- <div class="animation-wrapper">
            <div id="stars-group-1"></div>
            <div id="stars-group-2"></div>
            <div id="stars-group-3"></div>
            <div id="stars-group-4"></div>
            <div id="stars-group-5"></div>
            <div id="stars-group-6"></div>
        </div>
        <div class="gadget-menu">
            <a href=""><img src="assets/img/gadget-icons/fb-icon.svg" alt="" /></a>
            <a href=""><img src="assets/img/gadget-icons/yt-icon.svg" alt="" /></a>
            <a href=""><img src="assets/img/gadget-icons/gadget-edm-icon.svg" alt="" /></a>
            <a href=""><img src="assets/img/gadget-icons/joinus-icon.svg" alt="" /></a>
        </div> --}}
        <div class="title">
            <div class="sub-text">
                <h1>Our Creator</h1>
                <div class="sub-breadcrumb">
                    <a href="{{url('/')}}">Home</a>
                    <a href="#" class="active">Our Creator</a>
                </div>
            </div>
            <div class="sub-search">
                <form action="">
                    <input type="search" placeholder="SEARCH" />
                    <button type="submit">
                        <img src="{{asset('assets/img/icon_search.svg')}}" alt="" />
                    </button>
                </form>
            </div>
        </div>
        <div class="sub-slider-container">

            <div id="creatorCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carousel">

                </div>
            </div>
        </div>
    </section>

    <section class="creator-sec ">


        <div class="creator-cards-sec" id="influencerResult">

        </div>
    </section>

    <section class="vdo-highlight">
        <h1>Influencer's Video Highlight</h1>
        <div class="vdo-container" id="vdo-container">
        </div>
    </section>
@endsection

@section('scripts')
@endsection
