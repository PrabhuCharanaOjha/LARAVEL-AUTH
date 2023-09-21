@extends('super-admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-6 p-3">
            <form action="" method="post" id="mainForm">
                @csrf
                <div class="form-group">
                  <label for="">Enter User Name</label>
                  <input type="text" name="userName" id="userName" class="form-control" placeholder="" aria-describedby="helpId" required>
                </div>

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Sl No.</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>New Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="multiRow">
                        <tr id="rowId_0">
                            <td scope="row">1</td>
                            <td>
                                <div class="form-group my-2">
                                    <input type="text" name="startDate_0" id="startDate_0" class="form-control" aria-describedby="helpId" onchange="initializeDatePicker('startDate_0', 'endDate_0')"  required>
                                </div>
                            </td>
                            <td>
                                <div class="form-group my-2">
                                    <input type="text" name="endDate_0" id="endDate_0" class="form-control" aria-describedby="helpId" onchange="initializeDatePicker('endDate_0', 'newDate_0')" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="form-group my-2">
                                    <input type="text" name="newDate_0" id="newDate_0" class="form-control" aria-describedby="helpId" disabled>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" onclick="addRow();">Add</button>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div class="d-grid text-center text-lg-start mt-2">
                    <input type="hidden" name="hiddenId" id="hiddenId">
                    <button type="button" id="saveBtn" class="btn btn-success btn-sm border-dark my-2" onclick="addData();">Save</button>
                    <button type="button" id="updateBtn" class="btn btn-primary btn-sm border-dark my-2" onclick="updateData();" style="display: none;">Update</button>
                    <button type="button" id="cancelBtn" class="btn btn-danger btn-sm border-dark my-2" onclick="cancelUpdate();" style="display: none;">Cancel</button>
                </div>
            </form>
        </div>
        <!-- <div class="col-sm-6">
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
        </div> -->
    </div>
</div>

<script src="{{ asset('js/super-admin/test.js') }}"></script>
@endsection