<?php  
	// include '../header/header.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Products</title>   
		<link rel="stylesheet" href="pstyle.css"/>	
	</head>
<!--Changing the number in the column_# class changes the number of columns-->
<body>
	<div id="wrap">
		<div id="columns" class="columns_4" style="">

			<?php
        //include "../db/db.php";
          $sql = "select * from product";
      $conn = mysqli_connect("localhost","root","","scart");
      $result = mysqli_query($conn, $sql);  
      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_assoc($result))
        {
          
        ?>
        <figure>
		  	<img src="../products/img/<?php echo $row['cname'];?>/<?php echo $row['pimage'];?>" alt="">
			<figcaption><?php echo $row['pname'];?></figcaption>
		    <div class="price"><?php echo "$".$row['price'];?></div>
		    <a class="button" href="#">Buy Now</a>
		</figure>
        <?php

        } 
      }
      mysqli_close($conn);
        ?>


		</div>
	</div>
</body>
</html>
<?php 
// include '../footer/footer.php'; 
?>