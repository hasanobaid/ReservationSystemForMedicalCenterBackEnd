<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
    
    $clinicname=mysqli_real_escape_string($con, $request->data->clinicname);

$sql2="INSERT INTO `clinic`(`clinicname`) VALUES ('{$clinicname}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $clinic = [
      'clinicname' => $clinicname
          ];
    echo json_encode(['data'=>$clinic]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>