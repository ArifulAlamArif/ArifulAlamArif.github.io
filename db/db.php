<?php
session_start();
include "../mail/mail.php";
	$server 	=	"localhost";
	$username 	= 	"root";
	$password	=	"";
	$dbname		=	"scart";

	$conn = mysqli_connect($server, $username, $password, $dbname);
	function getConnection()
	{
 		$conn = mysqli_connect($GLOBALS['server'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
 		return $conn;
 	}
	if (!empty($_POST['type'])) 
	{
		$sql = "select * from users where type='".$_POST['type']."'";
		$conn=$GLOBALS['conn'];
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['email']==$_POST['logger_email'] && $row['password']==$_POST['logger_pass'])
				{
					$_SESSION["username"]= $row['username'];
					echo 'green';
					mysqli_close($conn);
					break;
				}
			}	
		}
	}


	//signup duplicate login check
	if (!empty($_POST['signup_email'])) 
	{
		$email 		= $_POST['signup_email'];
		$sql 		= "select * from users where email='$email'";
		$conn 		= $GLOBALS['conn'];
		$result 	= mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result) == 0){
			echo "green";
		}else{
			echo "red";
		}
	}


	//login check {red/green}
	if (!empty($_POST['logger_email']) && !empty($_POST['logger_pass'])) 
	{
		$email 		= $_POST['logger_email'];
		$password 	= $_POST['logger_pass'];
		$sql 		= "select * from users where email='$email' and password='$password'";
		$conn 		= $GLOBALS['conn'];
		$result 	= mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result) == 1){
			
			echo "green";
		}else{
			echo "red";
		}
	}

	//valid account check {red/green}
	if (!empty($_POST['logger_email']) && !empty($_POST['logger_code'])) 
	{
		$email 		= $_POST['logger_email'];
		$code 	= $_POST['logger_code'];
		$sql 		= "select * from users where email='$email' and v_code='$code'";
		$conn 		= $GLOBALS['conn'];
		$result 	= mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result) == 1){
			echo "green";
		}else{
			echo "red";
		}
	}

	function makeVerifiedAccount($email,$code)
	{
		if (!empty($email) && !empty($code)) 
		{
			$sql 		= "UPDATE users SET verification='yes' WHERE email='$email' and v_code='$code'";
			$conn 		= $GLOBALS['conn'];	
			if(mysqli_query($conn, $sql))
			{
				$_SESSION["verified"]	= "yes";
				return true;
			}
			else{
				return false;
			}
		}
	}
	function sendCodeForVerification($uname,$email)
	{
		$code=generateRandomString(6);
		if (sendMailTo($uname,$email,$code)) 
		{
			$sql 		= "UPDATE users SET v_code='$code' WHERE email='$email' and verification='no'";
			$conn 		= $GLOBALS['conn'];	
			if(mysqli_query($conn, $sql))
			{
				return true;
			}
			else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	function creteUser($name,$email,$uname,$pass,$mob,$add,$gender,$dob,$type ='customer') 
	{
		$conn=$GLOBALS['conn'];
		$v_code=generateRandomString(6);
		$sql = "insert into users values('".$name."','".$email."','".$uname."','".$pass."','".$mob."','".$add."','".$gender."','".$dob."','"."no"."','".$v_code."','".$type."','')";
		//echo $sql;
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		if($result)
		{
			if(sendMailTo($uname,$email,$v_code))
			{
				return true;
			}
			else
			{
				return false;
			}
		}else{
			echo "<br/> SQL Error<br/>".mysqli_error($conn);
		}
	}

	//creteUser('Arif','kingstonezoan@gmail.com','TIME','1727','+8801959609919','adabar','male','27/01/1996','stuff');
	
	function all() 
	{
		$sql = "select * from users";
		$conn=$GLOBALS['conn'];
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				// if($row['email']==$email && $row['password']==$pass)
				// {
					if($row['type']=="stuff")
					{
						echo "name: ".$row['name']."<br/>email: ".$row['email']."<br/>PASSWORD: ".$row['password']."<br/><br/>";
					}
				// }
				
			}
			mysqli_close($conn);	
		}
	}
	function isUser($email,$pass,$type = 'customer') 
	{
		$sql = "select * from users where type='$type'";
		$conn=$GLOBALS['conn'];
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['email']==$email && $row['password']==$pass && $row['type']==$type)
				{
					//successfully login
					$_SESSION["name"]	= $row['name'];
					$_SESSION["username"]	= $row['username'];
					$_SESSION["gender"]		= $row['gender'];
					$_SESSION["verified"]	= $row['verification'];
					$_SESSION["logger_type"]= $row['type'];			
					$_SESSION["email"]		= $row['email'];
					$_SESSION["mobile"]	= $row['mobile'];
					$_SESSION["address"]	= $row['address'];
					$_SESSION["dob"]	= $row['dob'];
					return true;
					mysqli_close($conn);
					break;
				}
			}
			return false;	
		}
	}
	function uniqueEmail($email) 
	{
		$sql = "select * from users";
		$conn=$GLOBALS['conn'];
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if( $row['email'] == $email )
				{
					return false;
					mysqli_close($conn);
					break;
				}
			}
			return true;	
		}
	}
?>