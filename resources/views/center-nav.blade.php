<div class="top-collapse-wrapper" collapse-content="company">
    <div class="top-sec">
        <div class="top-link-item">
            <a href="{{ url('edm-management/index') }}" target="_black" rel="noopener noreferrer"><img src="{{ asset('assets/img/edm-logo-2.png') }}"
                    alt="" /></a>
            <ul>
                <li>Network Solution</li>
                <li>Network Comsulting</li>
                <li>Event</li>
                <li>Live Steam Broadcast</li>
            </ul>
        </div>
        <div class="top-link-item">
            <a href="{{ url('edm-media/index') }}" target="_black" rel="noopener noreferrer"><img src="{{ asset('assets/img/edm-logo.png') }}"
                    alt="" /></a>
            <ul>
                <li>KOLs</li>
                <li>Media Reach</li>
                <li>Marketing Consulting</li>
            </ul>
        </div>
        {{-- <div class="top-link-item">
    <img src="{{asset('assets/img/edm-innovation.png')}}" alt="" />
    <ul>
      <li><a href="#"> Virtual Reality </a></li>
      <li><a href="#"> Software Development </a></li>
    </ul>
  </div> --}}
    </div>
</div>
<div class="top-collapse-wrapper" collapse-content="contact">
    <div class="top-sec">
        <div class="contact-us-header">
            <p>Have Question?</p>
            <h1>CONTACT US</h1>
            <div>
                <img src="{{ asset('assets/img/google-map-icon.png') }}" alt="" />
                <p>
                    250/48 Sammakorn Soi 42 Ramkhamhaeng 112, Saphansung
                    Sub-district, Saphansung District, Bangkok Thailand 10240
                </p>
            </div>
        </div>
        <form class="main-contact-us-form" id="contact-us-form">
            @csrf
            <div>
                <input type="text" name="company" value="CENTER" hidden>
                <input type="text" title="name" placeholder="Enter Your Name" name="name" />
                <input type="tel" title="phone" placeholder="Enter Your Phone Number" name="phone" />
            </div>
            <div>
                <input type="email" title="email" placeholder="Enter Your Email" name="email" />
                <input type="text" title="company" placeholder="Enter Your Company"
                    name="user_company" />
            </div>
            <textarea name="message" id="" rows="4" placeholder="Enter your message"></textarea>
            <button type="submit">SEND</button>
        </form>
    </div>
</div>
