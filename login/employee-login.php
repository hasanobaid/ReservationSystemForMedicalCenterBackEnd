<?php
require 'conection.php';
?>

<?php
$username=$_GET['username'];
$password=$_GET['password'];
echo "$username";
echo "$password";
$sql = "SELECT empID FROM `users`,`employee` WHERE `username`='$username' and `password` ='$password'and `jobID`='1' ";
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
                   echo "Error: " . mysqli_error($con);

}
$conn->close();


?>
