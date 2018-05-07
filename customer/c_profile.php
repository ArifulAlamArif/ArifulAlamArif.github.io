<?php include "../header/header.php";
    if($_SESSION["verified"]=="yes")
    {
        include "../db/db.php";
        $conn = getConnection();
        $sql = "select * from users where email='".$_SESSION['email']."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
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
            <form class="s" action="check.php" onsubmit="return vf();" method="POST">
                <table cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #ccc;">
                    <tr>
                        <th colspan="4"><h2 style="border-bottom: 2px solid crimson;color: crimson;">Profile</h2></th>
                    </tr>
                    <tr>
                        <td><h3>Name</h3></td>
                        <td>:</td>
                        <td><input readonly class="deco" name="name" type="text" value="<?=$row['name']?>"></td>
                        <td><span id="errorName"></span></td>
                    </tr>       
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Email</h3></td>
                        <td>:</td>
                        <td>
                            <input readonly class="deco" name="email" type="text" value="<?=$row['email']?>">
                        </td>
                        <td><span id="errorEmail"></span></td>
                    </tr>       
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Username</h3></td>
                        <td>:</td>
                        <td><input readonly class="deco" name="uname" type="text" value="<?=$row['username']?>"></td>
                        <td><span id="errorUname"></span></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Address</h3></td>
                        <td>:</td>
                        <td><textarea readonly class="deco" style="resize: none;" name="address" rows="2" cols="30"><?=$row['address']?></textarea></td>
                        <td><span id="errorAdd"></span></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Mobile</h3></td>
                        <td>:</td>
                        <td><input readonly class="deco" name="mob" type="text" value="<?=$row['mobile']?>"></td>
                        <td><span id="errorMob"></span></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Gender</h3></td>
                        <td>:</td>
                        <td>
                            <input readonly class="deco" name="Gender" type="text" value="<?=$row['gender']?>">
                        </td>
                        <td><span id="errorGender"></span></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td><h3>Date of Birth</h3></td>
                        <td>:</td>
                        <td>
                            <input readonly class="deco" type="text" name="date" value="<?=$row['dob']?>"/>
                        </td>
                        <td><span id="errorDob"></span></td>
                    </tr>       
                </table>
            </form>
            </center>
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
<h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;">Please, verify your account!!<br>Click <a href="../valid_account/valid_account.php">HERE</a> for verified your account, Thank you.</h2>
<?php
    }
    include "../footer/footer.php"; 
?>