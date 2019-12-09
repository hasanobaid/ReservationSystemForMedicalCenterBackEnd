<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
    
    $clinicID=mysqli_real_escape_string($con, (int)$request->data->clinicID);
   $price=mysqli_real_escape_string($con,(double) $request->data->price);

$sql2="INSERT INTO `clinic_price`(`clinicID`, `price`) VALUES ('{$clinicID}','{$price}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $clinic_price = [
      'clinicID' => $clinicID,
      'price' =>$price
          ];
    echo json_encode(['data'=>$clinic_price]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>