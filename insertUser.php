<?php
$connect = mysqli_connect("localhost", "root", "", "hms");
if(isset($_POST["Username"], $_POST["Password"], $_POST["UserType"]))
{
 $Username = mysqli_real_escape_string($connect, $_POST["Username"]);
 $Password = mysqli_real_escape_string($connect, $_POST["Password"]);
 $UserType = mysqli_real_escape_string($connect, $_POST["UserType"]);
 $query = "INSERT INTO users(Username, Password, UserType ) VALUES('$Username', '$Password','$UserType')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>