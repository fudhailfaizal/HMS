<?php
$connect = mysqli_connect("localhost", "root", "", "hms");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM payment WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>