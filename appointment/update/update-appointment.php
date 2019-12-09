<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
    
      
         $clinicID=mysqli_real_escape_string($con,(int) $request->data->clinicID);
        $empID=mysqli_real_escape_string($con, (int)$request->data->empID);
        $patientID=mysqli_real_escape_string($con, (int)$request->data->patientID);
        $slottime=mysqli_real_escape_string($con, $request->data->slottime);
        $adate=mysqli_real_escape_string($con, $request->data->adate);
        $rempID=mysqli_real_escape_string($con, (int)$request->data->rempID);
        $checkin=0;
         $appID=mysqli_real_escape_string($con, (int)$request->data->appID);
$sql2="UPDATE `appointment` SET `adate`='{$adate}',`slottime`='{$slottime}' WHERE `appID`='{$appID}'";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $appointment = [
      'clinicID' => $clinicID,
      'empID'=>$empID,
      'patientID'=>$patientID,
      'checkin'=>$checkin,
      'adate'=>$adate,
      'slottime'=>$slottime,
      'rempID'=>$rempID
          ];
    echo json_encode(['data'=>$appointment]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>