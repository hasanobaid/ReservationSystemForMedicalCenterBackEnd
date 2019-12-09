<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  $patientID=mysqli_real_escape_string($con, (int)$request->data->patientID);
  $empID=mysqli_real_escape_string($con,(int) $request->data->empID);
  $amount=mysqli_real_escape_string($con, (double)$request->data->amount);
  $senddate=mysqli_real_escape_string($con, $request->data->senddate);
  $paymenttype=mysqli_real_escape_string($con, $request->data->paymenttype);

  $sql2="INSERT INTO `patient_payment_detail`(`patientID`, `empID`, `amount`, `senddate`, `paymenttype`)VALUES ('{$patientID}','{$empID}','{$amount}','{$senddate}','{$paymenttype}')";

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $paymentdetails = [
      'patientID' => $patientID,
      'empID' =>$empID,
      'amount'=>$amount,
      'senddate'=>$senddate,
      'paymenttype'=>$paymenttype
    ];
    echo json_encode(['data'=>$paymentdetails]);
  }
  else
  {
   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
 }
}

?>