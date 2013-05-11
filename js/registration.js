$(document).ready( function () {

	$("#username").keyup(checkValue);
	$("#year").keyup(checkYear);
	$("#name").keyup(checkName);
	$("#major").keyup(checkMajor);
} );


function checkValue() {
	
	var userName = $("#username").val();
	var mydata = { UserName : userName };
	
	request = $.ajax({
		url: "userNameCheck.php",
		type: "get",
		data: mydata,
		dataType: "json"
	});
	
	return request.done(processValue);

}
var canSubmit = false;
function processValue(json) {
	
	// Check that the returned string is the initial string of
	// the user's input thus far
	$("#UNerror").css("display", "inline");
	
	
	if (json.taken == "1") {
		$("#UNerror").css("display", "inline");
		canSubmit = false;
	}
	else {
		$("#UNerror").css("display", "none");
		canSubmit = true;
	} 
}

function trim(str)
{
  return str.replace(/^\s+|\s+$/g, '')
};

function validAll(){
	if (!((canSubmit)&&checkYear()&&checkMajor()&&checkName())) {
		$("#formError").css("display", "inline");
	}
	return canSubmit && checkYear() &&checkMajor() &&checkName();
}
 function checkYear() {
	 var year = $("#year").val();
	 var curYear = new Date().getFullYear();
	 if(((year-curYear<=4) && (year-curYear>0))){
		 $("#YearError").css("display", "none");
		 return true;
	 }
	 else {
		 $("#YearError").css("display", "inline");
		 return false;
	 }
 }
 function checkName() {
	 var name = $("#name").val();
	 var regExp=new RegExp("^[a-zA-Z ]+$");
	 var valid = regExp.test(name);

	 if(valid){
		 $("#nameError").css("display", "none");
		 return true;
	 }
	 else {
		 $("#nameError").css("display", "inline");
		 return false;
	 }
 }
 function checkMajor() {
	 var major = $("#major").val();
	 var regExp=new RegExp("^[a-zA-Z ]+$");
	 var valid = regExp.test(major);

	 if(valid){
		 $("#majorError").css("display", "none");
		 return true;
	 }
	 else {
		 $("#majorError").css("display", "inline");
		 return false;
	 }
 }


