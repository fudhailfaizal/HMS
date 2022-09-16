<?php include "external\header.php"; ?>
<?php include "external\connection.php"; ?>
<h1 class="heading"> Admin <span> Doctors</span> </h1>
<?php include "external\dashBtn.php"; ?>

<h1><center>Doctor Information</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Specialization</th>
      <th> Operation </th> 
    </tr>
  </thead>
  </tbody>
  
  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, name, sp_area FROM doctor";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["sp_area"]."</td></tr>";
        
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
<h1><center> Doctor Ward</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>ID</th>
      <th>Doctor ID</th>
      <th>Ward Number</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, d_id, w_no FROM doctor_ward";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["d_id"]."</td><td>".$row["w_no"]."</td></tr>";
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
