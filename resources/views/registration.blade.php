@include('includes.header')
<section>
    <div class="container-fluid my-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1 class="text-center my-2">USER REGISTRATION FORM</h1>
                <form action="" method="post" id="formRegistration">
                    @csrf
                    <div class="form-group my-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Confirm Password</label>
                        <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Enter Your Confirm Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="mobile">Mobile No</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Mobile no" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="age">Age</label>
                        <input type="text" name="age" id="age" class="form-control" placeholder="Enter Your Mobile no" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="profilePicture">Profile Picture</label>
                        <input type="file" name="profilePicture" id="profilePicture" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group my-2">
                        <label for="mobile">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <div class="d-grid text-center text-lg-start my-4 pt-2">
                        <button type="button" id="saveBtn" class="btn btn-success btn-sm border-dark my-2" onclick="register();">Save</button>
                        <a href="{{ route('loginpage') }}" id="saveBtn" class="btn btn-info btn-sm border-dark my-2">Goto Login Page</a>
                    </div>
                </form>
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('images/common_files/banner.png') }}" class="img-fluid my-3" alt="Sample image">
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/loginRegistration.js') }}"></script>
@include('includes.footer')