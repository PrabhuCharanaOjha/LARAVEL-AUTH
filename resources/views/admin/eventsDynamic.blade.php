@extends('super-admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
    <div class="col-sm-4 p-3">
            <form action="" method="post" id="mainForm">
                @csrf
                <div class="form-group my-2">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Event Name" aria-describedby="helpId" >
                </div>
                <div class="form-group my-2">
                    <label for="eventDate">Event Date</label>
                    <input type="text" name="eventDate" id="eventDate" class="form-control" placeholder="Enter Event Date" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="mobile">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group my-2">
                    <label for="UploadFile">Upload Image</label>
                    <span id="oldUploadFile"></span>
                    <input type="hidden" name="hiddenUploadFile" id="hiddenUploadFile">
                    <input type="file" name="uploadFile" id="uploadFile" class="form-control" placeholder="" aria-describedby="helpId">
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
                        <th>EVENT DATE</th>
                        <th>DESCRIPTION</th>
                        <th>UPLOADED IMAGE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="viewData">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('js/super-admin/eventsDynamic.js') }}"></script>
@endsection