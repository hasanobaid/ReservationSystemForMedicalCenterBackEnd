<?php
require 'conection.php';
?>

<?php
$clinicID=$_GET['clinicID'];
$empID=$_GET['empID'];
$sql = "SELECT slottime , adate FROM appointment WHERE clinicID='$clinicID' and empID='$empID' ";
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
