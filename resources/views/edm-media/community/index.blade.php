@extends('layout')

@section('title', 'Vtuber')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/subpage-base-style.css?v=3') }}" />
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
            <a href=""><img src="{{ asset('assets/img/gadget-icons/fb-icon.svg') }}" alt="" /></a>
            <a href=""><img src="{{ asset('assets/img/gadget-icons/yt-icon.svg') }}" alt="" /></a>
            <a href=""><img src="{{ asset('assets/img/gadget-icons/gadget-edm-icon.svg') }}" alt="" /></a>
            <a href=""><img src="{{ asset('assets/img/gadget-icons/joinus-icon.svg') }}" alt="" /></a>
        </div> --}}
        <div class="title">
            <div class="sub-text">
                <h1>VTuber Community</h1>
                <div class="sub-breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="#" class="active">Our Creator</a>
                </div>
            </div>
            <div class="sub-search">
                <form action="">
                    <input type="search" placeholder="SEARCH" />
                    <button type="submit">
                        <img src="{{ asset('assets/img/icon_search.svg') }}" alt="" />
                    </button>
                </form>
            </div>
        </div>
        <div class="sub-slider-container">
            <div class="vtuber-slider" id="vtuber-slider">
            </div>
        </div>
        <div class="vtuber-des">
            <span>VTuber
                เป็นผู้ให้ความบันเทิงทางออนไลน์ที่ใช้อวตารเสมือนจริงที่สร้างขึ้นโดยใช้
                คอมพิวเตอร์กราฟิก และเทคโนโลยีการจับภาพเคลื่อนไหวแบบเรียลไทม์ ทำให้
                VTuber สามารถโต้ตอบกับผู้ชมได้อย่างคล่องแคล่วและสนุกสนาน
                ซึ่งเป็นสไตล์การสร้างเนื้อหาที่ได้รับความนิยม ในหลายประเทศ
                ที่ประเทศไทยมีสังกัด VTuber มืออาชีพ ที่ได้รับความนิยมอย่างสูง
                เป็นตัวแทนของความคิดและความเป็นตัวตนของคนไทยในโลกออนไลน์ อย่าง
                Pixela Project และ Polygon Project</span>
        </div>
    </section>

    <section class="creator-sec">
        <div class="creator-cards-sec" id="influencerResult">

        </div>
    </section>

    <section class="yt-preview">
        <div class="yt-slider-for" id="firstVideo">

        </div>
        <div class="yt-slider-nav" id="videoContainer">

        </div>

    </section>
@endsection

@section('scripts')
@endsection
