<?php 
	if(isset($_POST['verify']))
	{ 
		include "../db/db.php";
		include "../validation/validation.php";

		$email=trim($_POST['email']);
		$code = trim($_POST['code']);

		if(empty($code))
		{echo "code can't be empty.";}
		else if(empty($email))
		{echo "Email can't be empty.";}
		else if(!uniqueEmail($email))
		{
			if(makeVerifiedAccount($email,$code))
			{
				if($_SESSION["logger_type"] == "customer")
				{
					header("Location: ../customer/c_home.php"); //customer
				}
				if($_SESSION["logger_type"] == "stuff")
				{
					header("Location: ../index.php"); //stuff
				}
				if($_SESSION["logger_type"] == "admin")
				{
					header("Location: ../admin/admin.php"); //admin
				}
			}
			else{echo 'Invalid user';}
		}
	}
	else{header("Location: ../index/index.php");}
?>
