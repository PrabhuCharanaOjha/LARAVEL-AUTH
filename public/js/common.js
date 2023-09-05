// =========================================================================================
// Name- Prabhu Charan Ojha
// Date- 13-04-2023
// Details- The below code is for initialize toaster
// ==========================================================================================
var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
});

// =========================================================================================
// Name- Prabhu Charan Ojha
// Date- 13-04-2023
// Details- The below function is for success message
// ==========================================================================================
function success(title) {
    Toast.fire({
        icon: "success",
        title: title,
    });
}
// =========================================================================================
// Name- Prabhu Charan Ojha
// Date- 13-04-2023
// Details- The below function is for error message
// ==========================================================================================
function error(title) {
    Toast.fire({
        icon: "error",
        title: title,
    });
}

// =========================================================================================
// Name- Prabhu Charan Ojha
// Date- 20-02-2023
// Details- The below function is for initialize datatable
// ==========================================================================================
function dataTableInit(tableName) {
    $("#" + tableName).DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "print", "colvis"],
        rowReorder: {
            selector: 'td:nth-child(2)'
        }
    });
}

// ==================================================
// Name: Prabhu charan ojha
// Date: 24-04-2023
// Details: file check function
// ===================================================
function uploadFileFun(id, fileExt, fileSize) {
    var image = $("#" + id).prop("files")[0];
    var checkFileData = document.getElementById(id);
    var ext = $("#" + id)
        .val()
        .split(".")
        .pop()
        .toLowerCase();
    if (checkFileData.files.length == 0) {
        error("Upload File");
        document.getElementById(id).focus();
        return false;
    }
    if ($.inArray(ext, fileExt) == -1) {
        var fileEx = "";
        for (let i = 0; i < fileExt.length; i++) {
            fileEx += fileExt[i].toUpperCase() + ", ";
        }
        error("Only " + fileEx + " Files Allow");
        document.getElementById(id).focus();
        return false;
    }
    if (fileSize != "") {
        var fileSizeBytes = parseInt(fileSize) * 1000000;
        if (image.size > parseInt(fileSizeBytes)) {
            error("file size must be in " + fileSize + " MB");
            document.getElementById(id).focus();
            return false;
        }
    }
    return image;
}

// ==================================================
// Name: Prabhu charan ojha
// Date: 24-04-2023
// Details: For success alert message
// ==================================================
function successMessageSwitAlert(message, subMessage) {
    Swal.fire(message, subMessage, "success");
}

// ==================================================
// Name: Prabhu charan ojha
// Date: 24-04-2023
// Details: For error alert message
// ==================================================
function errorMessageSwitAlert(message, subMessage) {
    Swal.fire(message, subMessage, "error");
}

productOwlCarasoulInit();
function productOwlCarasoulInit() {
    $("#news-slider").owlCarousel({
        autoplay: true,
        autoplayTimeout: 2000,
        rewind: true,
        items: 3,
        navigation: true,
        navigationText: ["", ""],
        pagination: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1170: {
                items: 3,
            },
        },
    });
}
tesimoniaOwlCarasoulInit();
function tesimoniaOwlCarasoulInit() {
    $("#customers-testimonials").owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 2000,
        dots: true,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1170: {
                items: 3,
            },
        },
    });
}

eventOwlCarasoulInit();
function eventOwlCarasoulInit() {
    $("#owl-carousel-event").owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        mouseDrag: false,
        autoplay: true,
        animateOut: "slideOutUp",
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
}

ourTeamCarasoulInit();
function ourTeamCarasoulInit() {
    $(".custom-carousel").owlCarousel({
        autoWidth: true,
        loop: true,
    });

    $(".custom-carousel .item").click(function () {
        $(".custom-carousel .item").not($(this)).removeClass("active");
        $(this).toggleClass("active");
    });
}
