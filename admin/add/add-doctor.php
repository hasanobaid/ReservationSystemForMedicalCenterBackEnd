<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
    
    $clinicID=mysqli_real_escape_string($con, $request->data->clinicID);
    $empID=mysqli_real_escape_string($con, $request->data->empID);

$sql2="INSERT INTO `clinic_doctor`(`clinicID`, `empID`) VALUES('{$clinicID}','{$empID}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $clinic_doctor = [
      'clinicID' => $clinicID,
      'empID' =>$empID
          ];
    echo json_encode(['data'=>$clinic_doctor]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>