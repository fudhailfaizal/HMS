<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "hms");
$columns = array('id', 'doc_fee','hos_fee','lab_fee'
// ,'laundary','total','patient_id','issued_by_id','pay_recby_id','issued_time','recieved_time','status'
);

$query4 = "SELECT * FROM payment ";

if(isset($_POST["search"]["value"]))
{
 $query4 .= '
 WHERE id LIKE "%'.$_POST["search"]["value"].'%" 
 OR doc_fee LIKE "%'.$_POST["search"]["value"].'%" 
 OR hos_fee LIKE "%'.$_POST["search"]["value"].'%" 
//  OR lab_fee LIKE "%'.$_POST["search"]["value"].'%" 
//  OR laundary LIKE "%'.$_POST["search"]["value"].'%" 
//  OR total LIKE "%'.$_POST["search"]["value"].'%" 
//  OR patient_id LIKE "%'.$_POST["search"]["value"].'%" 
//  OR issued_by_id LIKE "%'.$_POST["search"]["value"].'%" 
//  OR pay_recby_id LIKE "%'.$_POST["search"]["value"].'%" 
//  OR issued_time LIKE "%'.$_POST["search"]["value"].'%" 
//  OR recieved_time LIKE "%'.$_POST["search"]["value"].'%" 
//  OR status LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query4 .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query4 .= 'ORDER BY id DESC ';
}

$query4 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query4));

$result = mysqli_query($connect, $query4 . $query4);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="doc_fee">' . $row["doc_fee"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="hos_fee">' . $row["hos_fee"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="lab_fee">' . $row["lab_fee"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="laundary">' . $row["laundary"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="total">' . $row["total"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="patient_id">' . $row["patient_id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="issued_by_id">' . $row["issued_by_id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="pay_recby_id">' . $row["pay_recby_id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="issued_time">' . $row["issued_time"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="recieved_time">' . $row["recieved_time"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="status">' . $row["status"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $sub_array[] = '<button type="button" name="add" class="btn btn-success btn-xs add" id="'.$row["id"].'">add</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query4 = "SELECT * FROM payment";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
<?php
$connect = mysqli_connect("localhost", "root", "", "hms");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query4 = "UPDATE payment SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query3))
 {
  echo 'Data Updated';
 }
}
?>
