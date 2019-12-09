<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
//echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
    $clinicID=mysqli_real_escape_string($con,(int) $request->clinicID);
  
  // Get by id.
  $sql = "SELECT `empID` FROM `clinic_doctor` WHERE `clinicID`='{$clinicID}'";

  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $empID=$row['empID'];


  $sql2 = "SELECT * FROM `employee` WHERE `empID`='{$empID}'";

  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $json = json_encode(['data'=>$row2]);
  echo $json;
}
?>