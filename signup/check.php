<?php 
	if(isset($_POST['submit']))
	{
		include "../header/header.php"; 
		include "../db/db.php";
		include "../validation/validation.php";

		$name=trim($_POST['name']);
		$email=trim($_POST['email']);
		$uname=trim($_POST['uname']);
		$add=trim($_POST['address']);
		$mob=trim($_POST['mob']);	
		$pass = trim($_POST['pass']);
		$cpass = trim($_POST['cpass']);
		$gender = trim($_POST['gender']);
		$dob = trim($_POST['date'])."/".trim($_POST['month'])."/".trim($_POST['year']);

		if(empty($name))
		{echo "Name can't be empty.";}
		else if(empty($email))
		{echo "Email can't be empty.";}
		else if(empty($uname))
		{echo "Username can't be empty.";}
		else if(empty($pass))
		{echo "Password can't be empty.";}
		else if(empty($cpass))
		{echo "Confirm Password can't be empty.";}
		else if(empty($mob))
		{echo "Mobile number can't be empty.";}
		// else if(!validMob($mob))
		// {echo "Enter a valid Mobile Number.";}
		else if(empty($add))
		{echo "address can't be empty.";}
		else if(empty($_POST['gender']))
		{echo "Gender can't be empty.";}
		else if(empty($_POST['date']) || empty($_POST['month']) || empty($_POST['year']))
		{echo "DOB can't be empty.";}
		else if(!uniqueEmail($email))
		{echo "This Email is already exist.";}
		else if($pass != $cpass)
		{echo "Password and Confirm password not matched.";}
		else if(!validMail($email))
		{echo "Must be a valid email address (i.e : anything@example.com) ";}
		else
		{
			if(creteUser($name,$email,$uname,$pass,$mob,$add,$gender,$dob))
			{
				setcookie("logger_email", $email, time()+(24*60*60*30), "/");
				setcookie("logger_pass", $pass, time()+(24*60*60*30), "/");
				header("Location: ../login/login.php");
			}
			else{
				header("Location: ../signup/signup.php?status=signup");
			}
		}
		
?>
<?php 
		include "../footer/footer.html"; 
	}
	else{header("Location: ../index/index.php");}
?>
