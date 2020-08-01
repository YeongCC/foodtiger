<?php
session_start();
require 'connection.php';
unset($_SESSION["cart"]);
header("location: ../foodpage.php");
  ?>