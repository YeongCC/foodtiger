<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<header>
  <nav class="navbar navbar-expand-md  navbar-dark fixed-top" style="background-image: linear-gradient( 109.6deg,  rgba(255,207,84,1) 11.2%, rgba(255,158,27,1) 91.1% );">
    <a class="navbar-brand" href="index.php"><img src="image/logo 256x256.png" alt="logo" width="30" height="30" style="margin-left:30%; display: block;max-width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 " id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="category.php">Categories</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="foodpage.php">Foods</a>
        </li>
        <?php if (isset($_SESSION['Email'])) { 
              //  $sql = "SELECT Email FROM customer WHERE Email='$_SESSION[Email]'";
              //  $query = mysqli_query($conn,$sql);
              //  $row=mysqli_fetch_array($query);?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown"  data-toggle="dropdown" >
        <?php echo $_SESSION['Name'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="userprofile.php">Profile</a>
          <a class="dropdown-item" href="cart.php">Cart</a>
          <a class="dropdown-item" href="paymenthistory.php">Payment History</a>
        </div>
      </li>
          <li class="nav-item active"><a class="nav-link" href="database/lognoutcode.php" style="width:auto;" onclick="return confirm('Are you sure?')">Logout</a></li>
        <?php
        } else { ?>
          <li class="nav-item active"><a class="nav-link" href="#" data-toggle="modal" data-target="#login" style="width:auto;">Login</a></li>
          <li class="nav-item active"><a class="nav-link" href="#" data-toggle="modal" data-target="#signUp" style="width:auto;">Sign Up</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>
  <!-- Login -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog  modal-lg">
    <form class="modal-content animate" action="database/logincode.php" method="post">
      <div class="imgcontainer">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="container1">
        <h1>Login</h1>
        <hr>
        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="Email" id="Email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password" required>

        <button type="submit" class="button2" name="login" id="login">Login</button>
      </div>

      <div class="container1" style="background-color:#f1f1f1">
        <span class="psw">No Account??<a href="#" data-toggle="modal" data-target="#signUp">Register</a></span>
      </div>
    </form>
  </div>
  </div>


  <div class="modal fade" id="signUp" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <form class="modal-content animate" name="register" action="database/registercode.php" method="POST" style="margin-top:0%;">
        <div class="imgcontainer">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="container1">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="Username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="Name" value="" required>

          <label for="Email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="Email" value="" required>

          <label for="PhoneNo"><b>Mobile Number</b></label>
          <input type="text" placeholder="Enter Mobile Number" name="PhoneNo" value="" required>

          <label for="Address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="Address" value="" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="Password" id="Password" value="" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="Password2" id="Password2" value="" required>


          <p>By creating an account you agree to our <a href="term.php" style="color:dodgerblue">Terms & Privacy</a>.</p>
          <div class="clearfix">
            <button type="button" data-dismiss="modal" class="cancelbtn2 ">Cancel</button>
            <button type="submit" class="signupbtn" name="insert">Submit</button>
          </div>
        </div>
      </form>

</header>
<script>
  var modal = document.getElementById('id01');
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>