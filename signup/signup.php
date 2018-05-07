<?php include "../header/header.php";?>
<html>
	<head>
		<meta charset="utf-8">
<style type="text/css">
#submit_signup input[type="submit"]{
    width: 50%;
    background-color: red;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    margin-left: 180px;
    border-radius: 4px;
    cursor: pointer;
}
#submit_signup input[type="submit"]:hover {
    border-radius: 4px;
    background-color: MediumSeaGreen;
}
#reset_signup input[type="reset"]:hover {
    border-radius: 4px;
    background-color: grey;
}
#reset_signup input[type="reset"] {
    width: 50%;
    background-color: SteelBlue;
    color: white;
    padding: 12px ;
    padding-right:50px;
    /*margin: 8px 0;*/
    margin-left: 20px;
    margin-right: 0px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.deco
{
	margin-bottom:5px;
	font-size: 15px;
	width: 60%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    border-bottom: 2px solid #8B0000;
    outline: none;
}
p , h3{margin: 0;padding:0;}
#rl
{
	margin: 10px;
	width: 95%;	
}
.r
{
	text-align: left;
	padding: 0 10 10 10;
}

</style>
	</head>
	<body >
		<?php  
			if($_GET['status']=='signup')
			{
				?>
				<h1 style="color: red;">Please, Sign up correctly!!</h1>
				<?php
			}
		?>
		<center>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="70%" >
					<form class="s" action="check.php" onsubmit="return vf();" method="POST">
						<table cellpadding="0" cellspacing="0" width="100%" style="border-right: 1px solid #ccc;border-top: 1px solid #ccc;">
							<tr>
								<th colspan="4"><h2 style="border-bottom: 2px solid crimson;color: crimson;">Sign Up</h2></th>
							</tr>
							<tr>
								<td><h3>Name</h3></td>
								<td>:</td>
								<td><input class="deco" id="name" onkeyup="nameChange(),errors()" name="name" type="text" value=""></td>
								<td><span id="errorName"></span></td>
							</tr>		
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Email</h3></td>
								<td>:</td>
								<td>
									<input class="deco" id="email" onkeyup="emailChange(),errors()" name="email" type="text" value="">
									<abbr title="hint: sample@example.com"><b>i</b></abbr>
								</td>
								<td><span id="errorEmail"></span></td>
							</tr>		
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Username</h3></td>
								<td>:</td>
								<td><input class="deco" id="uname" onkeyup="unameChange(),errors()" name="uname" type="text" value=""></td>
								<td><span id="errorUname"></span></td>
							</tr>
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Address</h3></td>
								<td>:</td>
								<td><textarea class="deco" style="resize: none;" id="add" onkeyup="addChange(),errors()" name="address" rows="5" cols="30"></textarea></td>
								<td><span id="errorAdd"></span></td>
							</tr>
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Mobile</h3></td>
								<td>:</td>
								<td><input class="deco" id="mob" onkeyup="mobChange(),errors()" name="mob" type="text" value=""></td>
								<td><span id="errorMob"></span></td>
							</tr>
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Password</h3></td>
								<td>:</td>
								<td><input class="deco" id="pass" onkeyup="passChange(),errors()" name="pass" type="password" value=""></td>
								<td><span id="errorPass"></span></td>
							</tr>		
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Confirm Password</h3></td>
								<td>:</td>
								<td><input class="deco" id="cpass" onkeyup="cpassChange(),errors()" name="cpass" type="password" value=""></td>
								<td><span id="errorCpass"></span></td>
							</tr>		
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Gender</h3></td>
								<td>:</td>
								<td>
									<select class="deco" name="gender" id="gender" onchange="genderChange(),errors()">
										<option value="">Select your gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="other">Other</option>
									</select>
								</td>
								<td><span id="errorGender"></span></td>
							</tr>
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td><h3>Date of Birth</h3></td>
								<td>:</td>
								<td>
									<input onkeyup="dateChange()" onchange="dateChange()" class="deco" style="width: 25%;" id='date' type="number" size="2" name="date" min="1" max="31" value="" placeholder="DAY" />  /  
									<input onkeyup="monthChange()" onchange="monthChange()" class="deco" style="width: 25%;" id='month' type="number" size="2" name="month" min="1" max="12" value="" placeholder="MONTH"/>  /  
									<input onkeyup="yearChange()" onchange="yearChange()" class="deco" style="width: 25%;" id='year' type="number" size="4" name="year" min="1960" max="2000" value="" placeholder="YEAR"/>
									<font size="4"><i>(dd/mm/yyyy)</i></font>
								</td>
								<td><span id="errorDob"></span></td>
							</tr>		
							<tr><td colspan="4"><hr/></td></tr>
							<tr>
								<td colspan="3">
									<div id='submit_signup'><input id="submit" type="submit" name="submit" value="Submit"></div>
								</td>
								<td><div id='reset_signup'><input type="reset"></div></td>
							</tr>
						</table>
					</form>
				</td>
				<td>
					<table border="1">
						<tr>
							<td>
								<div id="rl">
									<div style="text-align: center;"><h1>Rules</h1></div>
									<div class="r"><p><strong>Name: </strong>Can contain only letters, a single space and an optional dot (.) or dash (-) .</p></div>
									<div class="r"><p><strong>Username: </strong>Can contain Upper-case and Lower-case letters only. </p></div> 
									<div class="r"><p><strong>Password: </strong>Should contain at least one upper-case letter, one lower-case letter & a digit .</p></div >
									<div class="r"><p><strong>Email: </strong>Must be a valid email address (Ex: bond@aiub.edu). </h3></div> 
				                    <div class="r"><p><strong>Address: </strong>Can not exceed 100 letters. </p></div> 
				                    <div class="r"><p><strong>Phone Number: </strong>Must have Country Code at the beginning and should be of 11 digits (Ex: +8801000000000). </p></div> 
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</center>
<script>
	var nameError = true;var emailError = true;var unameError = true;var addressError = true;
    var mobError = true;var passError = true;var cpassError = true;var dateError = true;
    var monthError = true;var yearError = true;var genderError = true;

	function vf() {
	    if ( nameError == true || emailError == true || unameError == true || addressError == true || mobError == true || passError == true || cpassError == true || dateError == true || monthError == true || yearError == true || genderError == true )
	    	{return false;}
	    else{return true; }
	}

	function genderChange()
    {
    	var gender = document.getElementById('gender').value;
    	document.getElementById('gender').style.color = 'red';
    	if(gender!="")
		{	
			document.getElementById('gender').style.backgroundColor = '';
			document.getElementById('gender').style.color = 'green';
			document.getElementById('errorGender').innerHTML = 'Valid Gender';
			document.getElementById('errorGender').style.color = 'green';
			genderError=false;
		}
		else
		{	
			document.getElementById('gender').style.backgroundColor = 'red';
			document.getElementById('gender').style.color = 'black';genderError=true;
			document.getElementById('errorGender').innerHTML = 'Invalid Gender';
			document.getElementById('errorGender').style.color = 'red';
		}
    }

    function monthChange()
    {
    	var month = document.getElementById('month').value;
    	document.getElementById('month').style.color = 'red';
    	if(month>0 && month <13)
		{	
			document.getElementById('month').style.backgroundColor = '';
			document.getElementById('month').style.color = 'green';
			document.getElementById('errorDob').innerHTML = '';
			monthError=false;
		}
		else if(month=="")
		{
			document.getElementById('month').style.backgroundColor = 'red';
			document.getElementById('month').style.color = 'black'; monthError=true;
			document.getElementById('errorDob').innerHTML = "Month can't be empty!!";
			document.getElementById('errorDob').style.color = 'red';
		}
		else // val<0 OR val>12
		{	
			document.getElementById('month').style.backgroundColor = '';
			document.getElementById('month').style.color = 'red'; monthError=true;
			document.getElementById('errorDob').innerHTML = 'Invalid Month';
			document.getElementById('errorDob').style.color = 'red';
		}
    }
    function yearChange()
    {
    	var year = document.getElementById('year').value;
    	document.getElementById('year').style.color = 'red';
    	if(year<2001 && year>1959)
		{	
			document.getElementById('year').style.backgroundColor = '';
			document.getElementById('year').style.color = 'green';
			document.getElementById('errorDob').innerHTML = '';
			yearError=false;
		}
		else if(year=="")
		{
			document.getElementById('year').style.backgroundColor = 'red';
			document.getElementById('year').style.color = 'black';yearError=true;
			document.getElementById('errorDob').innerHTML = "YEAR can't be empty!!";
			document.getElementById('errorDob').style.color = 'red';
		}
		else
		{	
			document.getElementById('year').style.backgroundColor = '';
			document.getElementById('year').style.color = 'red'; yearError=true;
			document.getElementById('errorDob').innerHTML = 'Invalid YEAR';
			document.getElementById('errorDob').style.color = 'red';
		}
    }
    function dateChange()
    {
    	var date = document.getElementById('date').value;
    	document.getElementById('date').style.color = 'red';
    	if(date>0 && date<32)
		{	
			document.getElementById('date').style.backgroundColor = '';
			document.getElementById('date').style.color = 'green';
			document.getElementById('errorDob').innerHTML = '';
			dateError=false;
		}
		else if(date=="")
		{
			document.getElementById('date').style.backgroundColor = 'red';
			document.getElementById('date').style.color = 'black';dateError=true;
			document.getElementById('errorDob').innerHTML = "date can't be empty!!";
			document.getElementById('errorDob').style.color = 'red';
		}
		else
		{	
			document.getElementById('date').style.backgroundColor = '';
			document.getElementById('date').style.color = 'red'; dateError=true;
			document.getElementById('errorDob').innerHTML = 'Invalid DATE';
			document.getElementById('errorDob').style.color = 'red';
		}
    }
    function errors()
    {
    	if (document.getElementById('name').style.color == 'red') 
    	{
    		document.getElementById('errorName').innerHTML = 'Invalid Name';
			document.getElementById('errorName').style.color = 'red';
    	}
    	else if (document.getElementById('uname').style.color == 'red') 
    	{
    		document.getElementById('errorUname').innerHTML = 'Invalid Username';
			document.getElementById('errorUname').style.color = 'red';
    	}
    	else if (document.getElementById('add').style.color == 'red') 
    	{
    		document.getElementById('errorAdd').innerHTML = 'Invalid Address';
			document.getElementById('errorAdd').style.color = 'red';
    	}
    	else if (document.getElementById('pass').style.color == 'red') 
    	{
    		document.getElementById('errorPass').innerHTML = 'Invalid Password';
			document.getElementById('errorPass').style.color = 'red';
    	}
    	else if (document.getElementById('cpass').style.color == 'red') 
    	{
    		document.getElementById('errorCpass').innerHTML = 'Invalid Confirm Password';
			document.getElementById('errorCpass').style.color = 'red';
    	}
    	else if (document.getElementById('email').style.color == 'red') 
    	{
    		document.getElementById('errorEmail').innerHTML = 'Invalid Email';
			document.getElementById('errorEmail').style.color = 'red';
    	}
    	else if (document.getElementById('mob').style.color == 'red') 
    	{
    		document.getElementById('errorMob').innerHTML = 'Invalid Mobile';
			document.getElementById('errorMob').style.color = 'red';
    	}
    }
	function nameChange()
	{
		var name = document.getElementById('name').value;
		name=name.trim();
		document.getElementById('name').style.color = 'red';
		if(name!="")
		{	
			document.getElementById('name').style.backgroundColor = '';
			if(name.replace(/-/g,""))
			{
				name=name.replace(/ /g,""); //asdAaasa
				if(name.match(/[A-Z]/) && name.match(/[a-z]/))
				{
					document.getElementById('name').style.color = 'green';
					document.getElementById('errorName').innerHTML = 'Valid Name';
					document.getElementById('errorName').style.color = 'green';
					nameError=false;
				}
			}
		}
		else
		{	
			document.getElementById('name').style.backgroundColor = 'red';
			document.getElementById('name').style.color = 'black';nameError=true;
			document.getElementById('errorName').innerHTML = 'Invalid Name';
			document.getElementById('errorName').style.color = 'red';
		}
	}
	function unameChange()
	{
		var uname = document.getElementById('uname').value;
		uname=uname.trim();
		document.getElementById('uname').style.color = 'red';
		if(uname!="")
		{	
			document.getElementById('uname').style.backgroundColor = '';
			if( uname.match(/[A-Z]/) && uname.match(/[a-z]/) )
			{   
				document.getElementById('uname').style.color = 'green';
				document.getElementById('errorUname').innerHTML = 'Valid Username';
				document.getElementById('errorUname').style.color = 'green';
				unameError=false;
			}
		}
		else
		{	
			document.getElementById('uname').style.backgroundColor = 'red';
			document.getElementById('uname').style.color = 'black';unameError=true;
			document.getElementById('errorUname').innerHTML = 'Invalid Username';
			document.getElementById('errorUname').style.color = 'red';
		}
	}
	function addChange()
	{
		var add = document.getElementById('add').value;
		add=add.trim();
		document.getElementById('add').style.color = 'red';
		if(add!="")
		{	
			document.getElementById('add').style.backgroundColor = '';
			if( add.length <100)
			{   
				document.getElementById('add').style.color = 'green';
				document.getElementById('errorAdd').innerHTML = 'Valid Address';
				document.getElementById('errorAdd').style.color = 'green';
				addressError=false;
			}
		}
		else
		{	
			document.getElementById('add').style.backgroundColor = 'red';
			document.getElementById('add').style.color = 'black';addressError=true;
			document.getElementById('errorAdd').innerHTML = 'Invalid Address';
			document.getElementById('errorAdd').style.color = 'red';
		}
	}
	function passChange()
	{
		var pass = document.getElementById('pass').value;
		pass=pass.trim();
		document.getElementById('pass').style.color = 'red';
		if(pass!="")
		{	
			document.getElementById('pass').style.backgroundColor = '';
			if( pass.match(/[A-Z]/) && pass.match(/[a-z]/) && pass.match(/[0-9]/))
			{   
				passError=false;
				document.getElementById('pass').style.color = 'green';
				document.getElementById('errorPass').innerHTML = 'Valid Password';
				document.getElementById('errorPass').style.color = 'green';
			}
		}
		else
		{	
			document.getElementById('pass').style.backgroundColor = 'red';
			document.getElementById('pass').style.color = 'black';passError=true;
			document.getElementById('errorPass').innerHTML = 'Invalid Password';
			document.getElementById('errorPass').style.color = 'red';
		}
	}
	function cpassChange()
	{
		var pass = document.getElementById('pass').value;
		var cpass = document.getElementById('cpass').value;
		pass=pass.trim(); cpass=cpass.trim();
		document.getElementById('cpass').style.color = 'red';
		if(cpass!="")
		{	
			document.getElementById('cpass').style.backgroundColor = '';
			if( pass == cpass)
			{   
				cpassError=false;
				document.getElementById('cpass').style.color = 'green';
				document.getElementById('errorCpass').innerHTML = 'Valid Confirm Password';
				document.getElementById('errorCpass').style.color = 'green';
			}
		}
		else
		{	
			document.getElementById('cpass').style.backgroundColor = 'red';
			document.getElementById('cpass').style.color = 'black';cpassError=true;
			document.getElementById('errorCpass').innerHTML = 'Invalid Confirm Password';
			document.getElementById('errorCpass').style.color = 'red';
		}
	}
	function emailChange(){
		var email = document.getElementById('email').value;
		email =email.trim();
		document.getElementById('email').style.color = 'red';
		if(email!="")
		{	
			document.getElementById('email').style.backgroundColor = '';
			if(email.search("@") > -1)
			{
				var epos = 	email.lastIndexOf("@");
				var eres  =	email.slice(epos+1);  //after @
				var pos  = 	eres.lastIndexOf(".");
				if (pos >1) 
				{
					var res  = 	eres.slice(pos+1);// com / bd / edu 
					//alert(res);
					if( res.length > 1)
					{
						//valid email till now
						//ajax
						var xhttp = new XMLHttpRequest();//browser built-in object
						xhttp.open("POST", "../db/db.php", true);//where to go and how??
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// no need for GET
						xhttp.send("signup_email="+email);//name = value 
						xhttp.onreadystatechange = function() {
						    if (this.readyState == 4 && this.status == 200) 
						    {
						    	//alert(this.responseText);
								if(this.responseText == 'green')
								{
									emailError=false;
									document.getElementById('email').style.color = 'green';	
									document.getElementById('errorEmail').innerHTML = 'Valid Email';
									document.getElementById('errorEmail').style.color = 'green';
								}
								else
								{
									document.getElementById('email').style.backgroundColor = '';
									emailError=true;
									document.getElementById('errorEmail').innerHTML = 'Duplicate Email';
									document.getElementById('errorEmail').style.color = 'red';
								}
						    }
						};   
					}
				}
			}
		}
		else
		{	
			document.getElementById('email').style.backgroundColor = 'red';
			document.getElementById('email').style.color = 'black';emailError=true;
			document.getElementById('errorEmail').innerHTML = 'Invalid Email';
			document.getElementById('errorEmail').style.color = 'red';
		}
	}
	function mobChange(){
		var mob = document.getElementById('mob').value;
		mob =mob.trim();
		document.getElementById('mob').style.color = 'red';
		if(mob!="")
		{	
			document.getElementById('mob').style.backgroundColor = '';
			if(mob.indexOf("+") == 0 && mob.length == 14)
			{
				mob=mob.replace('+',"");
				if( mob.match(/[A-Z]/) || mob.match(/[a-z]/))
				{
					document.getElementById('mob').style.backgroundColor = 'red';
					document.getElementById('mob').style.color = 'black';mobError=true;
					document.getElementById('errorMob').innerHTML = 'Invalid Mobile';
					document.getElementById('errorMob').style.color = 'red';
				}
				else
				{   
					document.getElementById('mob').style.color = 'green';	
					document.getElementById('errorMob').innerHTML = 'Valid Mobile';
					document.getElementById('errorMob').style.color = 'green';
					mobError=false;
				}
			}
			//mob=mob.replace('+',"");
			var pos = 	mob.lastIndexOf("+");
			if (pos == 0 || pos <0) 
			{
				var mob  =	mob.slice(pos+1);
				if(mob.length == 11)
				{
					if( mob.match(/[A-Z]/) || mob.match(/[a-z]/))
					{
						document.getElementById('mob').style.backgroundColor = 'red';
						document.getElementById('mob').style.color = 'black';mobError=true;
						document.getElementById('errorMob').innerHTML = 'Invalid Mobile';
						document.getElementById('errorMob').style.color = 'red';
					}
					else
					{   
						document.getElementById('mob').style.color = 'green';	
						document.getElementById('errorMob').innerHTML = 'Valid Mobile';
						document.getElementById('errorMob').style.color = 'green';
						mobError=false;
					}
				}
			}
			
		}
		else
		{	
			document.getElementById('mob').style.backgroundColor = 'red';
			document.getElementById('mob').style.color = 'black';mobError=true;
			document.getElementById('errorMob').innerHTML = 'Invalid Mobile';
			document.getElementById('errorMob').style.color = 'red';
		}
	}
</script>
	</body>
</html>
<?php 	include "../footer/footer.php"; ?>