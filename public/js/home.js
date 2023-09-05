viewBanner();
viewEvents();
viewGallery();
viewTeam();
viewTestimonial();
viewContactAndFooter();

function viewBanner() {
    $.ajax({
        url: "/api/viewBanner",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            var tag = "";
            if ((response.msg = "success")) {
                var JSONDATABANNER = response.data;
                for (var i = 0; i < JSONDATABANNER.length; i++) {                    
                    $(".bannerBackGround").css("background-image", "url(" + JSONDATABANNER[i]['imageUrl'] + ")");
                }
            }
        },
    });
}

function viewEvents() {
    $.ajax({
        url: "/api/viewEvent",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            if ((response.msg = "success")) {
                var tag = "";
                var JSONDATAEVENT = response.data;
                for (var i = 0; i < JSONDATAEVENT.length; i++) {
                    tag +='<div class="item">';
                    tag +='<img src="' + JSONDATAEVENT[i]["imageUrl"] + '" alt="images not found">';
                    tag +='<div class="cover">';
                    tag +='<div class="container">';
                    tag +='<div class="header-content">';
                    tag +='<div class="line"></div>';
                    tag +='<h2>' + JSONDATAEVENT[i]["eventDate"] + '</h2>';
                    tag +='<h1>' + JSONDATAEVENT[i]["name"] + '</h1>';
                    tag +='<h4>' + JSONDATAEVENT[i]["description"] + '</h4>';
                    tag +='</div>';
                    tag +='</div>';
                    tag +='</div>';
                    tag +='</div>';
                }
                document.getElementById("owl-carousel-event").innerHTML = tag;
                eventOwlCarasoulInit();
            }
            
        },
    });
}

function viewGallery() {
    $.ajax({
        url: "/api/viewGallery",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            if ((response.msg = "success")) {
                var tag = "";
                var JSONDATAGALLERY = response.data;
                for (var i = 0; i < JSONDATAGALLERY.length; i++) {
                    tag +='<div class="col-sm-3 img-hover-zoom img-hover-zoom--colorize">';
                    tag +='<img src="' + JSONDATAGALLERY[i]["imageUrl"] + '" alt="" srcset="" class="img-fluid p-5">';
                    tag +='</div>';
                }
                document.getElementById("galleryId").innerHTML = tag;
            }
        },
    });
}

function viewTeam() {
    $.ajax({
        url: "/api/viewTeam",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            if ((response.msg = "success")) {
                var tag = "";
                var JSONDATATEAM = response.data;
                for (var i = 0; i < JSONDATATEAM.length; i++) {
                    tag +='<div class="item" style="background-image: url(' + JSONDATATEAM[i]["imageUrl"] + ');">';
                    tag +='<div class="item-desc">';
                    tag +='<h3>' + JSONDATATEAM[i]["name"] + '</h3>';
                    tag +='<p>' + JSONDATATEAM[i]["description"] + '</p>';
                    tag +='</div>';
                    tag +='</div>';
                }
                document.getElementById("teamId").innerHTML = tag;
                ourTeamCarasoulInit();
            }
        },
    });
}

function viewTestimonial() {
    $.ajax({
        url: "/api/viewTestimonial",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            if ((response.msg = "success")) {
                var tag = "";
                var JSONDATATESTIMONIAL = response.data;
                for (var i = 0; i < JSONDATATESTIMONIAL.length; i++) {
                    tag +='<div class="item">';
                    tag +='<div class="shadow-effect">';
                    tag +='<img class="img-circle" src="' + JSONDATATESTIMONIAL[i]["imageUrl"] + '" alt="">';
                    tag +='<p>' + JSONDATATESTIMONIAL[i]["description"] + '</p>';
                    tag +='</div>';
                    tag +='<div class="testimonial-name">' + JSONDATATESTIMONIAL[i]["name"] + '</div>';
                    tag +='</div>';
                }
                document.getElementById("customers-testimonials").innerHTML = tag;
                tesimoniaOwlCarasoulInit();
            }
        },
    });
}

function viewContactAndFooter() {
    $.ajax({
        url: "/api/viewDynamicTableDetails",
        type: "GET",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $(".loader").hide();
            console.log(response);
            var tag = "";
            if ((response.msg = "success")) {
                var JSONDATA = response.data;
                for (var i = 0; i < JSONDATA.length; i++) {

                }
            }
        },
    });
}