<?php
include "../db/db.php";
	

	if (!empty($_POST['add_showCat'])) 
	{
		$sql = "select * from category";
		$conn = getConnection();
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			?>
			<option value="" style="color: red; text-decoration: underline;">Select your Product</option>
			<?php
			while($row=mysqli_fetch_assoc($result))
			{
?>				
				<option value="<?php echo $row['cid']." ".$row['cname']; ?>"><?php echo $row['cname']; ?></option>
<?php
			}	
		}
		mysqli_close($conn);
	}


	if (!empty($_POST['ufname'])) 
	{
		$sql = "select * from slider where filename='".$_POST['ufname']."'";
		$conn = getConnection();
		//echo $_POST['ufname'];
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
			echo $row['links'];
		}
		mysqli_close($conn);
	}

	if (!empty($_POST['ptype']) && !empty($_POST['pname'])) 
	{
		$sql = "select * from slider where pic_name='".$_POST['pname']."'";
		$conn = getConnection();
		$result = mysqli_query($conn, $sql);	
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['pic_type']==$_POST['ptype'])
				{
					echo 'red';
					mysqli_close($conn);
					break;
				}
			}	
		}
	}

	if (isset($_POST['add_submit'])) 
	{
		$name = $_POST['add_name'];
		$price = $_POST['add_Price'];
		$description = $_POST['add_Description'];
		$quantity = $_POST['add_Quantity'];
		$discounts = $_POST['add_Discounts'];
		$dd = $_POST['add_dd'];
		$add_Category = $_POST['add_Category'];
		$ex =explode(" ", $add_Category);
		$cid = $ex[0];
		$cname = $ex[1];
		$filename = $_FILES['myfile']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$file  = $name.'_'.$cname.'.'.$ext;
		
		$conn = mysqli_connect("localhost","root","","scart");
		$result = mysqli_query($conn, "SELECT max(pid) as pid FROM product");
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_assoc($result);
			$pid =$row['pid']+1;
			$file = $pid."_".$file;

			$fileUploadPath = "img/".$cname.'/'.$file;
			if(move_uploaded_file($_FILES['myfile']['tmp_name'], $fileUploadPath))
			{
				echo "Upload Success"."</br>";
				//$conn = getConnection();
				$sql = "insert into product values('','$name',$price, $quantity, '$description', '$cname', $discounts, '$file', '$dd')";
				echo $sql;
				if(mysqli_query($conn, $sql))
				{
					header("location: index.php?status=uploadYes");
					//echo "status=success"."</br>";
				}
				else{
					header("location: index.php?status=uploadNo");
				}		
			}
		}
	}

	if (isset($_POST['upt_submit'])) 
	{
		$name = $_POST['name'];
		$type = $_POST['newtype'];
		$link = $_POST['link'];
		$filename = $_FILES['upt_file']['name'];
		

		if ($filename == "") 
		{	
			$ext = pathinfo($_POST['upt_name'], PATHINFO_EXTENSION);
			$file  = $name.'_'.$type.'.'.$ext;
			$fileUploadPath = "img/".$type.'/'.$file;
	 		$sql = "UPDATE slider SET pic_name='".$name."',pic_type='".$type."',filename='".$file."',links='$link' WHERE filename='".$_POST['upt_name']."'";
	 		//echo "here"."</br>".$name."</br>".$type."</br>".$filename."</br>".$_POST['upt_name']."</br>".$file."</br>";
	 		//echo "</br> $sql";
	 		if(rename("img/".$_POST['upt_type'].'/'.$_POST['upt_name'], "img/".$type.'/'.$file))
	 		{
	 			//echo "Rename Success"."</br>";
	 		}
		}
		else
		{
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$file  = $name.'_'.$type.'.'.$ext;
			$fileUploadPath = "img/".$type.'/'.$file;
	 		$sql = "UPDATE slider SET pic_name='".$name."',pic_type='".$type."',filename='".$file."',links='$link' WHERE filename='".$_POST['upt_name']."'";
	 		//echo "There"."</br>".$name."</br>".$type."</br>".$filename."</br>".$_POST['upt_name']."</br>".$file."</br>".$fileUploadPath;
	 		//echo "</br> $sql";
	 		if($_POST['upt_name'] !== $file)
			{
				unlink("img/".$_POST['upt_type'].'/'.$_POST['upt_name']);
			}
	 		if(move_uploaded_file($_FILES['upt_file']['tmp_name'], $fileUploadPath))
			{
				//echo "Upload Success"."</br>";
			}
		}

		$conn = getConnection();

		if(mysqli_query($conn, $sql))
		{
			header("location: index.php?status=updated");
			//echo "status=success"."</br>";
		}
		else {
			echo "status=error"."</br>";
		}
	}

	if (isset($_POST['rmv_submit'])) 
	{
		//echo $_POST['rmv_name']."</br>";
		$conn = getConnection();
		$sql = "DELETE FROM slider WHERE filename='".$_POST['rmv_name']."'";
		//echo $sql."</br>";
		//echo 'img/'.$_POST['rmv_type'].'/'.$_POST['rmv_name'];
		
		if(mysqli_query($conn, $sql))
		{
			unlink('img/'.$_POST['rmv_type'].'/'.$_POST['rmv_name']);
			header("location: index.php?status=removed");
			//echo "status=success"."</br>";
		}
	}
?>