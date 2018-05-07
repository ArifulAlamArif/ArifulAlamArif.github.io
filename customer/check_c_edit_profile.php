<?php 
	if(isset($_POST['submit']))
	{
		include "../db/db.php";
		include "../validation/validation.php";

		$name=trim($_POST['name']);
		$uname=trim($_POST['uname']);
		$add=trim($_POST['address']);
		$mob=trim($_POST['mob']);
		$dob = trim($_POST['date'])."/".trim($_POST['month'])."/".trim($_POST['year']);
		if(empty($name))
		{echo "Name can't be empty.";}
		else if(empty($uname))
		{echo "Username can't be empty.";}
		else if(empty($mob))
		{echo "Mobile number can't be empty.";}
		// else if(!validMob($mob))
		// {echo "Enter a valid Mobile Number.";}
		else if(empty($add))
		{echo "address can't be empty.";}
		else if(empty($_POST['date']) || empty($_POST['month']) || empty($_POST['year']))
		{echo "DOB can't be empty.";}
		else
		{
			$sql = "UPDATE users SET name='$name',username='$uname',mobile='$mob',address='$add',dob='$dob' WHERE email='".$_POST['email']."'";
			$conn = getConnection();
			if(mysqli_query($conn, $sql))
			{
				$_SESSION["name"]		= $name;
				$_SESSION["username"]	= $uname;
				$_SESSION["mobile"]		= $mob;
				$_SESSION["address"]	= $add;
				$_SESSION["dob"]		= $dob;
				header("location: c_edit_profile.php?status=updated");
			}
			else {
				header("location: c_edit_profile.php?status=error");
			}
		}
	}
	else
	{
		header("location: c_edit_profile.php?status=error");
	}
?>
