@extends('layout')

@section('title', '')

@section('content')
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
                <a href=""><img src="assets/img/gadget-icons/fb-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/yt-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/gadget-edm-icon.svg" alt="" /></a>
                <a href=""><img src="assets/img/gadget-icons/joinus-icon.svg" alt="" /></a>
            </div> --}}

            <img src="{{asset('assets/img/edm-logo.png')}}" alt="" />
            <h1 class="header-title">
                เติมเต็มความฝัน
                <span class="d-block"> ให้คุณประสบความสำเร็จเร็วขึ้น</span>
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
            <h1>Contact Us</h1>
            <p>
                บริษัท อีดีเอ็ม มีเดีย จํากัด (สำนักงานใหญ่)<br />
                250/48 ซอยรามคําแหง 112 ถนนรามคําแหง แขวงสะพานสูงเขตสะพานสูง<br />
                กรุงเทพมหานคร 10240
            </p>
            <p>
                เบอร์ติดต่อ 02-077-6029<br />
                (วัน-เวลาทำการ จันทร์ ถึง ศุกร์ 10.00-19.00 น.)<br />
                อีเมล์ : info@edmcompany.co.th
            </p>

        </section>
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.2897562942344!2d100.67368758579532!3d13.761391962617227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61a8f7fe839d%3A0x96f7d1cc6cd0b71a!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4reC4teC4lOC4teC5gOC4reC5h-C4oSDguKHguLXguYDguJTguLXguKIg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1694943602712!5m2!1sth!2sth"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
