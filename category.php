<?php
include "database/connection.php";
session_start();  
$page = @$_GET['page'];			
if($page == 0 || $page == 1){
    $page1 = 0;	
}
else {
    $page1 = ($page * 6) - 6;	
}
$search="";
if(isset($_REQUEST['search'])){
    $search=" and name like '%".$_REQUEST['search']."%'or description like '%".$_REQUEST['search']."%'";
}
$sql="select c_id,name,description,image from category where category_exixts='exixts'".$search." LIMIT ".$page1.", 6";
$result=$conn->query($sql); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Categories</title>
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
<body>
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
    <div class="container" style="margin-top:3%;"><h2>Categories</h2>
    <form style="margin-top:3%;" action="category.php" method="POST">
        <input class="search" type="text" name="search" placeholder="Search..." id="search">
    </form>
    </div>
    <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
        <div class="row">
          <?php
         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
					?> 
          <div class="col-sm-4" style="margin-top:20px">
            <div class="card h-100">
              <div class="card-body">
                <div class="inner" style="text-align:center">
                  <a href="food.php?category=<?php echo $row['c_id'];?>"><img src="image/<?php echo $row['image'];?>"  class="card-img-top"  style="width:400px; height:300px;object-fit: contain;"></a>
                </div>
                <h5 class="card-title"><?php echo $row['name'];?></h5>
                <hr>
                <div class="card-heading"><?php echo $row['description'];?></div>
                </div>
              </div>
            </div>     
            <?php
              } 
            
              ?>
        </div>
        <?php
        $result = $conn->query("SELECT * FROM category where category_exixts='exixts'");
        $count = $result->num_rows;      
        $a = $count / 9;
        $a = ceil($a);
        ?>
        <ul class="pagination pagination-lg"> 
          <?php
          for ($i = 1; $i <= $a; $i++) {?>
            <li class="page-item"><a class="page-link" href="category.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
          <?php
          }
          ?>
        </ul>

        <?php
       } else{?>
              <div class="row">
              <div class="container"  style="width:1500px; height:500px;" >
              <h1 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                <h1 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Result....</h1>
              </div>
              </div>
              <?php
              }?>
    </div>
    </div>
    <footer>
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
    
</body>
</html>