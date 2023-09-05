@extends('super-admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-6 p-3">
            <form action="" method="post" id="mainForm">
                @csrf
                <div class="container-fluid" id="multiRow">
                    <div class="row" id="rowId_0">
                        <div class="col-5">
                            <div class="form-group my-2">
                                <label for="name"> Heading</label>
                                <input type="text" name="heading_0" id="heading_0" class="form-control" placeholder="Enter Heading Name" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group my-2">
                                <label for="mobile">Description</label>
                                <textarea class="form-control" name="description_0" id="description_0" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" id="addRowBtn" class="btn btn-success btn-sm border-dark mt-4" onclick="addRow();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
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
                        <th>HEADING</th>
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
<script src="{{ asset('js/super-admin/contactDynamic.js') }}"></script>
@endsection