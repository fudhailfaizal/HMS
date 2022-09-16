<?php
 $conn = mysqli_connect("localhost","root","","hms");
 if($conn -> connect_error){
   die("Connection failed: ". $conn-> connect_error);
 };//connect to database

?>