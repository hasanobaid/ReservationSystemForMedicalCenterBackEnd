<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
//echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
    $clinicID=mysqli_real_escape_string($con,(int) $request->data->clinicID);
    $empID=mysqli_real_escape_string($con,(int) $request->data->empID);

  // Get by id.
  $sql = "SELECT `slot` FROM `schedule` WHERE `clinicID`='{$clinicID}'and`empID`='{$empID}'";

  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  
  $json = json_encode($row);
  echo $json;
}
?>