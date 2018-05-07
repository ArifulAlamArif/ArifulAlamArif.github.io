//VALIDATE FORM BEFORE [SUBMIT]
	var uptNameError = true;var uptLinkError = true;var uptTypeError = true;var uptImgError = true;

	function uptError()
	{
		if ( uptNameError == true || uptLinkError == true || uptTypeError == true || uptImgError == true )
	    	{return false;}
	    else{return true; }
	}


function update(input) {//updating Image
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#upt_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#upt_file").change(function(){
    update(this);
});

//store current values
var upt_type=""; var currName=""


function upt_checkType()			//update combo box in Update section
{
	var offer = document.getElementById("upt_offer");
	var ads = document.getElementById("upt_ads");
	if (offer.checked) 
	{
		upt_type = offer.value;
	}
	if (ads.checked) 
	{
		upt_type = ads.value;	
	}
	//window.alert(upt_type);
	if(upt_type!="")
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "checkslider.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("upt_checkType="+upt_type);
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     	//window.alert(this.responseText);
		     	document.getElementById("upt_name").innerHTML = this.responseText;
		    }
		};
	}
	//refresh all fields
	document.getElementById("upt_image").src="img/add_image.png";
	document.getElementById("newname").value="";
	document.getElementById("newlink").value="";
	document.getElementById("newoffer").checked=false;
	document.getElementById("newads").checked=false;
}


function upt_checkName()		////fillUp update fields 
{
	var filename = document.getElementById("upt_name");
	var upt_image = document.getElementById("upt_image");
	upt_image.src = "img/"+upt_type+"/"+filename.value;
	var pos = filename.value.lastIndexOf("_"+upt_type+".");
	currName = filename.value.slice(0, pos);
	//name
	document.getElementById("newname").value=currName;
	//type
	if (document.getElementById("upt_offer").checked) 
	{
		document.getElementById("newoffer").checked=true;
	}
	if (document.getElementById("upt_ads").checked) 
	{
		document.getElementById("newads").checked=true;
	}
	//Link
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "checkslider.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//window.alert(filename.value)
	xhttp.send("ufname="+filename.value);	//for get links in UPDATE Section
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	//window.alert(this.responseText)
	     	document.getElementById("newlink").value = this.responseText;
	    }
	};
	//image error
	uptImgError = false; uptLinkError = false; uptTypeError = false; uptNameError = false;
	//refresh errors
	document.getElementById('errornewLink').innerHTML = '';
	document.getElementById('errornewType').innerHTML = '';
	document.getElementById('errornewName').innerHTML = '';
}

function upt_checkLink()
{
	var link = document.getElementById('newlink').value;
	link =link.trim();
	//window.alert(link);
	if(link != "")
	{
		if(isValidURL(link))
		{
			document.getElementById('errornewLink').innerHTML = 'Valid Address';
			document.getElementById('errornewLink').style.color = 'green';
			uptLinkError=false;
		}
		else
		{
			document.getElementById('errornewLink').innerHTML = 'Invalid Address';
			document.getElementById('errornewLink').style.color = 'red';
			uptLinkError=true;
		}
	}
	else
	{
		document.getElementById('errornewLink').innerHTML = "Link can't be null";
		document.getElementById('errornewLink').style.color = 'red';
		uptLinkError=true;
	}
}
function upt_checkall()		//validate updating info's
{
	if (document.getElementById("upt_name").value != "") 
	{
		var offer = document.getElementById("newoffer");
    	var ads = document.getElementById("newads");
    	if (offer.checked) 
    	{
    		var type = offer.value;
    	}
    	if (ads.checked) 
    	{
    		var type = ads.value;	
    	}
    	type =type.trim();

		var name = document.getElementById('newname').value;
		name =name.trim();
		if(name != "" && name != currName)
		{
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "checkslider.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("ptype="+type+'&pname='+name);
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//window.alert(this.responseText);
			     	if(this.responseText == 'red')
				    {
				    	document.getElementById('errornewType').style.color = 'red';
				     	document.getElementById('errornewType').innerHTML = 'Invalid type';
				     	uptTypeError=true;
				     	document.getElementById('errornewName').style.color = 'red';
			     		document.getElementById('errornewName').innerHTML = 'Invalid name';
			     		uptNameError=true;
				    }
				    else
				    {
				    	document.getElementById('errornewType').innerHTML = 'Valid type.';
				     	document.getElementById('errornewType').style.color = 'green';
				     	uptTypeError=false;
				     	document.getElementById('errornewName').innerHTML = 'Valid name.';
			     		document.getElementById('errornewName').style.color = 'green';
			     		uptNameError=false;
				    }
			    }
			};
		}
		if(name != ""){
			document.getElementById('errorName').style.color = 'red';
			document.getElementById('errorName').innerHTML = "Name can't be null";
			uptNameError=true;
		}
	}
}