<?php
require 'conection.php';
?>

<?php
$empID=$_GET['empID'];
$clinicID=$_GET['clinicID'];

$sql_date = "SELECT * FROM appointment WHERE clinicID='$clinicID' and empID = '$empID'";
$result_date = $conn->query($sql_date);

$adate = array();


if ($result_date->num_rows > 0) {
    // output data of each row
	while($row_date = $result_date->fetch_assoc()) {
		$adate[] = $row_date['adate'];
	}
}
$sql_vdate = "SELECT * FROM vacation_date WHERE clinicID='$clinicID' and empID = '$empID'";
$result_vdate = $conn->query($sql_vdate);

$row_vdate = $result_vdate->fetch_assoc();
$vdate = $row_vdate['vdate'];
// echo "$vdate";
foreach ($adate as  $value) {
	//echo "$value";
	if($vdate==$value){
		$get_date=date_create($vdate);
		date_add($get_date, date_interval_create_from_date_string('+1 week'));
		$new_date = date_format($get_date, 'Y-m-d');
		$sql_update="UPDATE `appointment` SET `adate`='$new_date' WHERE clinicID='$clinicID' and empID = '$empID' and  adate= '$vdate' ";

		if(mysqli_query($conn,$sql_update))
		{
			echo "here";
			$sql= "SELECT * FROM appointment";
			$result = $conn->query($sql);

			$myArray = array();
			if ($result->num_rows > 0) {
    // output data of each row
				while($row = $result->fetch_assoc()) {
					$myArray[] = $row;
				}

			} 
		//	print_r($myArray);
			echo json_encode(['data'=>$myArray]);
		}
		else
		{
			echo "Error: " . mysqli_error($con);

    // http_response_code(422);
		}
	}
}
// print_r($adate);
// echo json_encode(['data'=>$myArray]);

$conn->close();


?>
