{{-- @if (count($data) != 0)
<div class="gadget-menu">
    <a href="{{$data[0]["facebook"]}}" id="facebook"><img src="{{asset('assets/img/gadget-icons/fb-icon.svg')}}" alt="" /></a>
    <a href="{{$data[0]["youtube"]}}" id="youtube"><img src="{{asset('assets/img/gadget-icons/yt-icon.svg')}}" alt="" /></a>
    <a href="{{$data[0]["url"]}}" id="url"><img src="{{asset('assets/img/gadget-icons/gadget-edm-icon.svg')}}" alt="" /></a>
    <a href="{{$data[0]["contact"]}}" id="contact"><img src="{{asset('assets/img/gadget-icons/joinus-icon.svg')}}" alt="" /></a>
</div>
@else --}}
<div class="gadget-menu" id="gadget-menu">
    <a href="#" id="facebook" target="_blank"><img src="{{asset('assets/img/gadget-icons/fb-icon.svg')}}" alt="" /></a>
    {{-- <a href="#" id="youtube" target="_blank"><img src="{{asset('assets/img/gadget-icons/yt-icon.svg')}}" alt="" /></a> --}}
    <a href="#" id="url" target="_blank"><img src="{{asset('assets/img/gadget-icons/gadget-edm-icon.svg')}}" alt="" /></a>
    {{-- <a href="#" id="contact" target="_blank"><img src="{{asset('assets/img/gadget-icons/joinus-icon.svg')}}" alt="" /></a> --}}
</div>
{{-- @endif --}}
