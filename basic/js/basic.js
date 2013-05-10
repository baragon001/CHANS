/*
 * SimpleModal Basic Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */

$(document).ready( function () {

	$("#userName").keyup(checkValue);
	
} );

jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
});



function checkValue() {
	
	var userName = $("#userName").val();
	var mydata = { UserName : userName };
	
	request = $.ajax({
		url: "userNameCheck.php",
		type: "get",
		data: mydata,
		dataType: "json"
	});
	
	request.done(processValue);

}

function processValue(json) {
	
	// Check that the returned string is the initial string of
	// the user's input thus far
	if (json["taken"] == "1") {
		$('.error').css("display", "inline");
	}
	else {
		$('.error').css("display", "none");
	}
	
}

function trim(str)
{
  return str.replace(/^\s+|\s+$/g, '')
};
