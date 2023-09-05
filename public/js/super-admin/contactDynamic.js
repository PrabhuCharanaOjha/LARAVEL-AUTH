
viewData();

var ROWCOUNT = 0;
var ROWCOUNTARR = [0];
var JSONDATA = [];

function addRow() {
    ROWCOUNT++
    ROWCOUNTARR.push(ROWCOUNT);
    var tag = '';
    tag += '<div class="row" id="rowId_' + ROWCOUNT + '">';
    tag += '<div class="col-5">';
    tag += '<div class="form-group my-2">';
    tag += '<label for="name"> Heading</label>';
    tag += '<input type="text" name="heading_' + ROWCOUNT + '" id="heading_' + ROWCOUNT + '" class="form-control" placeholder="Enter Heading Name" aria-describedby="helpId">';
    tag += '</div>';
    tag += '</div>';
    tag += '<div class="col-5">';
    tag += '<div class="form-group my-2">';
    tag += '<label for="mobile">Description</label>';
    tag += '<textarea class="form-control" name="description_' + ROWCOUNT + '" id="description_' + ROWCOUNT + '" rows="1"></textarea>';
    tag += '</div>';
    tag += '</div>';
    tag += '<div class="col-2">';
    tag += '<button type="button" id="removeRowBtn" class="btn btn-danger btn-sm border-dark mt-4" onclick="removeRow(' + ROWCOUNT + ')"><i class="fa fa-minus" aria-hidden="true"></i></button>';
    tag += '</div>';
    tag += '</div>';

    document.getElementById("multiRow").insertAdjacentHTML("beforeend", tag);
}

function removeRow(itemToRemoveId) {
    var row = document.getElementById("rowId_" + itemToRemoveId);
    row.parentNode.removeChild(row);
    ROWCOUNTARR = ROWCOUNTARR.filter((item) => item !== parseInt(itemToRemoveId));
}

