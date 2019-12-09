<?php
require 'conection.php';
?>

<?php
$fatherID=$_GET['fatherID'];
$sql = "SELECT childID FROM child WHERE fatherID='$fatherID' ";
$result = $conn->query($sql);
$row1= $result->fetch_assoc();
$personalID=$row1['childID'];

//////////////////////////

$sql2= "SELECT * FROM `patient` WHERE `patientID` = '$personalID' ";
$result2 = $conn->query($sql2);

$myArray = array();
if ($result2->num_rows > 0) {
    // output data of each row
	while($row = $result2->fetch_assoc()) {
		$myArray[] = $row;
	}

} else {
	echo "0 results";
}

echo json_encode(['data'=>$myArray]);

$conn->close();


?>
