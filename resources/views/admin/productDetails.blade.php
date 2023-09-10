@extends('admin.sidebar')
@section('container')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-6 p-3">
        <form action="" method="post" id="formRegistration">
                @csrf
                <div class="form-group my-2">
                    <label for="productName">Product Name</label>
                    <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter Product Name" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="productCategory">Product Category</label>
                    <select class="form-control" name="productCategory" id="productCategory">
                        <option value="0">Select</option>
                        <option value="1">Electronics</option>
                        <option value="2">dress</option>
                        <option value="3">Home Applience</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="productQuantityInStore">Product Quantity in Store</label>
                    <input type="text" name="productQuantityInStore" id="productQuantityInStore" class="form-control" placeholder="Enter Quantity in Store" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="productOriginalPrice">Product Original Price</label>
                    <input type="text" name="productOriginalPrice" id="productOriginalPrice" class="form-control" placeholder="Enter Product Original Price" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="productNewPrice">Product New Price</label>
                    <input type="text" name="productNewPrice" id="productNewPrice" class="form-control" placeholder="Enter Product New Price" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="ProductPicture">Product Picture</label>
                    <span id="oldProductPicture"></span>
                    <input type="hidden" name="hiddenProductPicture" id="hiddenProductPicture">
                    <input type="file" name="productPicture" id="productPicture" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group my-2">
                    <label for="mobile">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="d-grid text-center text-lg-start mt-2">
                    <input type="hidden" name="hiddenId" id="hiddenId">
                    <input type="hidden" name="productQuantity" id="productQuantity" value="1">
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
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Quantity in Store</th>
                        <th>Product Original Price</th>
                        <th>Product New Price</th>
                        <th>Description</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="viewData">
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="{{ asset('js/admin/productDetails.js') }}"></script>
@endsection