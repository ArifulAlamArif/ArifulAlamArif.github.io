<?php include "../header/header.php";
    if($_SESSION["logger_type"]=="admin")
    {
?>
<html>
<head>
	<meta charset="utf-8">     
    <link rel="stylesheet" type="text/css" href="../admin/a_home.css">
</head>
<body >
<center>
<table cellpadding="0" cellspacing="0" width="100%" border="1">
	<tr>
        <td width="250px" valign="top">
            <h2 style=" padding: 0; margin: 0; font-size: 25px; text-align: center;text-shadow: 1px 2px 12px rgba(43, 196, 255, 1);">&nbsp;Account</h2><hr/>
            <ul id="item">
                <li><a href="admin.php" >Dashboard</a></li>
                <li><a href="order.php" >Orders</a></li>
                <li><a href="../products" >Products</a></li>
                <li><a href="../slider" >Slider</a></li>
                <li><a href="a_profile.php" >View Profile</a></li>
                <li><a href="a_edit_profile.php" >Edit Profile</a></li>
                <li><a href="a_change_password.php" >Change Password</a></li>
            </ul>  
        </td>
        <td valign="top">
            <h2 style="color: green; text-align: center;text-shadow: 1px 1px 1px black;">Welcome <?php echo $_SESSION['username'] ?>!!</h2>
        </td>
    </tr>
</table>
</center>
<script>
</script>
</body>
</html>
<?php 	
    }
    else{
?>
<h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;">Please, login as ADMIN!!<br>Click <a href="../login/login.php">HERE</a> for login, Thank you.</h2>
<?php
    }
    include "../footer/footer.php"; 
?>