function addData() {
    // console.log(ROWCOUNTARR);

    for (let i = 0; i < ROWCOUNTARR.length; i++) {
        if (document.getElementById("heading_" + ROWCOUNTARR[i]).value == "") {
            error("Please Enter The value of Heading");
            $("#heading_" + ROWCOUNTARR[i]).focus();
            return false;
        }
        if (document.getElementById("description_" + ROWCOUNTARR[i]).value == "") {
            error("Please Enter The value of Description");
            $("#description_" + ROWCOUNTARR[i]).focus();
            return false;
        }
    }

    var mainArr = [];

    for (let i = 0; i < ROWCOUNTARR.length; i++) {
        var subArr = {
            heading: document.getElementById("heading_" + ROWCOUNTARR[i]).value,
            description: document.getElementById("description_" + ROWCOUNTARR[i]).value,
        }
        mainArr.push(subArr);
    }
    mainArr = JSON.stringify(mainArr);
    // console.log(mainArr);
    // return false;
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/api/super-admin/addDynamicTableDetails",
        type: "POST",
        data: { name: "contactPage", description: mainArr, _token: _token },
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
                successMessageSwitAlert("Contact Added Successfully", "");
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
                    if (JSONDATA[i]["name"] == 'contactPage') {
                        var description = JSON.parse(JSON.parse(JSONDATA[i]["description"]));
                        for (let j = 0; j < description.length; j++) {
                            tag += "<tr>";
                            tag += '<td scope="row">' + (j + 1) + "</td>";
                            tag += "<td>" + description[j]['heading'] + "</td>";
                            tag += "<td>" + description[j]['description'] + "</td>";
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
        if (JSONDATA[i]["name"] == 'contactPage') {
            ROWCOUNT = 0;
            ROWCOUNTARR = [];
            var tag = '';

            var description = JSON.parse(JSON.parse(JSONDATA[i]["description"]));
            for (let j = 0; j < description.length; j++) {
                ROWCOUNT++
                ROWCOUNTARR.push(ROWCOUNT);

                tag += '<div class="row" id="rowId_' + ROWCOUNT + '">';
                tag += '<div class="col-5">';
                tag += '<div class="form-group my-2">';
                tag += '<label for="name"> Heading</label>';
                tag += '<input type="text" name="heading_' + ROWCOUNT + '" id="heading_' + ROWCOUNT + '" value="' + description[j]['heading'] + '" class="form-control" placeholder="Enter Heading Name" aria-describedby="helpId">';
                tag += '</div>';
                tag += '</div>';
                tag += '<div class="col-5">';
                tag += '<div class="form-group my-2">';
                tag += '<label for="mobile">Description</label>';
                tag += '<textarea class="form-control" name="description_' + ROWCOUNT + '" id="description_' + ROWCOUNT + '" rows="1">' + description[j]['description'] + '</textarea>';
                tag += '</div>';
                tag += '</div>';
                tag += '<div class="col-2">';
                if (j == 0) {
                    tag += '<button type="button" id="addRowBtn" class="btn btn-success btn-sm border-dark mt-4" onclick="addRow();"><i class="fa fa-plus" aria-hidden="true"></i></button>';
                } else {
                    tag += '<button type="button" id="removeRowBtn" class="btn btn-danger btn-sm border-dark mt-4" onclick="removeRow(' + ROWCOUNT + ')"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                }
                tag += '</div>';
                tag += '</div>';
            }
            document.getElementById("multiRow").innerHTML = tag;
            document.getElementById("hiddenId").value = JSONDATA[i]["id"];
            $("#saveBtn").hide();
            $("#updateBtn").show();
            $("#cancelBtn").show();
        }
    }
}

function cancelUpdate() {
    ROWCOUNT = 0;
    ROWCOUNTARR = [0];
    document.getElementById("mainForm").reset();
    document.getElementById("multiRow").innerHTML = '<div class="row" id="rowId_0"><div class="col-5"><div class="form-group my-2"><label for="name"> Heading</label><input type="text" name="heading_0" id="heading_0" class="form-control" placeholder="Enter Heading Name" aria-describedby="helpId"></div></div><div class="col-5"><div class="form-group my-2"><label for="mobile">Description</label><textarea class="form-control" name="description_0" id="description_0" rows="1"></textarea></div></div><div class="col-2"><button type="button" id="addRowBtn" class="btn btn-success btn-sm border-dark mt-4" onclick="addRow();"><i class="fa fa-plus" aria-hidden="true"></i></button></div></div>';
    $("#saveBtn").show();
    $("#updateBtn").hide();
    $("#cancelBtn").hide();
}

function updateData() {
    for (let i = 0; i < ROWCOUNTARR.length; i++) {
        if (document.getElementById("heading_" + ROWCOUNTARR[i]).value == "") {
            error("Please Enter The value of Heading");
            $("#heading_" + ROWCOUNTARR[i]).focus();
            return false;
        }
        if (document.getElementById("description_" + ROWCOUNTARR[i]).value == "") {
            error("Please Enter The value of Description");
            $("#description_" + ROWCOUNTARR[i]).focus();
            return false;
        }
    }

    var mainArr = [];

    for (let i = 0; i < ROWCOUNTARR.length; i++) {
        var subArr = {
            heading: document.getElementById("heading_" + ROWCOUNTARR[i]).value,
            description: document.getElementById("description_" + ROWCOUNTARR[i]).value,
        }
        mainArr.push(subArr);
    }
    mainArr = JSON.stringify(mainArr);
    var id = document.getElementById("hiddenId").value;
    // console.log(mainArr);
    // return false;
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: "/api/super-admin/updateDynamicTableDetails",
        type: "POST",
        data: { name: "contactPage", description: mainArr, id:id, _token: _token },
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
                successMessageSwitAlert("Contact Updated Successfully", "");
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
                        successMessageSwitAlert("Contact Deleted Successfully", "");
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