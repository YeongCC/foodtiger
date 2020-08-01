<?php
include "database/connection.php";
session_start();  
require 'database/pdo.php';
$sql = 'SELECT * FROM food';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
$results_per_page = 6;
$sql='SELECT * FROM food';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM food LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);              
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Foods</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/index.css">
    
</head>
<body>
<header>        
        <?php 
          require "navandfooter/nav.php";
        ?>
    </header>
    <div class="in1">
        <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/food.jpg" alt="food" width="1100" height="500">
            <div class="carousel-caption">
              <h1>FoodTiger</h1>
              <p class="p2">Hungry always Hungry</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food4.jpg" alt="food2" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Quality Food</h1>
              <p class="p2">We deliver Quality Food and deliver On Time!</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food3.jpg" alt="food3" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Best Customer Service</h1>
              <p class="p2">We deliver Best Customer Service and Support!</p>
            </div>   
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="container" style="margin-top:3%;"><h2>Foods</h2>
    <form style="margin-top:3%;" action="food.php" method="POST">
        <input type="text" name="search" placeholder="Search..." id="search">
    </form>
    </div>
    <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
        <div class="row">
            <?php
               while($row = mysqli_fetch_array($result)) {     
            ?>  
            <div class="col-sm-4 " style="margin-top:20px;">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="inner" style="text-align:center">
                            <a href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>"><img src="image/<?php echo $row['imageFood'];?>"  class="img-fluid"  style="width:400px; height:300px;object-fit: contain;"></a>
                        </div>
                        <h5 class="card-title"><?php echo $row['nameFood'];?></h5>
                        <hr>
                        <div class="card-heading"><?php echo $row['description'];?></div>
                        <div class="card-heading"><h5>RM<?php echo $row['price'];?></h5></div>  
                    </div>
                </div>
            </div>  
            <?php
                } 
            ?>
        </div>
        <ul class="pagination pagination-lg">  
                      <?php
                      for ($page=1;$page<=$number_of_pages;$page++) {
                        echo ' <li class="page-item"><a class="page-link" href="foodpage.php?page=' . $page . '">' . $page . '</a> </li> ';}
                        ?>                
        </ul>
    </div>
    </div>
                  
    <footer style="margin-top:5%;">
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
    </body>
</html>