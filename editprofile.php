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
		$userpassword = $row['Password'];
		$name = $row['Name'];
    $PhoneNo = $row['PhoneNo'];
    $Address = $row['Address'];

	}

if (isset($_POST['update'])) {
require "database/protect.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 


$gump->validation_rules(array(
	'Name'   => 'required|alpha_space|max_len,30|min_len,2',
	'currentpassword' => 'required|max_len,50|min_len,6',
	'newpassword'    => 'max_len,50|min_len,6',
));
$gump->filter_rules(array(
	'Name' => 'trim|sanitize_string',
	'currentpassword' => 'trim',
	'newpassword' => 'trim',
	));
$validated_data = $gump->run($_POST);
if($validated_data === false) {
	?>
<script>alert(' <?php echo $gump->get_readable_errors(true); ?>  ');window.location.href='editprfile.php'</script>;
<?php
}

else if (!password_verify($validated_data['currentpassword'] ,  $userpassword))   
{
	echo  "<script>alert('Current password is wrong! ');window.location.href='editprofile.php'</script>";
}
else if (empty($_POST['newpassword'])) {
	    $name = $validated_data['Name'];
      $updatequery1 = "UPDATE customer SET Name = '$name' ,  WHERE cus_id = '$userid' " ;
      $result2 = mysqli_query($conn , $updatequery1) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
    window.location.href='editprofile.php';</script>";
}
else {
	echo "<script>alert('An error occured, Try again!');window.location.href='editprofile.php'</script>";
}
}
else if (isset($_POST['newpassword']) &&  ($_POST['newpassword'] !== $_POST['confirmnewpassword'])) 
{
	echo  "<script>alert(' New password and Confirm New password do not match ');window.location.href='editprofile.php'</script>";
	
}
else {
      $name = $validated_data['Name'];
      $PhoneNo = $validated_data['PhoneNo'];
      $Address = $validated_data['Address'];
      $pass = $validated_data['newpassword'];
      $userpassword = password_hash("$pass" , PASSWORD_DEFAULT);

$updatequery = "UPDATE customer SET password = '$userpassword', name='$name', PhoneNo= '$PhoneNo',Address= '$Address' WHERE cus_id='$userid'";
$result1 = mysqli_query($conn , $updatequery) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
	window.location.href='editprofile.php';</script>";
}
else {
	echo "<script>alert('An error occured, Try again!');</script>";
}
}
}
}
 
?>  
<!DOCTYPE html>
<html>  
 <head>  
 <title>FoodTiger - Edit Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/confirmUpdate.js"></script>
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
    <form name="" action="editprofile.php" method="POST">
    <h2 style="text-align:center;">Edit Profile</h2><hr>
    <div style="text-align:right;">
    <a class="btn btn-danger" href="userprofile.php" style="text-align:right;">Cancel <i class='fas fa-undo'></i></a>
    </div>
      <label for="Email"><b>Email</b></label>
      <input type="text" name="Email" id="Email" value="<?php echo $Email; ?>" disabled>
      <label for="Name"><b>Username</b></label>
      <input type="text" name="Name" id="Name" value="<?php echo $name; ?>">
      <label for="PhoneNo"><b>Phone Number</b></label>
      <input type="text" name="PhoneNo" id="PhoneNo" value="<?php echo $PhoneNo; ?>">
      <label for="Address"><b>Address</b></label>
      <input type="text" name="Address" id="Address" value="<?php echo $Address; ?>">  
      <label for="currentpassword"><b>Current Password</b></label>
      <input type="password" value="" name="currentpassword" id="currentpassword" required> 
      <label for="newpassword"><b>New Password</b></label>
      <input type="password" value="" name="newpassword" id="newpassword" required> 
      <label for="confirmnewpassword"><b>Confirm New Password</b></label>
      <input type="password" value="" name="confirmnewpassword" id="confirmnewpassword" required> 
      <input type="submit" name="update" class="btn btn-warning text-uppercase text-white" value="Update" >
    </form>
    </div>
    <footer style="margin-top:5%;">
        <?php 
          require "navandfooter/footer.php";
        ?>