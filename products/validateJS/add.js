	var addNameError = true;var addDescError = true;
var addPriceError = true;var addQtyError = true;
var addDiscountError = true;var addDdError = true;
var addCatError = true;var addImgError = true;

function addError()
{
	if ( addNameError == true || addDescError == true || addPriceError == true || addImgError == true || addDiscountError == true || addDdError == true || addDdError == true || addCatError == true)
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
	
	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}

	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}

	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}
}	var addNameError = true;var addDescError = true;
var addPriceError = true;var addQtyError = true;
var addDiscountError = true;var addDdError = true;
var addCatError = true;var addImgError = true;

function addError()
{
	if ( addNameError == true || addDescError == true || addPriceError == true || addImgError == true || addDiscountError == true || addDdError == true || addDdError == true || addCatError == true)
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
	
	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}

	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}

	var name = document.getElementById('add_name').value;
	name =name.trim();
	if(name != "")
	{
     	document.getElementById('add_errorName').innerHTML = 'Valid name.';
 		document.getElementById('add_errorName').style.color = 'green';
 		addNameError=false;
	}
	else{
		document.getElementById('add_errorName').style.color = 'red';
		document.getElementById('add_errorName').innerHTML = "Name can't be null";
		addNameError=true;
	}

	var add_Description = document.getElementById('add_Description').value;
	add_Description =add_Description.trim();
	if(add_Description != "")			//validate link
	{

		document.getElementById('add_errorDescription').innerHTML = 'Valid Address';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Link can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}
}