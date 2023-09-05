function register(){
    var ids = [ "name", "email", "password", "c_password", "mobile", "age", "description"];
    var validationTypes = [ ["blank"], ["blank", "email"], ["blank"], ["blank"], ["blank", "mobile"], ["blank", "number"], ["blank"] ];
    var messages = [
        ["Enter Name"], ["Enter Email", "Enter Valid Email"], ["Enter Password"], ["Enter Password"], ["Enter Mobile Number", "Enter Valid Mobile Number"], ["Enter Age", "Enter Number Only"], ["Enter Description"] ];
    var validationResponse = validate( ids, validationTypes, "error_div", messages );
    if (validationResponse == undefined) {
        var password = document.getElementById("password").value;
        var c_password = document.getElementById("c_password").value;

        if (password === c_password) {
            var password = password;
        } else {
            error("Password not match...");
            return false;
        }

        var uploadFile = uploadFileFun( "profilePicture", ["jpg", "jpeg", "png"], "");
        if (uploadFile != false) {
            var _token = $('input[name=_token]').val();
            var formData = new FormData(
                document.getElementById("formRegistration")
            );
            formData.append("profilePicture", uploadFile);
            formData.append("userType", 3);
            formData.append('_token', _token);
            // console.log(formData);

            $.ajax({
                url: "/register",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (response) {
                    $(".loader").hide();
                    // console.log(response);
                    if (response.msg == "success") {
                        successMessageSwitAlert( "User Created Successfully", "" );
                        document.getElementById("formRegistration").reset();
                    } else {
                        for (let i = 0; i < response.reason.length; i++) {
                            errorMessageSwitAlert(response.reason[i], "");                            
                        }
                    }
                },
            });
        }
    }
    
}

function login(){
    var ids=["email", "password"];
    var validationTypes=[["blank", "email"],["blank"]];
    var messages=[["Enter Your Email", "Enter Valid Email"], ["Enter Your Password"]];
    var validationResponse = validate(ids, validationTypes, "error_div", messages);
    if(validationResponse == undefined){
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"/api/login",
            data:{email:email, password:password, _token:_token},
            type:"POST",
            beforeSend: function(){
                $("#loader").show();
            },
            success: function(response)
            {
                $("#loader").hide();
                console.log(response);
                if(response.msg == 'success'){
                    successMessageSwitAlert('Login Successfully', 'Redirect to Dashboard');
                    sessionStorage.setItem("token", response.token);
                    location.href = response.route;
                }else{
                    errorMessageSwitAlert("Failed to Login", "Enter Valid Email Password");
                }
            }
        })
    }
}

function logout(){
	Swal.fire({
		title: "Are you sure?",
		text: "Do you want to logout",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes",
	}).then((result) => {
		if (result.isConfirmed) {
            
            $.ajax({
                url:"/api/login",
                type:"POST",
                headers:{
                    'Authorization': 'Bearer '+sessionStorage.getItem("token"),
                },        
                beforeSend: function(){
                    $("#loader").show();
                },
                success: function(response)
                {
                    $("#loader").hide();
                    sessionStorage.clear();
                    location.href = '/';
                    // console.log(response);
                }
            })
		}
	});
}