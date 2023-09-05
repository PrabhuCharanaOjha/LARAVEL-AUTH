@extends('super-admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-6 p-3">
            <form action="" method="post" id="mainForm">
                @csrf
                <div class="form-group">
                    <label for=""></label>
                    <select class="select2 form-control" multiple="multiple" data-placeholder="--Select--" style="width: 100%" id="adminPermission" name="">
                        <option value="banner">banner</option>
                        <option value="events">events</option>
                        <option value="gallery">gallery</option>
                        <option value="team">team</option>
                        <option value="testimonial">testimonial</option>
                    </select>
                </div>

                <div class="d-grid text-center text-lg-start mt-2">
                    <input type="hidden" name="hiddenId" id="hiddenId">
                    <button type="button" id="saveBtn" class="btn btn-success btn-sm border-dark my-2" onclick="addData();">Save</button>
                    <button type="button" id="updateBtn" class="btn btn-primary btn-sm border-dark my-2" onclick="updateData();" style="display: none;">Update</button>
                    <button type="button" id="cancelBtn" class="btn btn-danger btn-sm border-dark my-2" onclick="cancelUpdate();" style="display: none;">Cancel</button>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <table class="table table-striped table-inverse table-responsive p-3" id="example">
                <thead class="thead-inverse">
                    <tr>
                        <th>SL NO.</th>
                        <th>DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody id="viewData">
                </tbody>


            </table>
            <button type="button" class="btn btn-sm btn-primary shadow shadow-lg rounded-0" onclick="editableData()"><i class="fas fa-pen" aria-hidden="true"></i></button>';
            <button type="button" class="btn btn-sm btn-danger shadow shadow-lg rounded-0" onclick="deleteData()"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
    </div>
</div>


<script src="{{ asset('js/super-admin/adminPermission.js') }}"></script>
@endsection