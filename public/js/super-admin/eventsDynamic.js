$("#eventDate").datepicker({
    dateFormat:"yy-mm-dd"
})

viewData();
var JSONDATA = [];

function addData() {
    var ids = ["name", "eventDate", "description"];
    var validationTypes = [["blank"], ["blank"], ["blank"]];
    var messages = [["Enter Name"], ["Enter Event Date"], ["Enter Description"]];
    var validationResponse = validate(ids, validationTypes, "error_div", messages);
    if (validationResponse == undefined) {

        var uploadFile = uploadFileFun("uploadFile", ["jpg", "jpeg", "png"], "");
        if (uploadFile != false) {
            var _token = $('input[name=_token]').val();
            var formData = new FormData(
                document.getElementById("mainForm")
            );
            formData.append("uploadFile", uploadFile);
            formData.append('_token', _token);
            console.log(formData);

            $.ajax({
                url: "/api/super-admin/addEvent",
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
                        successMessageSwitAlert("Event Added Successfully", "");
                        document.getElementById("mainForm").reset();
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
        url: "/api/super-admin/viewEvent",
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
                    tag += "<td>" + JSONDATA[i]["name"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["eventDate"] + "</td>";
                    tag += "<td>" + JSONDATA[i]["description"] + "</td>";
                    tag += '<td><img src="' + JSONDATA[i]["imageUrl"] + '" alt="" srcset="" height="80" width="80"></td>';
                    tag += '<td><button type="button" class="btn btn-sm btn-primary shadow shadow-lg rounded-0" onclick="editableData(`' + JSONDATA[i]["id"] + '`)"><i class="fas fa-pen" aria-hidden="true"></i></button>';
                    tag += '<button type="button" class="btn btn-sm btn-danger shadow shadow-lg rounded-0" onclick="deleteData(`' + JSONDATA[i]["id"] + '`, `' + JSONDATA[i]["name"] + '`)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
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
            document.getElementById("name").value = JSONDATA[i]["name"];
            document.getElementById("eventDate").value = JSONDATA[i]["eventDate"];
            document.getElementById("description").value = JSONDATA[i]["description"];
            document.getElementById("hiddenUploadFile").value = JSONDATA[i]["uploadFile"];
            document.getElementById("hiddenId").value = JSONDATA[i]["id"];
            document.getElementById("oldUploadFile").innerHTML = '<a href="' + JSONDATA[i]["imageUrl"] + '" class="btn btn-sm btn-warning text-decoration-none my-2" target="_blank">View Profile Picture<img src="' + JSONDATA[i]["imageUrl"] + '" alt="" srcset="" height="40" width="40"></a>';
            $("#saveBtn").hide();
            $("#updateBtn").show();
            $("#cancelBtn").show();
        }
    }
}

function cancelUpdate() {
    document.getElementById("mainForm").reset();
    document.getElementById("oldUploadFile").innerHTML = "";
    $("#saveBtn").show();
    $("#updateBtn").hide();
    $("#cancelBtn").hide();
}

function updateData() {
    var ids = ["name", "eventDate", "description"];
    var validationTypes = [["blank"], ["blank"], ["blank"]];
    var messages = [["Enter Name"], ["Enter Event Date"], ["Enter Description"]];
    var validationResponse = validate(ids, validationTypes, "error_div", messages);
    if (validationResponse == undefined) {
        var uploadFile = uploadFileFun("uploadFile", ["jpg", "jpeg", "png"], "");
        if (uploadFile != false) {
            var _token = $('input[name=_token]').val();
            var formData = new FormData();
            formData.append("name", document.getElementById("name").value);
            formData.append("eventDate", document.getElementById("eventDate").value);
            formData.append("id", document.getElementById("hiddenId").value);
            formData.append("description", document.getElementById("description").value);
            formData.append("uploadFile", uploadFile);
            formData.append('_token', _token);
            $.ajax({
                url: "/api/super-admin/updateEvent",
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
                        successMessageSwitAlert("Event Updated Successfully", "");
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
                url: "/api/super-admin/deleteEvent",
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
                    if(response.msg == 'success'){
                        successMessageSwitAlert("Event Deleted Successfully", "");
                        viewData();
                    }else{
                        errorMessageSwitAlert(response.reason, "");
                    }
                },
                // error: function (jqXHR, textStatus, errorThrown) {
                //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
                // },
            });
        
		}
	});
}