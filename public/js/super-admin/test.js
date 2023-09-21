$("#startDate_0").datepicker({
    format: "yyyy-mm-dd"
})

var ROWCOUNT = 0;
var ROWCOUNTARR = [0];
var JSONDATA = [];

function addRow() {
    ROWCOUNT++
    ROWCOUNTARR.push(ROWCOUNT);
    var tag = '';
    tag += '<tr id="rowId_' + ROWCOUNT + '">';
    tag += '<td scope="row">' + ROWCOUNT + '</td>';
    tag += '<td>';
    tag += '<div class="form-group my-2">';
    tag += '<input type="text" name="startDate_' + ROWCOUNT + '" id="startDate_' + ROWCOUNT + '" class="form-control" aria-describedby="helpId" onchange="initializeDatePicker(`startDate_' + ROWCOUNT + '`, `endDate_' + ROWCOUNT + '`)">';
    tag += '</div>';
    tag += '</td>';
    tag += '<td>';
    tag += '<div class="form-group my-2">';
    tag += '<input type="text" name="endDate_' + ROWCOUNT + '" id="endDate_' + ROWCOUNT + '" class="form-control" aria-describedby="helpId" onchange="initializeDatePicker(`endDate_' + ROWCOUNT + '`, `newDate_' + ROWCOUNT + '`)" disabled>';
    tag += '</div>';
    tag += '</td>';
    tag += '<td>';
    tag += '<div class="form-group my-2">';
    tag += '<input type="text" name="newDate_' + ROWCOUNT + '" id="newDate_' + ROWCOUNT + '" class="form-control" aria-describedby="helpId" disabled>';
    tag += '</div>';
    tag += '</td>';
    tag += '<td>';
    tag += '<button type="button" class="btn btn-danger" onclick="removeRow(' + ROWCOUNT + ')"><i class="fa fa-minus" aria-hidden="true"></i></button>';
    tag += '</td>';
    tag += '</tr>';
    document.getElementById("multiRow").insertAdjacentHTML("beforeend", tag);
    $("#startDate_" + ROWCOUNT).datepicker({
        format: "yyyy-mm-dd"
    })
}

function removeRow(itemToRemoveId) {
    var row = document.getElementById("rowId_" + itemToRemoveId);
    row.parentNode.removeChild(row);
    ROWCOUNTARR = ROWCOUNTARR.filter((item) => item !== parseInt(itemToRemoveId));
}

function initializeDatePicker(id1, id2) {
    // console.log(document.getElementById(id1).value);
    var date = new Date(document.getElementById(id1).value);
    date.setDate(date.getDate() + 3);
    var givenDate = new Date(date);
    var year = givenDate.getFullYear();
    var month = String(givenDate.getMonth() + 1).padStart(2, '0');
    var day = String(givenDate.getDate()).padStart(2, '0');
    var formattedDate = `${year}-${month}-${day}`;
    document.getElementById(id2).value = "";
    $('#' + id2).prop("disabled", false);
    $('#' + id2).datepicker('destroy');
    $('#' + id2).datepicker({
        format: "yyyy-mm-dd",
        startDate: formattedDate,
    })

}


function addData() {

    // $("#mainForm").validate({
    //     rules: {
    //         userName: {
    //             required: true,
    //             minlength: 5
    //         },
    //         userEmail: {
    //             required: true,
    //             email: true
    //         }
    //     },
    //     messages: {
    //         username: {
    //             required: "Please enter a username",
    //             minlength: "Username must be at least 5 characters long"
    //         },
    //         email: {
    //             required: "Please enter an email address",
    //             email: "Please enter a valid email address"
    //         }
    //     },
    //     errorElement: "span", // Display error messages as <span>
    //     errorPlacement: function (error, element) {
    //         error.appendTo(element.parent()); // Place error messages next to the input fields
    //     }
    // });

    // $("#mainForm").validate();

    var mainArr = [];
    for (let i = 0; i < ROWCOUNTARR.length; i++) {
        var subArr = {
            startDate:document.getElementById('startDate_'+ROWCOUNTARR[i]).value,
            endDate:document.getElementById('endDate_'+ROWCOUNTARR[i]).value,
            newDate:document.getElementById('newDate_'+ROWCOUNTARR[i]).value,
        }
        mainArr.push(subArr);        
    }
    mainArr = JSON.stringify(mainArr);
    console.log(mainArr);
    var userName = document.getElementById("userName").value;
    $.ajax({
        url:'/api/super-admin/testDataAdd',
        type:'POST',
        data:{mainArr:mainArr, userName:userName},
        headers:{
            'Authorization': 'Bearer '+sessionStorage.getItem("token"),
        },
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            // if (response.msg == "success") {
            //     successMessageSwitAlert("Data Added Successfully", "");
            //     document.getElementById("mainForm").reset();
            //     viewData();
            // } else {
            //     errorMessageSwitAlert(response.reason, "");
            // }
        },
    })
}