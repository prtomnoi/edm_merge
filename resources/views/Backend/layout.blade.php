<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') | EDM</title>
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/images/logos/logo-edm.png') }}" />

    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/image-uploader.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/assets/cusmike/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="{{ URL::asset('backend/assets/images/logos/logo-edm.png') }}" width="180"
                            alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Index</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EDM MEDIA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('news.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">News page</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('groups.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-tag"></i>
                                </span>
                                <span class="hide-menu">Groups</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('campaign.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-package"></i>
                                </span>
                                <span class="hide-menu">Campaign page</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('portfolios.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-crown"></i>
                                </span>
                                <span class="hide-menu">Portfolio</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('influencer.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-package"></i>
                                </span>
                                <span class="hide-menu">Influencer</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('vtuber-gallery.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-star"></i>
                                </span>
                                <span class="hide-menu">VTuber Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('vtuber-video.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-video"></i>
                                </span>
                                <span class="hide-menu">VTuber Video</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('branding-gallery.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-star"></i>
                                </span>
                                <span class="hide-menu">Branding Gallery</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('influencer-video.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-video"></i>
                                </span>
                                <span class="hide-menu">Influencer Video</span>
                            </a>
                        </li>
                        --}}


                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EDM MANAGEMENT</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('portfolio-items.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-crown"></i>
                                </span>
                                <span class="hide-menu">Portfolio</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Other</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('table-settings.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="hide-menu">Setting</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('account.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Account</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('logOut')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ URL::asset('backend/assets/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="{{route('logOut')}}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            @yield('content')
        </div>
    </div>
    <script src="{{ URL::asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/cusmike/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/image-uploader.js') }}"></script>

</body>
@yield('scripts')
<script>
    $(document).ready(function() {
        var dataTable = $('#myTable').DataTable();
    });

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
</script>


@yield('javascript')

</html>
