@include('includes.header')
<section>
    <div class="container-fluid my-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('images/common_files/banner.png') }}" class="img-fluid my-3" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form>
                    @csrf
                    <h1 class="text-center my-5">LOGIN HERE</h1>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control form-control-lg shadow shadow-lg" placeholder="Enter a valid email address" />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password" class="form-control form-control-lg shadow shadow-lg" placeholder="Enter password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="d-grid text-center text-lg-start my-4 pt-2">
                        <button type="button" class="btn btn-primary btn-lg shadow shadow-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" onclick="login();">Login</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('registrationpage') }}" class="link-danger">Register</a></p>

                        <a href="#!" class="text-body float-right">Forgot password?</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>

</section>
<script src="{{ asset('js/loginRegistration.js') }}"></script>
@include('includes.footer')
