<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "gokulraj";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }




$name = mysqli_real_escape_string($conn, $_POST['name'] );
// $age = mysqli_real_escape_string($conn, $_POST['age']);
$image = mysqli_real_escape_string($conn, $_POST['image']);



if(mysqli_query($conn, "INSERT INTO `img_data` (`name`, `image`) VALUES('$name','$image')")) {
  echo 'data added successfully';
 } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
 }
 
 mysqli_close($conn);


   ?>