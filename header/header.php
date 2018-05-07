<?php session_start(); 
//include "../db/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sopping Cart</title>
	 <link rel="stylesheet" type="text/css" href="../header/header.css">
	<link rel="stylesheet" type="text/css" href="../footer/footer.css"> 
	<link rel="stylesheet" href="../slider/bjqs.css ">
	<link rel="stylesheet" href="../slider/sliderStyle.css"/>		
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">	</script> -->
</head>
<body>
	<header>
	<div style="background-color:rgb(255,255,255);border-bottom: 1px solid #ccc;">
		<table id='table_header' cellpadding="0" cellspacing="0" height='110' width="100%" >
			<tr>
				<td width='10%' align='center'>
					<a href="../index/index.php"><img height="110" width="115" src="../images/scartlogo.png"></a>
				</td>
				<td width='50%' align='center'>
					<div id="search">
						<form action="#" method="POST">
							<input type="text" name="search" placeholder="Search for products, brands and categories"/>
							<input type="submit" name="search_button" value="Search"/>
						</form>
					</div>
				</td>
				<td width='10%'>
					<div id="logout_div" <?php if(isset($_SESSION["logger_type"])){echo ' style="display: block;"';}else{echo ' style="display: none;"';}?> align='center'>
						<form action="#" method="POST">
							<input type="submit" name="logout" value="Logout"/>
						</form>
					</div>
				</td>
				<td width='10%'>
					<div id="signup_div"<?php if(isset($_SESSION["logger_type"])){echo ' style="display: none;"';}?> align='center'>
						<form action="#" method="POST">
							<input type="submit" name="signup_button" value="Sign Up"/>
						</form>
					</div>
				</td>
				<td width='10%' >
					<div id="login_div" align='center'>
						<form action="#" method="POST">
							<input type="submit" name="login_button" value="<?php if(isset($_SESSION["logger_type"])){echo $_SESSION["logger_type"];}else{echo 'Login';}?>"/>
						</form>
					</div>	
				</td>
				<td width='10%'>
					<div id="cat_div" align='center'>
						<form action="#" method="POST">
							<input type="submit" name="categories_button" value="Categories"/>
						</form>
					</div>
				</td>
			</tr>
		</table>
	</div>
	</header>

	<!-- style="background: linear-gradient(rgba(255,255,255,1),rgba(43,46,50,1));" -->
	<div>
		<table width="100%" border="1" height='100%'>
			<tr>
				<td width="20%" style="color: red;">

					<div id='a1'>
						first add
					</div>
					<div id='o'>
						Offers
					</div>
					<div id='a2'>
						second add
					</div>

				</td>
				<td style="background-color: #efefef;">
					<?php
						error_reporting(0);
					    if(isset($_POST['login_button']))
					    {
					    	if ($_SESSION["logger_type"] == 'admin') 
							{
								header("Location: ../admin/admin.php");
							}
							else if ($_SESSION["logger_type"] == 'stuff') 
							{
								//header("Location: ../admin/admin.php");
							}
							else if ($_SESSION["logger_type"] == 'customer') 
							{
								header("Location: ../customer/c_home.php"); 
							}
							else
							{
								header("Location: ../login/login.php");
							}
					    }
					    if (isset($_POST['search_button'])) 
					    {
					    	//header("Location: ../signup/asignup.php");
					    }
					    if (isset($_POST['signup_button'])) 
					    {
					    	header("Location: ../signup/signup.php");
					    }
					    if (isset($_POST['categories_button'])) 
					    {
					    	// include '../signup/signup.php';
					    }
					    if (isset($_POST['logout'])) 
					    {
					    	session_destroy();
							header("Location: ../index.php");
					    }
					?>
				