<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Basic jQuery Slider | IT-BARI.com</title>   
    <link rel="stylesheet" href="../slider/bjqs.css">
    <link rel="stylesheet" href="../slider/style.css"/>   
  </head>
  <body> -->
  
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
            <li><img src="../slider/img/<?php echo $row['pic_type'];?>/<?php echo $row['filename'];?>" alt="">
              <div class="bjqs-caption">
                <a href="<?php echo $row['links'];?>" target="_blank"><?php echo $row['pic_name']."  [".$row['pic_type']."]";?></a> 
              </div>
            </li>
        <?php

        } 
      }
      mysqli_close($conn);
        ?>
        </ul>
        <!-- end Basic jQuery Slider -->
      </div>
    </div>  
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
  <script class="secret-source">
      jQuery(document).ready(function($) {
        
        $('#banner-slide').bjqs({
        animtype      : 'fade',//fade/slide
        height        : 354,
        width         : 780,
        responsive    : true,
        randomstart   : true
        });
        
      });
  </script>   

  
  <script src="../slider/js/bjqs-1.3.min.js"></script>
  <script type="text/javascript" src="../slider/js/acor.js"></script>
  
  </body>