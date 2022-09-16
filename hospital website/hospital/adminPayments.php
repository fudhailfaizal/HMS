<?php include "external\header.php"; ?>
<h1 class="heading"> Admin <span> Payments</span> </h1>
<?php include "external\dashBtn.php"; ?>
<?php include "external\connection.php"; ?>

<table class="content-table"  >
  <thead>
    <tr>
      <th>Payment ID</th>
      <th>Doctor Fee</th>
      <th>Hospital Fee</th>
      <th>Lab Fee</th>
      <th></th>
      <th>Laundary</th>
      <th></th>
      <th>Total</th>
      <th></th>
      <th>Patient ID</th>
      <th>Issued By</th>
      <th>Issued Time</th>
      <th>Recieved time</th>
      <th>Payment Status</th>
    </tr>
    

  </thead>
  

  </tbody>
  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, doc_fee, hos_fee, lab_fee, laundary, total, patient_id, issued_by_id, issued_time, recieved_time, status FROM payment";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["doc_fee"]."</td><td>".$row["hos_fee"]."</td><td>".$row["lab_fee"]."</td><td>"."</td><td>".$row["laundary"]."</td><td>"."</td><td>".$row["total"]."</td><td>".
        "</td><td>".$row["patient_id"]."</td><td>".$row["issued_by_id"]."</td><td>".$row["issued_time"]."</td><td>".$row["recieved_time"]."</td><td>".$row["status"]."</td></tr>";
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
