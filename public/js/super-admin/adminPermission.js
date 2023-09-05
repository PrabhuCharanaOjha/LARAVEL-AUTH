multiSelectInitialization();
viewData();
function multiSelectInitialization(){
    $(".select2").select2();
	$(".select2bs4").select2({
		theme: "bootstrap4",
	});
}

function addData() {
    var adminPermission = $("#adminPermission").select2("val");
    if(adminPermission.length == 0){
        error("Please Select Permission");
        $("#adminPermission").focus();
        return false;
    }
    console.log(adminPermission);
    adminPermission = JSON.stringify(adminPermission);
    // console.log(mainArr);
    // return false;
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/api/super-admin/addDynamicTableDetails",
        type: "POST",
        data: { name: "adminPermission", description: adminPermission, _token: _token },
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
                successMessageSwitAlert("Permission Added Successfully", "");
                document.getElementById("mainForm").reset();
                viewData();
                cancelUpdate();
            } else {
                errorMessageSwitAlert(response.reason[0], "");
            }
        },
        // error: function (jqXHR, textStatus, errorThrown) {
        //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
        // },
    });

}

function viewData() {
    $.ajax({
        url: "/api/super-admin/viewDynamicTableDetails",
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
                    if (JSONDATA[i]["name"] == 'adminPermission') {
                        var description = JSON.parse(JSON.parse(JSONDATA[i]["description"]));
                        // console.log(description)
                        for (let j = 0; j < description.length; j++) {
                            tag += "<tr>";
                            tag += '<td scope="row">' + (j + 1) + "</td>";
                            tag += "<td>" + description[j] + "</td>";
                            tag += "</tr>";
                        }
                        document.getElementById("hiddenId").value = JSONDATA[i]["id"];
                    }
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

function editableData() {
    for (var i = 0; i < JSONDATA.length; i++) {
        if (JSONDATA[i]["name"] == 'adminPermission') {
            var description = JSON.parse(JSON.parse(JSONDATA[i]["description"]));
            $("#adminPermission").val(description);
            $("#adminPermission").trigger("change");
            document.getElementById("hiddenId").value = JSONDATA[i]["id"];
            $("#saveBtn").hide();
            $("#updateBtn").show();
            $("#cancelBtn").show();
        }
    }
}

function cancelUpdate() {
    document.getElementById("mainForm").reset();
    $("#adminPermission").val([]);
    $("#adminPermission").trigger("change");
    $("#saveBtn").show();
    $("#updateBtn").hide();
    $("#cancelBtn").hide();
}

function updateData() {
    var adminPermission = $("#adminPermission").select2("val");
    if(adminPermission.length == 0){
        error("Please Select Permission");
        $("#adminPermission").focus();
        return false;
    }
    // console.log(adminPermission);
    adminPermission = JSON.stringify(adminPermission);
    var id = document.getElementById("hiddenId").value;
    // console.log(mainArr);
    // return false;
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/api/super-admin/updateDynamicTableDetails",
        type: "POST",
        data: { name: "adminPermission", description: adminPermission, id:id, _token: _token },
        headers:{
            'Authorization': 'Bearer '+sessionStorage.getItem("token"),
        },        
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            if (response.msg == "success") {
                successMessageSwitAlert("Permission Updated Successfully", "");
                document.getElementById("mainForm").reset();
                viewData();
                cancelUpdate();
            } else {
                errorMessageSwitAlert(response.reason[0], "");
            }
        },
        // error: function (jqXHR, textStatus, errorThrown) {
        //     console.log("AJAX Error:", jqXHR, textStatus, errorThrown);
        // },
    });

}


function deleteData() {
    var id = document.getElementById("hiddenId").value;
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to Delete",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: "/api/super-admin/deleteDynamicTableDetails",
                type: "POST",
                data: { id: id, _token: _token },
                headers:{
                    'Authorization': 'Bearer '+sessionStorage.getItem("token"),
                },        
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (response) {
                    $(".loader").hide();
                    // console.log(response);
                    if (response.msg == 'success') {
                        successMessageSwitAlert("Permission Deleted Successfully", "");
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
    });
}