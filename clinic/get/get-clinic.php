<?php
require 'conection.php';
?>

<?php

$sql = 'SELECT * FROM `clinic`';
$result = $conn->query($sql);

$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $myArray[] = $row;
    }

} else {
    echo "0 results";
}

 echo json_encode(['data'=>$myArray]);

$conn->close();


?>
