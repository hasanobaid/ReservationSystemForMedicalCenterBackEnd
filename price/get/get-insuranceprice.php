<?php
require 'conection.php';
?>

<?php

$sql = 'SELECT * FROM `clinic_insurance_price`';
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
