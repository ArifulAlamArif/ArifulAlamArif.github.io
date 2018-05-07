<?php  
	include '../header/header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../login/login.css">
	<style>
	#login_wrapper
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
#login_wrapper input[type="text"],
#login_wrapper input[type="password"]
{
	border-bottom: 2px solid #8B0000;
    outline: none;
}
#login_wrapper input[type="text"]:focus,
#login_wrapper input[type="password"]:focus
{
	border-bottom: 2px solid #191970;
}
#login_submit input[type="submit"] {
    width: 100%;
    background-color: MediumSeaGreen;
    color: white;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#login_submit input[type="submit"]:hover {
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
	</style>
</head>
<body>
<center>
<div style="width: 40%; border: 1px solid #ccc; margin-top: 20px;margin-bottom: 20px;">
	<form id="login_wrapper" style="background-color: white;" action="../login/check.php" method="POST" >
		<h2 align="middle">SignIn</h2></br>
		<p>If you already have a ShoppingCart account with a username and password set, please sign in here.</p>
		<input id='email' onkeyup="val()" type="text" name="email" placeholder="Email" value="<?php if(isset($_COOKIE['logger_email'])){echo $_COOKIE["logger_email"];}?>" /></br>
		<input id='pass' type="password" onkeyup="val()" name="pass" placeholder="Password" value="<?php if(isset($_COOKIE['logger_pass'])){echo $_COOKIE["logger_pass"];}?>"/></br>
		<div id='login_submit'>
			<input type="submit" id='ls' name="login" value="Sign In"/>
		</div>
		<hr />
		<div style="width: 200px;height: 30px;border: 1px solid #ccc;">
			<div style="float: left;width: 30%;">
				<input type="checkbox" name="rem" value="me">
			</div>
			<div style="float: right;width: 70%;">
				Remember Me
			</div>
		</div>
		<p>or <a href="../signup/asignup.php">Create a ShoppingCart account</a>.</p>
		<p>Can't remember your username Or forgot your password? No worries, click <a href="forgot.php">here</a> to reset it.</p>
	</form>
</div>
</center>
<script>
	function val(){
		//taking current values
		var email = document.getElementById('email').value;
		email =email.trim();
		var pass = document.getElementById('pass').value;
		pass =pass.trim();

		document.getElementById('email').style.color = 'red';
		document.getElementById('pass').style.color = 'red';

		//ajax
		var xhttp = new XMLHttpRequest();//browser built-in object
		xhttp.open("POST", "../db/db.php", true);//where to go and how??
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// no need for GET
		xhttp.send("logger_email="+email+'&logger_pass='+pass);//name = value

		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) 
		    {
				if(this.responseText == 'green')
				{
					document.getElementById('email').style.color = 'green';
					document.getElementById('pass').style.color = 'green';
					document.getElementById('ls').style.cursor = 'pointer';//button's pointer
					//document.getElementById('ls').style.opacity = '1.0';
					document.getElementById('ls').style.backgroundColor = 'MediumSeaGreen';
					document.getElementById("ls").disabled = false;	//submit button works
				}
				else
				{
					document.getElementById('email').style.color = 'red';
					document.getElementById('pass').style.color = 'red';
					document.getElementById('ls').style.cursor = 'not-allowed';
					//document.getElementById('ls').style.opacity = '0.6';
					document.getElementById('ls').style.backgroundColor = 'red';
					document.getElementById("ls").disabled = true;
				}
		    }
		};
	}
</script>
</body>
</html>
<?php
		include '../footer/footer.php';   
?>