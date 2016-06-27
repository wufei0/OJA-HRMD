<?php
$con = mysqli_connect("docutracking","hr","hr","oja");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
?>
