document.addEventListener("DOMContentLoaded", function(event) { 
	document.getElementById("button").onclick = function(){
		if (document.getElementsByName("newpassword")[0].value.match('^[a-zA-Z]+$')!==null){//('/[^a-zA-Z0-9 -]/ig')==null){
			return true;
		}
		else {
			alert('pole dolzhno soderjat tolko latinitcu\n' + document.getElementById("confirmnewpassword").value);
			return false;
		}
	}
});