viewData();
var JSONDATA = [];

function addData() {
    var ids = ["productName", "productCategory", "productQuantityInStore", "productOriginalPrice", "productNewPrice", "description"];
    var validationTypes = [["blank"], ["select_field"], ["blank", "number"], ["blank", "number"], ["blank", "number"], ["blank"]];
    var messages = [["Enter Product Name"], ["Select Product Category"], ["Enter Product Quantity in Store", "Enter Number Only"], ["Enter pPoduct Original Price", "Enter Number Only"], ["Enter Product New Price", "Enter Number Only"], ["Enter Description"]];
    var validationResponse = validate(ids, validationTypes, "error_div", messages);
    if (validationResponse == undefined) {

        var uploadFile = uploadFileFun("productPicture", ["jpg", "jpeg", "png"], "");
        if (uploadFile != false) {

            var formData = new FormData(
                document.getElementById("formRegistration")
            );
            formData.append("productPicture", uploadFile);

            $.ajax({
                url: "/api/admin/addProductDetails",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                headers:{
                    'Authorization': 'Bearer '+sessionStorage.getItem("token"),
                },
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (response) {
                    $(".loader").hide();
                    // console.log(response);
                    if (response.msg == "success") {
                        successMessageSwitAlert("Product Added Successfully", "");
                        document.getElementById("formRegistration").reset();
                        viewData();
                    } else {
                        errorMessageSwitAlert(response.reason, "");
                    }
                },
            });
        }
    }
}

function viewData() {

    $.ajax({
        url: "/api/admin/viewProductDetails",
        type: "GET",
        headers:{
            'Authorization': 'Bearer '+sessionStorage.getItem("token"),
        },
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            // console.log(response);
            var tag = "";

            if ((response.msg = "success")) {
                JSONDATA = response.data;
                for (var i = 0; i < JSONDATA.length; i++) {
                    tag += "<tr>";
                    tag += '<td scope="row">' + (i + 1) + "</td>";
                    tag += "<td>" + JSONDATA[i]["productName"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["productCategory"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["productQuantityInStore"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["productOriginalPrice"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["productNewPrice"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["description"] + "</td>";
                    tag += '<td><img src="' + JSONDATA[i]["imageUrl"] + '" alt="" srcset="" height="80" width="80"></td>';
                    tag += '<td><button type="button" class="btn btn-sm btn-primary shadow shadow-lg rounded-0" onclick="editableData(`' + JSONDATA[i]["id"] + '`)"><i class="fas fa-pen" aria-hidden="true"></i></button>';
                    tag += '<button type="button" class="btn btn-sm btn-danger shadow shadow-lg rounded-0" onclick="deleteData(`' + JSONDATA[i]["id"] + '`, `' + JSONDATA[i]["productName"] + '`)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
                    tag += "</tr>";
                }
            }
            $("#example").DataTable().clear().destroy();
            document.getElementById("viewData").innerHTML = tag;
            dataTableInit("example");
        },
        // error: function (jqXHR, textStatus, errorThrown) {
        //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
        // },
    });
}

function editableData(id) {
    for (let i = 0; i < JSONDATA.length; i++) {
        if (id == JSONDATA[i]["id"]) {
            document.getElementById("productName").value = JSONDATA[i]["productName"];
            document.getElementById("productCategory").value = JSONDATA[i]["productCategory"];
            document.getElementById("productQuantityInStore").value = JSONDATA[i]["productQuantityInStore"];
            document.getElementById("productOriginalPrice").value = JSONDATA[i]["productOriginalPrice"];
            document.getElementById("productNewPrice").value = JSONDATA[i]["productNewPrice"];
            document.getElementById("description").value = JSONDATA[i]["description"];
            document.getElementById("hiddenProductPicture").value = JSONDATA[i]["productPicture"];
            document.getElementById("hiddenId").value = JSONDATA[i]["id"];
            document.getElementById("oldProductPicture").innerHTML = '<a href="' + JSONDATA[i]["imageUrl"] + '" class="btn btn-sm btn-warning text-decoration-none my-2" target="_blank">View Profile Picture<img src="' + JSONDATA[i]["imageUrl"] + '" alt="" srcset="" height="40" width="40"></a>';
            $("#saveBtn").hide();
            $("#updateBtn").show();
            $("#cancelBtn").show();
        }
    }
}

function cancelUpdate() {
    document.getElementById("formRegistration").reset();
    document.getElementById("oldProductPicture").innerHTML = "";
    $("#saveBtn").show();
    $("#updateBtn").hide();
    $("#cancelBtn").hide();
}

function updateData() {
    var ids = ["productName", "productCategory", "productQuantityInStore", "productOriginalPrice", "productNewPrice", "description"];
    var validationTypes = [["blank"], ["select_field"], ["blank", "number"], ["blank", "number"], ["blank", "number"], ["blank"]];
    var messages = [["Enter Product Name"], ["Select Product Category"], ["Enter Product Quantity in Store", "Enter Number Only"], ["Enter pPoduct Original Price", "Enter Number Only"], ["Enter Product New Price", "Enter Number Only"], ["Enter Description"]];
    var validationResponse = validate(ids, validationTypes, "error_div", messages);
    if (validationResponse == undefined) {
        if (document.getElementById("productPicture").files.length != 0) {
            var uploadFile = uploadFileFun("productPicture", ["jpg", "jpeg", "png"], "");
            var upload = "yes";
        } else {
            uploadFile = true;
            var upload = "no";
        }
        if (uploadFile != false) {
            var _token = $('input[name=_token]').val();
            var formData = new FormData();
            formData.append("productName", document.getElementById("productName").value);
            formData.append("productCategory", document.getElementById("productCategory").value);
            formData.append("productQuantityInStore", document.getElementById("productQuantityInStore").value);
            formData.append("productOriginalPrice", document.getElementById("productOriginalPrice").value);
            formData.append("productNewPrice", document.getElementById("productNewPrice").value);
            formData.append("id", document.getElementById("hiddenId").value);
            formData.append("description", document.getElementById("description").value);
            formData.append("hiddenProductPicture", document.getElementById("hiddenProductPicture").value);
            formData.append("productPicture", uploadFile);
            formData.append("upload", upload);
            // formData.append('_token', _token);
            $.ajax({
                url: "/api/admin/updateProductDetails",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                headers:{
                    'Authorization': 'Bearer '+sessionStorage.getItem("token"),
                },        
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (response) {
                    $(".loader").hide();
                    // console.log(response);
                    if (response.msg == "success") {
                        successMessageSwitAlert("Product Updated Successfully", "");
                        cancelUpdate();
                        viewData();
                    } else {
                        errorMessageSwitAlert(response.reason, "");
                    }
                },
                // error: function (jqXHR, textStatus, errorThrown) {
                //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
                // },
            });
        }
    }
}


function deleteData(id, name){
	Swal.fire({
		title: "Are you sure?",
		text: "Do you want to Delete "+name,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes",
	}).then((result) => {
		if (result.isConfirmed) {
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: "/api/admin/deleteProductDetails",
                type: "POST",
                data:{id:id, _token:_token},                
                headers:{
                    'Authorization': 'Bearer '+sessionStorage.getItem("token"),
                },
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (response) {
                    $(".loader").hide();
                    console.log(response);
                    viewData();
                },
                // error: function (jqXHR, textStatus, errorThrown) {
                //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
                // },
            });
        
		}
	});
}