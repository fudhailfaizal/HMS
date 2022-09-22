<?php
$connect = mysqli_connect("localhost", "root", "", "hms");
if(isset($_POST["id"], $_POST["doc_fee"], $_POST["hos_fee",]$_POST["lab_fee"], $_POST["laundary"], $_POST["total"]$_POST["patient_id"], $_POST["issued_by_id"], $_POST["pay_recby_id"]$_POST["issued_time"], $_POST["recieved_time"], $_POST["status"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $doc_fee = mysqli_real_escape_string($connect, $_POST["doc_fee"]);
 $hos_fee = mysqli_real_escape_string($connect, $_POST["hos_fee"]);
 $lab_fee = mysqli_real_escape_string($connect, $_POST["lab_fee"]);
 $laundary = mysqli_real_escape_string($connect, $_POST["laundary"]);
 $total = mysqli_real_escape_string($connect, $_POST["total"]);
 $patient_id = mysqli_real_escape_string($connect, $_POST["patient_id"]);
 $issued_by_id = mysqli_real_escape_string($connect, $_POST["issued_by_id"]);
 $pay_recby_id = mysqli_real_escape_string($connect, $_POST["pay_recby_id"]);
 $issued_time = mysqli_real_escape_string($connect, $_POST["issued_time"]);
 $recieved_time = mysqli_real_escape_string($connect, $_POST["recieved_time"]);
 $status = mysqli_real_escape_string($connect, $_POST["status"]);
 $query = "INSERT INTO payment (id, doc_fee, hos_fee, lab_fee, laundary, total, patient_id, issued_by_id, pay_recby_id, issued_time, recieved_time, status ) VALUES('$id', '$doc_fee','$hos_fee','$lab_fee', '$laundary','$total', '$patient_id','$issued_by_id', '$pay_recby_id','$issued_time', '$recieved_time','$status')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>