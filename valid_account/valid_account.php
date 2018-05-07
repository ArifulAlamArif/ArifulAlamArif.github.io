<?php  
	include '../header/header.php';
	if ($_SESSION["logger_type"]) 
	{  
?>

<!DOCTYPE html>
<html>
<head>
	<style>
#login_wrapper,#send_scope
{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 30px;
    padding-right: 30px;
    font-size: 15px;
    color: black;
}
h2
{   
    border-bottom: 2px solid crimson;
    color: crimson;
}
#login_wrapper input
,#send_scope input
{
	margin-bottom:5px;
    font-size: 15px;
    width: 100%;
    padding: 12px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
#login_wrapper input[type="text"],#send_scope input[type="text"]
{
	border-bottom: 2px solid #8B0000;
    outline: none;
}
#login_wrapper input[type="text"]:focus,#send_scope input[type="text"]:focus
{
	border-bottom: 2px solid #191970;
}
#login_submit input[type="submit"] {
    width: 100%;
    background-color: red;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: not-allowed;

}
#login_submit input[type="submit"]:hover {
    border-radius: 8px;
    border: 1px solid black;
}
#send_code input[type="submit"] {
    width: 50%;
    background-color: MediumSeaGreen;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}
#send_code input[type="submit"]:hover {
    border-radius: 8px;
    border: 1px solid black;
}
a:link
{ color:blue; font: bold;}
a:visited
{ color:Crimson; }
a:hover
{ color:red; font-weight:bold;}
a:active
{ background-color: LightCoral  ; }
p as{
	color: red;
	}
	</style>
</head>
<body>
<center>
<div style="width: 40%; border: 1px solid #ccc; margin-top: 20px;margin-bottom: 20px;">
	<form id="login_wrapper" style="background-color: white;" action="../valid_account/check_valid_account.php" method="POST" >
		<h2 align="middle">Valid Your Account</h2></br>
		<p>You haven't verified your account yet. </p>
		<p>Please, enter your <as>CODE</as> that we have sent in your <as>EMAIL</as>.</p>
		<input id='email' onkeyup="val()" type="text" name="email" placeholder="Email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION["email"];}?>" /></br>
		<input id='code' type="text" onkeyup="val()" name="code" placeholder="Code" value=""/></br>
		<div id='login_submit'>
			<input type="submit" id='v' name="verify" value="Verify"/>
		</div>
		<hr />
		<p>If you didn't find the code <as>ENTER your EMAIL below</as> here.</p>
	</form>
	<br><hr/><br>


	<h3 style="color: green; text-align: center;text-shadow: 1px 1px 1px black;""><?php if($_GET['check']=="ok"){echo "Check your inbox, thank you!!";} ?></h3>
	<h3 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;"><?php if($_GET['check']=="error"){echo "Please, enter your valid MAIL !!";} ?></h3>


	<form id="send_scope" style="background-color: white;" action="../valid_account/send_code.php" method="POST">
		<h2 align="middle" >Click here for Verification Code</h2>
		<div id='send_code'>
			<input type="submit" id='sc' name="send_code" value="SEND CODE"/>
		</div>
	</form>
</div>
</center>
<script>
	function val(){
		//taking current values
		var email = document.getElementById('email').value;
		email =email.trim();
		var code = document.getElementById('code').value;
		code =code.trim();

		document.getElementById('email').style.color = 'red';
		document.getElementById('code').style.color = 'red';

		//ajax
		var xhttp = new XMLHttpRequest();//browser built-in object
		xhttp.open("POST", "../db/db.php", true);//where to go and how??
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// no need for GET
		xhttp.send("logger_email="+email+'&logger_code='+code);//name = value

		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) 
		    {
				if(this.responseText == 'green')
				{
					document.getElementById('email').style.color = 'green';
					document.getElementById('code').style.color = 'green';
					document.getElementById('v').style.cursor = 'pointer';//button's pointer
					//document.getElementById('v').style.opacity = '1.0';
					document.getElementById('v').style.backgroundColor = 'MediumSeaGreen';
					document.getElementById("v").disabled = false;	//submit button works
				}
				else
				{
					document.getElementById('email').style.color = 'red';
					document.getElementById('code').style.color = 'red';
					document.getElementById('v').style.cursor = 'not-allowed';
					//document.getElementById('v').style.opacity = '0.6';
					document.getElementById('v').style.backgroundColor = 'red';
					document.getElementById("v").disabled = true;
				}
		    }
		};
	}
</script>
</body>
</html>
<?php
	}
	else{
		header("Location: ../index/index.php");
	}
	include '../footer/footer.php';   
?>