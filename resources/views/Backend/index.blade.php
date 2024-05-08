@extends('Backend.layout')

@section('title', 'หน้าหลัก')

@section('content')
      <div class="container-fluid">
           <div class="row">
               {{-- <div class="col-md-4">
                  <div class="card" style="background-color:black; color:#ffffff;">
                    <div class="text-center h-100">
                      <img src="{{ URL::asset('backend/assets/images/logos/edm-media2.png') }}" width="250px" alt="...">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-white">EDM MEDIA</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">View  </a>
                    </div>
                  </div>
               </div>
               <div class="col-md-4">
                <div class="card " style="background-color:black; color:#ffffff;">
                  <div class="text-center mt-2">
                    <img src="{{ URL::asset('backend/assets/images/logos/edm-management.png') }}" width="250px"  alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-white">EDM MANAGEMENT</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">View</a>
                  </div>
                </div>
             </div> --}}
             <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="color:black; background: rgb(239,178,185);
                background: linear-gradient(111deg, rgba(239,178,185,1) 0%, rgba(241,215,144,1) 95%);">
                  <div class="card-body">
                    <h5 class="card-title"><i class="ti ti-article"></i> Menu News</h5>
                    <a href="{{route('news.index')}}" class="btn btn-primary">Go</a>
                  </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="color:black; background: rgb(239,178,185);
                background: linear-gradient(111deg, rgba(239,178,185,1) 0%, rgba(241,215,144,1) 95%);">
                  <div class="card-body">
                    <h5 class="card-title"><i class="ti ti-package"></i> Menu Campaign</h5>
                    <a href="{{route('campaign.index')}}" class="btn btn-primary">Go</a>
                  </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="color:black; background: rgb(239,178,185);
                background: linear-gradient(111deg, rgba(239,178,185,1) 0%, rgba(241,215,144,1) 95%);">
                  <div class="card-body">
                    <h5 class="card-title"><i class="ti ti-crown"></i> Menu Portfoilo</h5>
                    <a href="{{route('portfolios.index')}}" class="btn btn-primary">Go</a>
                  </div>
                </div>
             </div>
           </div>
      </div>

  @endsection
