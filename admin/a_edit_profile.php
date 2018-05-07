<?php include "../header/header.php";
    if($_SESSION["verified"]=="yes")
    {
        include "../db/db.php";
        $conn = getConnection();
        $sql = "select * from users where email='".$_SESSION['email']."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $ex=explode("/", $row['dob']);
?>
<html>
<head>
	<meta charset="utf-8">     
    <link rel="stylesheet" type="text/css" href="../admin/a_home.css">
    <link rel="stylesheet" type="text/css" href="../admin/a_profile.css">
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
    <center>
        <h2 style="color: green; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="updated") {  echo "Successfully Updated!!";  } ?></h2>
        <h2 style="color: crimson; text-align: center;text-shadow: 1px 1px 1px black;"><?php if ($_GET['status']=="error") {  echo "Please give information in correct form!!";  } ?></h2>
        <form class="s" action="check_a_edit_profile.php" onsubmit="return vf();" method="POST">
        <table cellpadding="0" cellspacing="0" width="100%" style="border-right: 1px solid #ccc;border-top: 1px solid #ccc;">
            <tr>
                <th colspan="4"><h2 style="border-bottom: 2px solid crimson;color: crimson;">Edit profile</h2></th>
            </tr>
            <tr>
                <td><h3>Name</h3></td>
                <td>:</td>
                <td><input class="deco" id="name" onkeyup="nameChange(),errors()" name="name" type="text" value="<?=$row['name']?>"></td>
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
                <td><input class="deco" id="uname" onkeyup="unameChange(),errors()" name="uname" type="text" value="<?=$row['username']?>"></td>
                <td><span id="errorUname"></span></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><h3>Address</h3></td>
                <td>:</td>
                <td><textarea class="deco" style="resize: none;" id="add" onkeyup="addChange(),errors()" name="address" rows="2" cols="30"><?=$row['address']?></textarea></td>
                <td><span id="errorAdd"></span></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td><h3>Mobile</h3></td>
                <td>:</td>
                <td><input class="deco" id="mob" onkeyup="mobChange(),errors()" name="mob" type="text" value="<?=$row['mobile']?>"></td>
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
                    <input onkeyup="dateChange()" onchange="dateChange()" class="deco" style="width: 25%;" id='date' type="number" size="2" name="date" min="1" max="31" value="<?=$ex[0]?>" placeholder="DAY" />  /  
                    <input onkeyup="monthChange()" onchange="monthChange()" class="deco" style="width: 25%;" id='month' type="number" size="2" name="month" min="1" max="12" value="<?=$ex[1]?>" placeholder="MONTH"/>  /  
                    <input onkeyup="yearChange()" onchange="yearChange()" class="deco" style="width: 25%;" id='year' type="number" size="4" name="year" min="1960" max="2000" value="<?=$ex[2]?>" placeholder="YEAR"/>
                    <font size="4"><i>(dd/mm/yyyy)</i></font>
                </td>
                <td><span id="errorDob"></span></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td colspan="3">
                    <div id='submit_signup'><input id="submit" type="submit" name="submit" value="Submit"></div>
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
<script src="a_edit_profile.js">
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