<?php 
	include "../db/db.php";
	if (!empty($_POST['do'])) 
	{
		$conn = getConnection();
	    $sql = "select * from users where email='".$_SESSION['email']."'";
	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);
	    echo $row['password'];
	}

    if(isset($_POST['pass_update']))
    {
		$pass = trim($_POST['pass']);
		$cpass = trim($_POST['cpass']);
		$currpass = trim($_POST['currpass']);

		if(empty($currpass))
		{echo "Current password can't be empty.";}
		else if(empty($pass))
		{echo "Password can't be empty.";}
		else if(empty($cpass))
		{echo "Confirm Password can't be empty.";}
		else if($pass == $currpass)
		{echo "Password and Current password can't be matched.";}
		else if($pass != $cpass)
		{echo "Password and Confirm password not matched.";}
		else if($pass == $cpass)
		{
			$sql = "UPDATE users SET password='$pass' WHERE email='".$_SESSION['email']."'";
			$conn = getConnection();
			if(mysqli_query($conn, $sql))
			{
				header("location: c_change_password.php?status=updated");
			}
			else {
				header("location: c_change_password.php?status=error");
			}
		}
    }
 ?>