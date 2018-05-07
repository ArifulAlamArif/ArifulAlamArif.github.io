<?php 
	if(isset($_POST['login']))
	{ 
		include "../db/db.php";
		include "../validation/validation.php";

		$email=trim($_POST['email']);
		$pass = trim($_POST['pass']);

		if(empty($pass))
		{echo "Password can't be empty.";}
		else if(empty($email))
		{echo "Email can't be empty.";}
		else if(!validMail($email))
		{echo "Must be a valid email address (i.e : anything@example.com) ";}
		else
		{
			//remember me option
			if(!empty($_POST["rem"]))
			{
				setcookie("logger_email", $email, time()+(24*60*60*30), "/");
				setcookie("logger_pass", $pass, time()+(24*60*60*30), "/");
			}
			if(isUser($email,$pass))
			{
				if ($_SESSION["verified"]=="no") 
				{
					header("Location: ../valid_account/valid_account.php");	
				}
				else{	header("Location: ../customer/c_home.php"); 	}//customer
			}
			elseif(isUser($email,$pass,'admin'))
			{
				if ($_SESSION["verified"]=="no") 
				{
					header("Location: ../valid_account/valid_account.php");	
				}
				else{	header("Location: ../admin/admin.php");	 	}//admin
			}
			elseif(isUser($email,$pass,'stuff'))
			{
				if ($_SESSION["verified"]=="no") 
				{
					header("Location: ../valid_account/valid_account.php");	
				}
				else{	header("Location: ../index.php"); 	}//stuff
			}
			else{echo 'Invalid user';}
		}
	}
	else{header("Location: ../index/index.php");}
?>
