<?php 
	if(isset($_POST['send_code']))
	{ 
		include "../db/db.php";
		include "../validation/validation.php";

		if(sendCodeForVerification($_SESSION["username"],$_SESSION["email"]))
		{
			header("Location: ../valid_account/valid_account.php?check=ok");	
		}
		else{
			header("Location: ../valid_account/valid_account.php?check=error");
		}
	}
	else{header("Location: ../index/index.php");}
?>
