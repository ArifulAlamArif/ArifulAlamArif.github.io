//VALIDATE FORM BEFORE [SUBMIT]
	var rmvImgError = true;
	function rmvError()
	{
		if ( rmvImgError == true )
	    	{return false;}
	    else{return true; }
	}


var rmv_type="";
function rmv_checkType()			//update combo box in Remove section
{
	var offer = document.getElementById("rmv_offer");
	var ads = document.getElementById("rmv_ads");
	if (offer.checked) 
	{
		rmv_type = offer.value;
	}
	if (ads.checked) 
	{
		rmv_type = ads.value;	
	}
	//window.alert(rmv_type);
	if(rmv_type!="")
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "checkslider.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("upt_checkType="+rmv_type);
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     	//window.alert(this.responseText);
		     	document.getElementById("rmv_name").innerHTML = this.responseText;
		    }
		};
	}
	document.getElementById("rmv_image").src="img/add_image.png";
}

function rmv_checkName()		//fillUp remove fields
{
	var filename = document.getElementById("rmv_name");
	var rmv_image = document.getElementById("rmv_image");
	rmv_image.src = "img/"+rmv_type+"/"+filename.value;		//image
	rmvImgError=false;
}