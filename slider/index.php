<?php 
	include '../header/header.php'; 
	if ($_SESSION["logger_type"] == 'admin') 
	{

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Slider</title>   
		<link rel="stylesheet" href="bjqs.css">
		<link rel="stylesheet" href="sliderStyle.css"/>	
		<style type="text/css">
		#adminHome a
		{
		    color: #fff;
		    text-decoration:none;
		    background: #000;
		    padding: 10px 20px;
		    display: block;
		    text-shadow: 1px 1px 1px crimson;
		}
		#adminHome a:hover
		{
		    background: #ccc;
		    color: crimson;
		    box-shadow: 1px 1px 1px 1px red;
		    text-shadow: 1px 1px 1px black;
		}
		</style>
	</head>
	<body>
	
    <div class="bnrLft">
      <div id="banner-slide">
        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
        <?php
        include "../db/db.php";
        	$sql = "select * from slider";
			$conn = getConnection();
			$result = mysqli_query($conn, $sql);	
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					
        ?>
          	<li><img src="img/<?php echo $row['pic_type'];?>/<?php echo $row['filename'];?>" alt="">
            	<div class="bjqs-caption">
              	<a href="<?php echo $row['links'];?>" target="_blank"><?php echo $row['pic_name']."  [".$row['pic_type']."]";?></a> </div>
          	</li>
        <?php

				}	
			}
			mysqli_close($conn);
        ?>
        </ul>
        <!-- end Basic jQuery Slider -->
      </div>
      <a id='adminHome' href="../admin/admin.php" >Back To --> HOME</a>
    </div>	
    <fieldset style="">
	<legend><b>Options</b></legend>
	<center>
		<button id="add_btn">ADD PICTURE</button>
		<button id="rmv_btn">REMOVE PICTURE</button>
		<button id="upt_btn">UPDATE PICTURE</button>
	</center>
	</fieldset>
	<div>

														<!-- ADD Scope -->
		<div style="float: left;">
			<fieldset style="width: 400px; display: none;" id="add_scope">
		    <legend><b>ADD PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return addError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="25%">Picture Name</td>
						<td width="10%">:</td>
						<td width="40%"><input id='name' onkeyup="checkall()" name="name" type="text" value=""></td>
						<td><span id="errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Picture link</td>
						<td width="10%">:</td>
						<td width="40%"><textarea id='link' onkeyup="checkall()" name="link" type="text" value="" style="width: 160px;height:110px;resize: none;" rows="11" cols="30"></textarea></td>
						<td><span id="errorLink"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="type" id='offer' onchange="checkall()" type="radio" value="offers" required>Offer
							<input name="type" id='ads' onchange="checkall()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        <center>
		        	<img id="image" width="300" height="220" src="img/add_image.png" />
		        </center>
		        <br />
		        <input id="file" type="file" name="myfile" accept=".jpg, .jpeg, .png"/><span id="add_errorImage"></span>
		        <hr />
		        <input type="submit" name="add_submit" value="Submit">
				<br />
		    </form>
			</fieldset>
		</div>


														<!-- Update Scope -->
		<div style="float: left;">
			<fieldset style="width: 400px;" id="upt_scope">
		    <legend><b>Update PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return uptError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr><div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>Select type first</em></div>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="upt_type" id='upt_offer' onchange="upt_checkType()" type="radio" value="offers" required>Offers
							<input name="upt_type" id='upt_ads' onchange="upt_checkType()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="upt_errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Select Name</td>
						<td width="10%">:</td>
						<td width="40%">
							<select name="upt_name" id="upt_name" onchange="upt_checkName()">
							</select>
						</td>
						<td><span id="upt_errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td colspan="4"> 
							<center>
					        	<img id="upt_image" width="300" height="220" src="img/add_image.png" />
					        </center>
					        <br />
					        <input id="upt_file" type="file" name="upt_file" accept=".jpg, .jpeg, .png"/>
						</td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr><td colspan="4">
						<div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>For Update</em></div>
						<hr/></td></tr>
					<tr>
						<td width="25%">Picture Name</td>
						<td width="10%">:</td>
						<td width="40%"><input id='newname' onkeyup="upt_checkall()" name="name" type="text" value=""></td>
						<td><span id="errornewName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Picture link</td>
						<td width="10%">:</td>
						<td width="40%"><textarea id='newlink' onkeyup="upt_checkLink()" name="link" type="text" value="" style="width: 160px;height:110px;resize: none;" rows="11" cols="30"></textarea></td>
						<td><span id="errornewLink"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="newtype" id='newoffer' onchange="upt_checkall()" type="radio" value="offers" required>Offer
							<input name="newtype" id='newads' onchange="upt_checkall()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="errornewType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        <input type="submit" name="upt_submit" value="UPDATE">
				<br />
		    </form>
			</fieldset>
		</div>


														<!-- Remove Scope -->
	    <div style="float: left;">
			<fieldset style="width: 400px; display: none;" id="rmv_scope">
		    <legend><b>REMOVE PICTURE</b></legend>
		    <form form action="checkslider.php" method="POST" onsubmit="return rmvError();" enctype="multipart/form-data">
		    	<table width="100%" cellpadding="0" cellspacing="0">
					<tr><div style="text-align: center;font-size: 20px;color: red; text-decoration: underline;"><em>Select type first</em></div>
						<td>Type</td>
						<td>:</td>
						<td> 
							<input name="rmv_type" id='rmv_offer' onchange="rmv_checkType()" type="radio" value="offers" required>Offers
							<input name="rmv_type" id='rmv_ads' onchange="rmv_checkType()" type="radio" value="ads" required>Ads
						</td>
						<td><span id="rmv_errorType"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td width="25%">Select Name</td>
						<td width="10%">:</td>
						<td width="40%">
							<select name="rmv_name" id="rmv_name" onchange="rmv_checkName()">
							</select>
						</td>
						<td><span id="rmv_errorName"></span></td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
					<tr>
						<td colspan="4"> 
							<center>
					        	<img id="rmv_image" width="300" height="220" src="img/add_image.png" />
					        </center>
					        <br />
						</td>
					</tr>		
					<tr><td colspan="4"><hr/></td></tr>
				</table>
		        
		        
		        <input type="submit" name="rmv_submit" value="REMOVE">
				<br />
		    </form>
			</fieldset>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		//BUTTON's
		$(document).ready(function(){

		    $("#add_btn").click(function(){
		        $("#add_scope").toggle(1000);
		    });
		    $("#rmv_btn").click(function(){
		        $("#rmv_scope").toggle(1000);
		    });
		    $("#upt_btn").click(function(){
		        $("#upt_scope").toggle(1000);
		    });
		});

	    function isValidURL(string) 
	    {
		  	var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
		  	if (res == null)
		    	return false;
		  	else
		    	return true;
		};
		
		/*function getfile()
		{
			var fileName = document.getElementById('file').files[0].name;
			var fileSize = document.getElementById('file').files[0].size;
			var fileType = document.getElementById('file').files[0].type;
			var fileModifiedDate = document.getElementById('file').files[0].lastModifiedDate;
			loc = document.getElementById('file').value;
			document.getElementById('image').src = loc;
			var file_info = fileName+"\n"+fileSize+"\n"+fileType+"\n"+fileModifiedDate+"\n"+loc;
			alert(file_info);

		}*/
	</script>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script class="secret-source">
			jQuery(document).ready(function($) {
			  
			  $('#banner-slide').bjqs({
				animtype      : 'slide',
				height        : 354,
				width         : 780,
				responsive    : true,
				randomstart   : true
			  });
			  
			});
	</script>		

	
	<script src="js/bjqs-1.3.min.js"></script>
	<script type="text/javascript" src="js/acor.js"></script>
	<script src="validateJS/add.js"></script>
	<script src="validateJS/upt.js"></script>
	<script src="validateJS/rmv.js"></script>
	
	</body>
</html>
<?php 
	}
	else
	{
		header("location: ../index/index.php?status=loginAsAdmin");
	}
	include '../footer/footer.php'; 
 ?>