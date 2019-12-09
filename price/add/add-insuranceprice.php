<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	var_dump($request);
    
    $clinicID=mysqli_real_escape_string($con, (int)$request->data->clinicID);
   $price=mysqli_real_escape_string($con,(double) $request->data->price);
    $insuranceID=mysqli_real_escape_string($con, (int)$request->data->insuranceID);
    $subinsuranceID=mysqli_real_escape_string($con, (int)$request->data->subinsuranceID);

$sql2="INSERT INTO `clinic_insurance_price`(`clinicID`, `insuranceID`, `subinsuranceID`, `price`) VALUES ('{$clinicID}','{$insuranceID}','{$subinsuranceID}','{$price}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $insurance_price = [
      'clinicID' => $clinicID,
      'price' =>$price,
      'subinsuranceID'=>$subinsuranceID,
      'insuranceID'=>$insuranceID
          ];
    echo json_encode(['data'=>$insurance_price]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>