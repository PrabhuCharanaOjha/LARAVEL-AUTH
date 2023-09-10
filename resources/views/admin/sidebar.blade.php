@include('includes.header')
@include('includes.footer')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal show border-end vh-100 shadow-sm bg-dark">
                <div id="sidebar-nav">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none bg-p">
                            <i class="fa fa-user-circle p-2" aria-hidden="true"></i>
                            <span class="fs-4">Admin Dashboard</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto text-light sideBarUl">
                            <li class="nav-item">
                                <a href="" class="nav-link text-light" aria-current="page">
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('adminProductDetails') }}" class="nav-link text-light {{ Request::routeIs('adminProductDetails') ? 'active' : '' }}" aria-current="page">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    Add Product Details
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <button class="btn btn-toggle align-items-center rounded collapsed nav-link text-light" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                                    <i class="fa fa-crosshairs" aria-hidden="true"></i>
                                    Dynamic
                                </button>
                                <div class="collapse" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('superAdminBanner') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminBanner') ? 'active' : '' }}">Banner Dynamic</a></li>
                                        <li><a href="{{ route('superAdminEvents') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminEvents') ? 'active' : '' }}">Events Dynamic</a></li>
                                        <li><a href="{{ route('superAdminGallery') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminGallery') ? 'active' : '' }}">Gallery Dynamic</a></li>
                                        <li><a href="{{ route('superAdminTeam') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminTeam') ? 'active' : '' }}">Team Dynamic</a></li>
                                        <li><a href="{{ route('superAdminTestimonial') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminTestimonial') ? 'active' : '' }}">Testimonial Dynamic</a></li>
                                        <li><a href="{{ route('superAdminContact') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminContact') ? 'active' : '' }}">Contact Dynamic</a></li>
                                        <li><a href="{{ route('superAdminFooter') }}" class="nav-link rounded text-light ms-4 {{ Request::routeIs('superAdminFooter') ? 'active' : '' }}">Footer Dynamic</a></li>
                                    </ul>
                                </div>
                            </li> -->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ps-md-2 pt-3">
            <div class="d-flex justify-content-between">
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="p-2 text-decoration-none">
                    <i class="fa fa-bars fa-xl" aria-hidden="true"></i>
                </a>
                <button class="btn btn-sm btn-danger rounded p-2" onclick="logout()">
                    <i class="fa fa-power-off" aria-hidden="true"></i>Logout
                </button>
            </div>
            <hr>
            <div class="row">
                @yield('container')
            </div>
        </div>
    </div>
</div>
<script>
    if(sessionStorage.getItem("token") == null){
        location.href = '/';
    }
</script>
<script src="{{ asset('js/loginRegistration.js') }}"></script>