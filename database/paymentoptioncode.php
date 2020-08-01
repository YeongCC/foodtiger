<?php
require 'connection.php';

	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "foodtiger";
	// $sqlconnection = new mysqli($servername, $username, $password,$dbname);
	// if ($sqlconnection->connect_error) {
    // 	die("Connection failed" . $sqlconnection->connect_error);
	// }
session_start();
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

	// $currentOrderID = getLastID("order_Num","orders")+1;
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $username=$_SESSION['Email'];
	// for ($i=0; $i >0; $i++) { 
	// 	insertOrderDetailQuery($currentOrderID, $foodname , $quantity, $price,$total ,$username);
	// }
	
    $gtotal = $gtotal + $total;
     $query = "INSERT INTO orders (foodname, price,  quantity, username) 
              VALUES (' $foodname ',' $price ',' $quantity ',' $username ')";
              $success = $conn->query($query);         
               echo "<script>window.location.href='../payment.php';</script>";
      if(!$success)
      { 
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>
        <?php
	}      
	
  }
//   function insertOrderDetailQuery($orderID,$foodname,$price,$quantity,$username) {
// 	global $sqlconnection;
// 	$addOrderQuery = "INSERT INTO orders (order_Num,foodname, price,  quantity, username) VALUES ('{$orderID }','{$foodname}','{$price}','{$quantity}','{$username}')";

// 	if ($sqlconnection->query($addOrderQuery) === TRUE) {
// 			echo "inserted.";
// 		} 

// 	else {
// 			//handle
// 			echo "someting wong";
// 			echo $sqlconnection->error;

// 	}
// }


//   function getLastID($id,$table) {
// 	global $sqlconnection;

// 	$query = "SELECT MAX({$id}) AS {$id} from {$table} ";

// 	if ($result = $sqlconnection->query($query)) {
		
// 		$res = $result->fetch_array();

// 		//if currently no id in table
// 		if ($res[$id] == NULL)
// 			return 0;

// 		return $res[$id];
// 	}
// 	else {
// 		echo $sqlconnection->error;
// 		return null;
// 	}
// }

        ?>