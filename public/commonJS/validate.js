// *************************************************************************
// Name-Puja Agarwala
// Date-27/07/2019
// Details-The below function is to check whether a field is empty or not.
// *************************************************************************
function blank_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;
	if (field_val.trim() == "") {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		// console.log('err_'+id);
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			// console.log('err_'+id);
			document.getElementById("err_" + id).innerHTML = "";
		}

		return true;
	}
}

// *************************************************************************
// Name-Puja Agarwala
// Date-27/07/2019
// Details-The below function is to check whether a field is empty or not.
// *************************************************************************
function select_field_validation(id, err_msg, msg) {
	// console.log(id);
	var field_val = document.getElementById(id).value;
	if (field_val.trim() == 0) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}

// *************************************************************************
// Name-Puja Agarwala
// Date-27/07/2019
// Details-The below function to check whether a email is valid or not
// *************************************************************************
function email_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	var re =
		/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}

// *************************************************************************
// Name-Puja Agarwala
// Date-27/07/2019
// Details-The below function is for number validation i.e a field can only accept numbers.
// *************************************************************************
function number_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	// var re = /^\d+$/;
	var re = /^(\s*|\d+)$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}

// *************************************************************************
// Name-Puja Agarwala
// Date-27/07/2019
// Details-The below function is to validate mobile number.
// *************************************************************************
function mobile_number_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	var re = /^\d{10}$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}
function adhar_number_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	var re = /^\d{16}$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}
// *************************************************************************
// Name-Puja Agarwala
// Date-31/07/2019
// Details-The below function is for space validation(for field which doesnot allow any space) .
// *************************************************************************
function space_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	if (field_val.indexOf(" ") > 0) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}
// *************************************************************************
// Name-Puja Agarwala
// Date-31/07/2019
// Details-The below function is for restrict special characters .
// *************************************************************************
function special_character_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	var re = /^[a-zA-Z0-9 ]+$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}

// *************************************************************************
// Name-Puja Agarwala
// Date-31/07/2019
// Details- Validate the password field which must contain atleast one upper case one lower case ,one special character and one number and its length mustbe greater than 6
// *************************************************************************
function high_password_validation(id, err_msg, msg) {
	var field_val = document.getElementById(id).value;

	var re =
		/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

	if (!re.test(field_val)) {
		// document.getElementById(err_msg).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	} else {
		var get_availability = $("div").hasClass("div_err_msg");
		// console.log(get_availability);
		if (get_availability == true) {
			document.getElementById("err_" + id).innerHTML = "";
		}
		return true;
	}
}
// *************************************************************************
// Name-Puja Agarwala
// Date-29/07/2019
// Details-The below function is for space validation(for field which doesnot allow any space) .
// *************************************************************************
function validate(ids, types, msg_div, msgs) {
	for (var i = 0; i < ids.length; i++) {
		for (var j = 0; j < types[i].length; j++) {
			var get_availability = $("div").hasClass("div_err_msg");
			// console.log(get_availability);
			if (get_availability == true) {
				$(".div_err_msg").remove();
			}
			// alert(i);
			//check the field is blank or not
			if (types[i][j] == "blank") {
				if (!blank_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			//check the mobile number is valid or not
			else if (types[i][j] == "email") {
				if (!email_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			// //check the mobile number is valid or not
			else if (types[i][j] == "mobile") {
				if (!mobile_number_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			//  //check the mobile number is valid or not
			else if (types[i][j] == "number") {
				if (!number_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			//check the field should not allow any space
			else if (types[i][j] == "nospace") {
				if (!space_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			//check the field should not allow any special character
			else if (types[i][j] == "no_special_char") {
				if (!special_character_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}

			//validate the password field which must contain atleast one upper case one lower case ,one special character and one number and its length mustbe greater than 6
			else if (types[i][j] == "high_password") {
				if (!high_password_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			} else if (types[i][j] == "select_field") {
				if (!select_field_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			} else if (types[i][j] == "adhar") {
				if (!adhar_number_validation(ids[i], msg_div, msgs[i][j])) {
					dynamic_err_div(ids[i], msgs[i][j]);
					return false;
				}
			}
		}
	}
}

function dynamic_err_div(get_id, get_msg) {
	//   var get_availability = $('div').hasClass('div_err_msg');
	// // console.log(get_availability);
	// if(get_availability==true)
	// {
	//   $( ".div_err_msg" ).remove();
	// }
	//   var err_div = "<div id='err_"+get_id+"' name='err_"+get_id+"' class='div_err_msg'>"+get_msg+"</div>";
	//   $(err_div).insertAfter('#'+get_id);
	//   setTimeout(function(){
	//   $( ".div_err_msg" ).remove();
	//   }, 3000);
	//   return false;

	error(get_msg);
}

//get name of a id
var get_auto_id_data;
function get_name_from_id(table_name, field_id) {
	var get_all_user_type = {
		table_name: table_name,
		field_id: field_id,
		action: "get_field_name",
	};
	$.ajax({
		url: "include/common.php",
		type: "POST",
		data: get_all_user_type,
		beforeSend: function () {
			$(".loader").show();
		},
		async: false,
		success: function (response) {
			$(".loader").hide();

			// console.log(response);
			var jsonobj = JSON.parse(response);
			get_auto_id_data = jsonobj;
		},
	});
}
