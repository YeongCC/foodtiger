<?php  
include "database/connection.php";
session_start();  
if (isset($_SESSION['Email'])) {
	$Email = $_SESSION['Email'];
	$query = "SELECT * FROM customer WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['cus_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
    $PhoneNo = $row['PhoneNo'];
    $Address = $row['Address'];

	}}
?>
<!DOCTYPE html>  
<html>  
 <head>  
 <title>FoodTiger - User Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
 </head>  
 <body>  
 <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>
    </header>
    <div class="imgcontainer">
      <img src="image/avatar6.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <div>
    <h2 style="text-align:center;">Profile</h2><hr>
    <div style="text-align:right;">
    <a class="btn btn-warning" href="editprofile.php" style="text-align:right;">Edit <i class='fas fa-edit'></i></a>
    </div>

      <font color= "brown" style="font-size: 40px;"> Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font>      <?php echo $Email; ?>    <br/><br/><br/>

      <font color= "brown" style="font-size: 40px;"> Username  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font>  <?php echo $Name; ?>  <br/><br/><br/>

      <font color= "brown" style="font-size: 40px;"> Phone Number &nbsp;&nbsp;&nbsp;:</font>   <?php echo $PhoneNo; ?>    <br/><br/><br/>
 
      <font color= "brown" style="font-size: 40px;"> Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font>    <?php echo $Address; ?>    <br/><br/><br/><br/><br/><br/>

      

      </div>
    </div> 
  
  </body>
    <footer>
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
</html>
