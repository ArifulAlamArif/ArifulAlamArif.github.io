<?php 
	include '../header/header.php'; 
	if ($_SESSION["logger_type"] == 'admin') 
	{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/> 
	<style type="text/css">
	#adminHome a
	{
	    color: #fff;
	    text-decoration:none;
	    background: #000;
	    padding: 10px 20px;
	    display: block;
	    text-shadow: 1px 1px 1px crimson;
	}
	#adminHome a:hover
	{
	    background: #ccc;
	    color: crimson;
	    box-shadow: 1px 1px 1px 1px red;
	    text-shadow: 1px 1px 1px black;
	}
	</style>
</head>
	<body>
    <a id='adminHome' href="../admin/admin.php" >Back To --> HOME</a>
	<h2 style="color: green; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="uploadYes") {  echo "Successfully Uploaded!!";  } ?></h2>
    <h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="uploadNo") {  echo "Please give information in correct form!!";  } ?></h2>
    <fieldset style="">
	<legend><b>Options</b></legend>
	<center>
		<button id="shw_btn">SHOW PRODUCTS</button>
		<button id="add_btn">ADD PRODUCTS</button>
		<button id="rmv_btn">REMOVE PRODUCTS</button>
		<button id="upt_btn">UPDATE PRODUCTS</button>
	</center>
	</fieldset>
	<div>
												<!-- SHOW Scope -->
		<div style="float: left;">
			<fieldset style="width: 400px; display: none;" id="shw_scope">
		    <legend><b>SHOW PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return addError();" enctype="multipart/form-data">
		    	<!-- <table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="25%">Picture Name</td>
						<td width="10%">:</td>
						<td width="40%"><input id='name' onkeyup="checkall()" name="name" type="text" value=""></td>
						<td><span id="errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Picture link</td>
						<td width="10%">:</td>
						<td width="40%"><textarea id='link' onkeyup="checkall()" name="link" type="text" value="" style="width: 160px;height:110px;resize: none;" rows="11" cols="30"></textarea></td>
						<td><span id="errorLink"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="type" id='offer' onchange="checkall()" type="radio" value="offers" required>Offer
							<input name="type" id='ads' onchange="checkall()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        <center>
		        	<img id="image" width="300" height="220" src="img/add_image.png" />
		        </center>
		        <br />
		        <input id="file" type="file" name="myfile" accept=".jpg, .jpeg, .png"/><span id="add_errorImage"></span>
		        <hr />
		        <input type="submit" name="ad_submit" value="Submit">
				<br /> -->
		    </form>
			</fieldset>
		</div>


														<!-- ADD Scope -->
		<div style="float: left;">
			<fieldset style="width: 400px;" id="add_scope">
		    <legend><b>ADD PRODUCTS</b></legend>
		    <form form action="checkproduct.php" method="POST" onsubmit="return addError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="25%">Product Name</td>
						<td width="10%">:</td>
						<td width="40%"><input id='add_name' onkeyup="checkall()" name="add_name" type="text" value=""></td>
						<td><span id="add_errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Price</td>
						<td width="10%">:</td>
						<td width="40%"><input id='add_Price' onkeyup="checkall()" name="add_Price" type="number" value=""></td>
						<td><span id="add_errorPrice"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Description</td>
						<td width="10%">:</td>
						<td width="40%"><textarea id='add_Description' onkeyup="checkall()" name="add_Description" type="text" value="" style="width: 160px;height:110px;resize: none;" rows="11" cols="30"></textarea></td>
						<td><span id="add_errorDescription"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Quantity</td>
						<td width="10%">:</td>
						<td width="40%"><input id='add_Quantity' onkeyup="checkall()" name="add_Quantity" type="number" value=""></td>
						<td><span id="add_errorQuantity"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr
					<tr>
						<td width="25%">Discounts</td>
						<td width="10%">:</td>
						<td width="40%"><input id='add_Discounts' onkeyup="checkall()" name="add_Discounts" type="number" value=""></td>
						<td><span id="add_errorDiscounts"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Delivery Date</td>
						<td width="10%">:</td>
						<td width="40%"><input id='add_dd' onkeyup="checkall()" name="add_dd" type="text" placeholder="Eg: 1-5 type like this" value=""></td>
						<td><span id="add_errordd"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Category</td>
						<td width="10%">:</td>
						<td width="40%">
							<select name="add_Category" id="add_Category" onchange="add_checkCat()">
							</select>
						</td>
						<td><span id="add_errorCategory"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        <center>
		        	<img id="image" width="300" height="220" src="img/add_image.png" />
		        </center>
		        <br />
		        <input id="file" type="file" name="myfile" accept=".jpg, .jpeg, .png"/><span id="add_errorImage"></span>
		        <hr />
		        <input type="submit" name="add_submit" value="Submit">
				<br />
		    </form>
			</fieldset>
		</div>
