<?php
require 'conection.php';
?>

<?php
$patientID=$_GET['patientID'];
$password=$_GET['password'];

$sql = "SELECT * FROM `patient` WHERE `patientID`='$patientID' and `password` ='$password' ";
$result = $conn->query($sql);
if($result){

$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $myArray[] = $row;
    }

}

 echo json_encode(['data'=>$myArray]);
}else{
                   echo "Error: " . mysqli_error($conn);

}
$conn->close();


?>
