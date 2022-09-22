<?php include "external\header.php"; ?>

<h1 class="heading"> Admin <span> Patients</span> </h1>
<?php include "external\dashBtn.php"; ?>
<?php include "external\connection.php"; ?>

<h1><center>Admissions</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>Admission Number</th>
      <th>Patient ID</th>
      <th>Patient Name</th>
      <th>Ward Number</th>
      <th></th>
      <th>Room Number</th>
      <th></th>
      <th>Admitted on</th>
      <th></th>
      <th>Discharged on</th>
    </tr>
    

  </thead>
  

  </tbody>
  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, p_id, ref_by, w_no, r_no, time_in, time_out FROM admitted";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["p_id"]."</td><td>".$row["ref_by"]."</td><td>".$row["w_no"]."</td><td>"."</td><td>".$row["r_no"]."</td><td>"."</td><td>".$row["time_in"]."</td><td>".
        "</td><td>".$row["time_out"]."</td></tr>";
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
<h1><center>Medical Record</center></h1>
<table class="content-table" >
  <thead>
    <tr>
      <th>Patient ID</th>
      <th>Desciption </th>
      <th>Doctor ID</th>
      <th>Issued Date</th>
    </tr>
    

  </thead>
  

  </tbody>
  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT patient_id, description , doctor_id , issued_date FROM medical_record";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["patient_id"]."</td><td>".$row["description"]."</td><td>".$row["doctor_id"]."</td><td>".$row["issued_date"]."</td></tr>";
    }
    echo"</table>";

  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
   <!--Contact table-->
   <h1><center>Contact Information</center></h1>
   <table class="content-table" >
  <thead>
    <tr>
      <th>ID</th>
      <th>Name </th>
      <th>Email</th>
      <th>Message</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, name, email , message FROM contact_us";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo"</table>";

  }
  else{
    echo "0 result";
  }
  $conn -> close();

 

  ?>
  
</table>
</body>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>