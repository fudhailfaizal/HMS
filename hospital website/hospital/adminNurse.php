<?php include "external\header.php"; ?>
<?php include "external\connection.php"; ?>
<h1 class="heading"> Admin <span> Nurse</span> </h1>
<?php include "external\dashBtn.php"; ?>


<h1><center>Nurse</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>Nurse ID</th>
      <th>Nurse Name</th>
      <th>Online Status</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $sql = "SELECT n_id, n_name, online_status FROM nurse";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["n_id"]."</td><td>".$row["n_name"]."</td><td>".$row["online_status"]."</td></tr>";
    }
    echo"</table>";
  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
  
</table>
<!--Next table-->
<h1><center>Nurse Ward</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>Nurse Ward ID</th>
      <th>Nurse ID</th>
      <th>Ward ID</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT n_w_id, n_id, w_id FROM nurse_ward";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["n_w_id"]."</td><td>".$row["n_id"]."</td><td>".$row["w_id"]."</td></tr>";
    }
    echo"</table>";
  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
</table>
<?php include "external\Footer.php"; ?>