<script type="text/javascript">
	var addNameError = true;var addDescError = true;
var addPriceError = true;var addQtyError = true;
var addDiscountError = true;var addDdError = true;

function addError()
{
	//alert(addNameError+" "+addDescError+" "+addPriceError+" "+addDiscountError+" "+addDdError+" "+addQtyError);
	if ( addNameError == true || addDescError == true || addPriceError == true || addDiscountError == true || addDdError == true || addQtyError == true)
    	{return false;}
    else{return true; }
}

		//update combo box in Remove section
	//window.alert(rmv_type);
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "checkproduct.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("add_showCat=ok");
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     	//window.alert(this.responseText);
		     	document.getElementById("add_Category").innerHTML = this.responseText;
		    }
		};

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


	var add_dd = document.getElementById('add_dd').value;
	add_dd =add_dd.trim();

	if(add_dd != "")
	{
		var arr = add_dd.split("-");
		//alert(add_dd+" "+arr[0]+" "+arr[1]+" "+arr.length);
		if (!isNaN(arr[0]) && !isNaN(arr[1]) && arr.length == 2) 
		{
			//alert(add_dd+" "+arr[0]+" "+arr[1]+" "+arr.length);
			document.getElementById('add_errordd').innerHTML = 'Valid.';
	 		document.getElementById('add_errordd').style.color = 'green';
	 		addDdError=false;
		}
		else
		{
			document.getElementById('add_errordd').style.color = 'red';
			document.getElementById('add_errordd').innerHTML = "should be like this [1-5]";
			addDdError=true;
		}
	}
	else{
		document.getElementById('add_errordd').style.color = 'red';
		document.getElementById('add_errordd').innerHTML = "Can't be null";
		addDdError=true;
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

		document.getElementById('add_errorDescription').innerHTML = 'Valid Description';
		document.getElementById('add_errorDescription').style.color = 'green';
		addDescError=false;
	}
	else
	{
		document.getElementById('add_errorDescription').innerHTML = "Description can't be null";
		document.getElementById('add_errorDescription').style.color = 'red';
		addDescError=true;
	}

	var add_Price = document.getElementById('add_Price').value;
	add_Price =add_Price.trim();
	if(add_Price != "" )			//validate link
	{
		if (add_Price>0) 
		{
			document.getElementById('add_errorPrice').innerHTML = 'Valid Price';
			document.getElementById('add_errorPrice').style.color = 'green';
			addPriceError=false;
		}
		else
		{
			document.getElementById('add_errorPrice').innerHTML = "Price can't be negative.";
			document.getElementById('add_errorPrice').style.color = 'red';
			addPriceError=true;
		}
		
	}
	else
	{
		document.getElementById('add_errorPrice').innerHTML = "Price can't be null";
		document.getElementById('add_errorPrice').style.color = 'red';
		addPriceError=true;
	}

	var add_Quantity = document.getElementById('add_Quantity').value;
	add_Quantity =add_Quantity.trim();
	if(add_Quantity != "" )			//validate QTY
	{
		if (add_Quantity>0) 
		{
			document.getElementById('add_errorQuantity').innerHTML = 'Valid Price';
			document.getElementById('add_errorQuantity').style.color = 'green';
			addQtyError=false;
		}
		else
		{
			document.getElementById('add_errorQuantity').innerHTML = "Price can't be negative.";
			document.getElementById('add_errorQuantity').style.color = 'red';
			addQtyError=true;
		}
		
	}
	else
	{
		document.getElementById('add_errorQuantity').innerHTML = "Price can't be null";
		document.getElementById('add_errorQuantity').style.color = 'red';
		addQtyError=true;
	}
	
	var add_Discounts = document.getElementById('add_Discounts').value;
	add_Discounts =add_Discounts.trim();
	if(add_Discounts != "" )			//validate QTY
	{
		if (add_Discounts>0) 
		{
			document.getElementById('add_errorDiscounts').innerHTML = 'Valid';
			document.getElementById('add_errorDiscounts').style.color = 'green';
			addDiscountError=false;
		}
		else
		{
			document.getElementById('add_errorDiscounts').innerHTML = "Can't be negative.";
			document.getElementById('add_errorDiscounts').style.color = 'red';
			addDiscountError=true;
		}
	}
	else
	{
		document.getElementById('add_errorDiscounts').innerHTML = "Can't be null";
		document.getElementById('add_errorDiscounts').style.color = 'red';
		addDiscountError=true;
	}
}
</script>

														<!-- Update Scope -->
		<div style="float: left;">
			<fieldset style="width: 400px; display: none;" id="upt_scope">
		    <legend><b>Update PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return uptError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr><div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>Select type first</em></div>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="upt_type" id='upt_offer' onchange="upt_checkType()" type="radio" value="offers" required>Offers
							<input name="upt_type" id='upt_ads' onchange="upt_checkType()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="upt_errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Select Name</td>
						<td width="10%">:</td>
						<td width="40%">
							<select name="upt_name" id="upt_name" onchange="upt_checkName()">
							</select>
						</td>
						<td><span id="upt_errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td colspan="4"> 
							<center>
					        	<img id="upt_image" width="300" height="220" src="img/add_image.png" />
					        </center>
					        <br />
					        <input id="upt_file" type="file" name="upt_file" accept=".jpg, .jpeg, .png"/>
						</td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr><td colspan="4">
						<div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>For Update</em></div>
						<hr/></td></tr>
					<tr>
						<td width="25%">Picture Name</td>
						<td width="10%">:</td>
						<td width="40%"><input id='newname' onkeyup="upt_checkall()" name="name" type="text" value=""></td>
						<td><span id="errornewName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Picture link</td>
						<td width="10%">:</td>
						<td width="40%"><textarea id='newlink' onkeyup="upt_checkLink()" name="link" type="text" value="" style="width: 160px;height:110px;resize: none;" rows="11" cols="30"></textarea></td>
						<td><span id="errornewLink"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="newtype" id='newoffer' onchange="upt_checkall()" type="radio" value="offers" required>Offer
							<input name="newtype" id='newads' onchange="upt_checkall()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="errornewType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        <input type="submit" name="upt_submit" value="UPDATE">
				<br />
		    </form>
			</fieldset>
		</div>


														<!-- Remove Scope -->
	    <div style="float: left;">
			<fieldset style="width: 400px; display: none;" id="rmv_scope">
		    <legend><b>REMOVE PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return rmvError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr><div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>Select type first</em></div>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="rmv_type" id='rmv_offer' onchange="rmv_checkType()" type="radio" value="offers" required>Offers
							<input name="rmv_type" id='rmv_ads' onchange="rmv_checkType()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="rmv_errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Select Name</td>
						<td width="10%">:</td>
						<td width="40%">
							<select name="rmv_name" id="rmv_name" onchange="rmv_checkName()">
							</select>
						</td>
						<td><span id="rmv_errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td colspan="4"> 
							<center>
					        	<img id="rmv_image" width="300" height="220" src="img/add_image.png" />
					        </center>
					        <br />
						</td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        
		        
		        <input type="submit" name="rmv_submit" value="REMOVE">
				<br />
		    </form>
			</fieldset>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		//BUTTON's
		$(document).ready(function(){
			$("#shw_btn").click(function(){
		        $("#shw_scope").toggle(1000);
		    });
		    $("#add_btn").click(function(){
		        $("#add_scope").toggle(1000);
		    });
		    $("#rmv_btn").click(function(){
		        $("#rmv_scope").toggle(1000);
		    });
		    $("#upt_btn").click(function(){
		        $("#upt_scope").toggle(1000);
		    });
		});
	</script>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	

	<script src="js/bjqs-1.3.min.js"></script>
	<script type="text/javascript" src="js/acor.js"></script>
	<!-- <script src="validateJS/add.js"></script> -->
	<script src="validateJS/upt.js"></script>
	<script src="validateJS/rmv.js"></script>
	
	</body>
</html>
<?php 
	}
	else
	{
		header("location: ../index/index.php?status=loginAsAdmin");
	}
	include '../footer/footer.php'; 
 ?>