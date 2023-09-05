@extends('super-admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-4 p-3">
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
                <div class="form-group my-2" id="passwordArea">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-describedby="helpId">
                </div>
                <div class="form-group my-2" id="c_passwordArea">
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
                    <label for="userType">User Type</label>
                    <select class="form-control" name="userType" id="userType">
                        <option value="0">Select</option>
                        <option value="2">Admin</option>
                        <option value="3">User</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="profilePicture">Profile Picture</label>
                    <span id="oldProfilePicture"></span>
                    <input type="hidden" name="hiddenProfilePicture" id="hiddenProfilePicture">
                    <input type="file" name="profilePicture" id="profilePicture" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="mobile">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="d-grid text-center text-lg-start mt-2">
                    <input type="hidden" name="hiddenId" id="hiddenId">
                    <button type="button" id="saveBtn" class="btn btn-success btn-sm border-dark my-2" onclick="addData();">Save</button>
                    <button type="button" id="updateBtn" class="btn btn-primary btn-sm border-dark my-2" onclick="updateData();" style="display: none;">Update</button>
                    <button type="button" id="cancelBtn" class="btn btn-danger btn-sm border-dark my-2" onclick="cancelUpdate();" style="display: none;">Cancel</button>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <table class="table table-striped table-inverse table-responsive p-3" id="example">
                <thead class="thead-inverse">
                    <tr>
                        <th>SL NO.</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>AGE</th>
                        <th>USER TYPE</th>
                        <th>DESCRIPTION</th>
                        <th>PROFILE PICTURE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="viewData">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('js/super-admin/createAdmin.js') }}"></script>
@endsection