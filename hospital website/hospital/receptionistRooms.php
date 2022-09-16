<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medcare - Hospital Management System </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <header class="header">

    

    <div id="menu-btn" class="fas fa-bars"></div>

</header>
</br> </br> </br> </br>
<header class="header">

<a href="admin.php" class="logo"> <i class="fas fa-heartbeat"></i> medcare. </a>

    <nav class="navbar">
        <a href="#operationtheater">Operation Theater</a>
        <a href="#room">Room</a>
        <a href="#ward">Ward</a>
        <a href="#wardroom">Ward Room</a>
        <a href="#"></a>
        <a href="receptionistRooms.php">Rooms</a>
        <a href="receptionistSchedules.php">Schedules</a>
        
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>
</head>

</br>
</br>
<section class="services" id="services">

    <h1 class="heading"> Admin <span> Receptionist</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Patients</h3>
            
            <a href="adminPatients.php" link text class="btn"> Patients Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-ambulance"></i>
            <h3>Doctors</h3>
            
            <a href="adminDoctor.php" class="btn"> Doctors Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Nurse</h3>
           
            <a href="adminNurse.php" class="btn"> Nurses Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>Payments</h3>
            
            <a href="adminPayments.php" class="btn"> Payment Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Receptionist</h3>
            
            <a href="adminReceptionist.php" class="btn"> Receptionists Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Users</h3>
          
            <a href="adminUsers.php" class="btn"> User Panel <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<section class="services" id="services">
<body>
    <style>
* {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  
  border-collapse:collapse;
  margin: 25px 0;
  font-size: 2.5rem;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
.content-table {
  font-family: 'Poppins', sans-serif;
  margin-left: auto;
  margin-right: auto;
}
.content-table {
  width: 90%;
}

</style>
<h1><center>Operation Theater</center></h1>
<a name="operationtheater"></a>
<table class="content-table" >
  <thead>
    <tr>
      <th>Theater ID</th>
      <th>Theater Name</th>
      <th>Theater Status</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT t_id, t_name, t_status FROM op_theater";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["t_id"]."</td><td>".$row["t_name"]."</td><td>".$row["t_status"]."</td></tr>";
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
<h1><center>Room</center></h1>
<a name="room"></a>
<table class="content-table" >
  <thead>
    <tr>
      <th>Room Number</th>
      <th>Room Name</th>
      <th>Room Type</th>
      <th>Room Status</th>
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT no, name, type, status FROM room";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["no"]."</td><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["status"]."</td></tr>";
    }
    echo"</table>";
  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
</table>

<h1><center>Ward</center></h1>
<a name="ward"></a>
<table class="content-table" >
  <thead>
    <tr>
      <th>Ward Number</th>
      <th>Ward Name</th>
     
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT no, name FROM ward";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["no"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo"</table>";
  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
</table>

<h1><center>Ward Room</center></h1>
<a name="wardroom"></a>
<table class="content-table" >
  <thead>
    <tr>
      <th>Ward ID</th>
      <th>Room Number</th>
      <th>Ward Number</th>
     
    </tr>
  </thead>
  </tbody>

  <?php
  $conn = mysqli_connect("localhost","root","","hms");
  if($conn -> connect_error){
    die("Connection failed: ". $conn-> connect_error);
  }
  $sql = "SELECT id, r_num, w_no FROM ward_room";
  $result = $conn -> query($sql);
  if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["r_num"]."</td><td>".$row["w_no"]."</td></tr>";
    }
    echo"</table>";
  }
  else{
    echo "0 result";
  }
  $conn -> close();
  ?>
</table>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>