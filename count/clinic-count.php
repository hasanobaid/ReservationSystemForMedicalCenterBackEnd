<?php
require 'conection.php';
?>

<?php

$sql = "SELECT clinicID , COUNT(*) as value FROM appointment GROUP BY clinicID;";
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
