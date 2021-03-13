<?php
include("connection.php");
error_reporting(0);
 $n= $_GET['name'];
 $e= $_GET['email'];

?>


<!DOCTYPE html>
<html>
    <head>
        
        <title>Edit</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
.error {color: #FF0000;}
</style>
    </head>
    <body>

    <?php
// define variables and set to empty values



$name = $email  =   "";
$nameErr = $emailErr  =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  
}

