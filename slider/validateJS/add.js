//VALIDATE FORM BEFORE [SUBMIT]
	var addNameError = true;var addLinkError = true;var addTypeError = true;var addImgError = true;

	function addError()
	{
		if ( addNameError == true || addLinkError == true || addTypeError == true || addImgError == true )
	    	{return false;}
	    else{return true; }
	}

function readURL(input) //adding Image
{
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#image').attr('src', e.target.result);
            addImgError=false;
            //window.alert(addImgError);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#file").change(function()
{
    readURL(this);
});
$("#image").change(function()
{
    checkall();
});


function checkall()		//validate adding info's
{
	var offer = document.getElementById("offer");
	var ads = document.getElementById("ads");
	if (offer.checked) 
	{
		var type = offer.value;
	}
	if (ads.checked) 
	{
		var type = ads.value;	
	}
	type =type.trim();
	var name = document.getElementById('name').value;
	name =name.trim();
	var link = document.getElementById('link').value;
	link =link.trim();

	if(link != "")			//validate link
	{
		if(isValidURL(link))
		{
			document.getElementById('errorLink').innerHTML = 'Valid Address';
			document.getElementById('errorLink').style.color = 'green';
			addLinkError=false;
		}
		else
		{
			document.getElementById('errorLink').innerHTML = 'Invalid Address';
			document.getElementById('errorLink').style.color = 'red';
			addLinkError=true;
		}
	}
	else
	{
		document.getElementById('errorLink').innerHTML = "Link can't be null";
		document.getElementById('errorLink').style.color = 'red';
		addLinkError=true;
	}

	if(name != "")
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "checkslider.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("ptype="+type+'&pname='+name);		//check Duplicate Name & Type
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//window.alert(this.responseText);
		     	if(this.responseText == 'red')
			    {
			    	document.getElementById('errorType').style.color = 'red';
			     	document.getElementById('errorType').innerHTML = 'Invalid type';
			     	addTypeError=true;
			     	document.getElementById('errorName').style.color = 'red';
		     		document.getElementById('errorName').innerHTML = 'Invalid name';
		     		addNameError=true;
			    }
			    else
			    {
			    	document.getElementById('errorType').innerHTML = 'Valid type.';
			     	document.getElementById('errorType').style.color = 'green';
			     	addTypeError=false;
			     	document.getElementById('errorName').innerHTML = 'Valid name.';
		     		document.getElementById('errorName').style.color = 'green';
		     		addNameError=false;
			    }
		    }
		};
	}
	else{
		document.getElementById('errorName').style.color = 'red';
		document.getElementById('errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	//getImage
	// var add_image = document.getElementById("image");
	// var ind = add_image.src.lastIndexOf("/");
	// var i = add_image.src.slice(ind+1);
	// if(i=="add_image.png")
	// {
	// 	document.getElementById('add_errorImage').innerHTML = "Image can't be empty!!";
	// 	document.getElementById('add_errorImage').style.color = 'red';
	// 	addImgError=true;
	// }
	// else
	// {
	// 	document.getElementById('add_errorImage').innerHTML = "Image Selected..";
	// 	document.getElementById('add_errorImage').style.color = 'green';
	// }
}