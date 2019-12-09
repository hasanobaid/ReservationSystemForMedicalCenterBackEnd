<?php
require 'conection.php';
?>

<?php
$patientID=$_GET['patientID'];
$adate=$_GET['fromdate'];
$sql = "SELECT * FROM appointment WHERE patientID='$patientID' and adate='$adate' ";
$result = $conn->query($sql);

$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $myArray[] = $row;
    }

}

 echo json_encode(['data'=>$myArray]);

$conn->close();


?>
