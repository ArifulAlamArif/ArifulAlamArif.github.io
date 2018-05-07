<?php include "../header/header.php";
    if($_SESSION["verified"]=="yes")
    {
        
?>
<html>
<head>
	<meta charset="utf-8">     
    <link rel="stylesheet" type="text/css" href="../customer/c_home.css">
    <link rel="stylesheet" type="text/css" href="../customer/c_profile.css">
</head>
<body >
<center>
<table cellpadding="0" cellspacing="0" width="100%" border="1">
<tr>
    <td width="250px" valign="top">
        <h2 style=" padding: 0; margin: 0; font-size: 25px; text-align: center;text-shadow: 1px 2px 12px rgba(43, 196, 255, 1);">&nbsp;Account</h2><hr/>
        <ul id="item">
            <li><a href="c_home.php" >Dashboard</a></li>
            <li><a href="order.php" >Orders</a></li>
            <li><a href="Wishlist.php" >Wishlist</a></li>
            <li><a href="c_profile.php" >View Profile</a></li>
            <li><a href="c_edit_profile.php" >Edit Profile</a></li>
            <li><a href="c_change_password.php" >Change Password</a></li>
        </ul>  
    </td>
    <td valign="top">
    <center>
        <h2 style="color: green; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="updated") {  echo "Successfully Updated!!";  } ?></h2>
        <h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="error") {  echo "Please give information in correct form!!";  } ?></h2>
        <form class="s" action="check_c_change_password.php" onsubmit="return vf();" method="POST">
        <table cellpadding="0" cellspacing="0" width="100%" style="border-right: 1px solid #ccc;border-top: 1px solid #ccc;">
            <tr>
                <th colspan="4"><h2 style="border-bottom: 2px solid crimson;color: crimson;">Change Password</h2></th>
            </tr>
            <tr>
                <td><h3>Current Password</h3></td>
                <td>:</td>
                <td><input class="deco" id="currpass" onkeyup="currPassChange(),errors()" name="currpass" type="password" value=""></td>
                <td><span id="errorCurrPass"></span></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><h3>New Password</h3></td>
                <td>:</td>
                <td><input class="deco" id="pass" onkeyup="passChange(),errors()" name="pass" type="password" value=""></td>
                <td><span id="errorPass"></span></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><h3>Confirm Password</h3></td>
                <td>:</td>
                <td><input class="deco" id="cpass" onkeyup="cpassChange(),errors()" name="cpass" type="password" value=""></td>
                <td><span id="errorCpass"></span></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td colspan="3">
                    <div id='submit_signup'><input id="submit" type="submit" name="pass_update" value="Submit"></div>
                </td>
                <td><div id='reset_signup'><input type="reset"></div></td>
            </tr>
        </table>
    </form>
    </center>
    </td>
</tr>
</table>
</center>
<script src="c_change_password.js"></script>
</body>
</html>
<?php   
    }
    else{
?>
<h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;">Please, verify your account!!<br>Click <a href="../valid_account/valid_account.php">HERE</a> for verified your account, Thank you.</h2>
<?php
    }
    include "../footer/footer.php"; 
?>