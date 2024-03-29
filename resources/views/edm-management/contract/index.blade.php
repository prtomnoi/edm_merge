@extends('edm-management.layout');

@section('title', 'Contact Us')

@section('content')
    <div class="main">
        <section class="header-sec">
            <div class="animation-wrapper">
                <div id="stars-group-1"></div>
                <div id="stars-group-2"></div>
                <div id="stars-group-3"></div>
                <div id="stars-group-4"></div>
                <div id="stars-group-5"></div>
                <div id="stars-group-6"></div>
            </div>
            <div class="gadget-menu">
                <a href=""><img src="{{asset('edm-management/assets/img/gadget-icons/fb-icon.svg')}}" alt="" /></a>
                <a href=""><img src="{{asset('edm-management/assets/img/gadget-icons/yt-icon.svg')}}" alt="" /></a>
                <a href=""><img src="{{asset('edm-management/assets/img/gadget-icons/gadget-edm-icon.svg')}}" alt="" /></a>
                <a href=""><img src="{{asset('edm-management/assets/img/gadget-icons/joinus-icon.svg')}}" alt="" /></a>
            </div>

            <img src="assets/img/edm-logo.png" alt="" />
            <h1 class="header-title">
                เติมเต็มความฝัน <br />
                ให้คุณประสบความสำเร็จเร็วขึ้น
            </h1>
        </section>

        <section class="contact-us-sec">
            <h2>
                ทีมงานของเรายินดีให้ความช่วยเหลือและตอบทุกข้อสงสัยของคุณ<br />
                กรุณากรอกแบบฟอร์มและส่งหาเรา ทีมงานจะติดต่อกลับโดยเร็วที่สุด
            </h2>
            <div class="contact-form">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Creator</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Branding</a>
            </div>
        </section>

        <section class="information">
            <h1>Contect Us</h1>
            <p>
                บริษัท อีเทอร์นิตี้ ดรีม มีเดีย จํากัด (สำนักงานใหญ่)<br />
                250/48 ซอยรามคําแหง 112 ถนนรามคําแหง แขวงสะพานสูงเขตสะพานสูง<br />
                กรุงเทพมหานคร 10240
            </p>
            <p>
                เบอร์ติดต่อ 02-077-6029<br />
                (วัน-เวลาทำการ จันทร์ ถึง ศุกร์ 10.00-19.00 น.)<br />
                อีเมล์ : info@edmcompany.co.th
            </p>
        </section>
    </div>
@endsection

@section('scripts')
@endsection
