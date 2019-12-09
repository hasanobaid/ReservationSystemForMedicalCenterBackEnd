<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  $empID=mysqli_real_escape_string($con, (int)$request->data->empID);
  $patientID=mysqli_real_escape_string($con, (int)$request->data->patientID);
  $paymenttype = mysqli_real_escape_string($con, $request->data->paymenttype);
  $amount =  mysqli_real_escape_string($con,(int) $request->data->amount);
  // $lastpaymentdate = mysqli_real_escape_string($con, $request->data->lastpaymentdate);
  $lastpaydate = date("Y-m-d"); 
  $balance = 0 ; 
  $senddate = date("Y-m-d");
  $lastpaymentdate= date('Y-m-d', strtotime('+1 month'));


  $sqlfinal = "INSERT INTO `patient_payment_detail`(`patientID`, `empID`, `amount`, `senddate`,`paymenttype`) VALUES ('{$patientID}','{$empID}','{$amount}','$senddate','{$paymenttype}')"; 

  $sql_get_balance = "SELECT * FROM `patient_payment` WHERE patientID = '{$patientID}'";
  $result_balance = $con->query($sql_get_balance);
  if ($result_balance->num_rows == 0) {
    $sql_insert="INSERT INTO `patient_payment`(`patientID`, `balance`, `lastpaydate`, `lastpaymentdate`) VALUES ('{patientID}','$balance','$lastpaydate','$lastpaymentdate'";

    if(mysqli_query($con,$sql_insert))
    {
      echo "sent";
      http_response_code(201);
      $patient_payment = [
        'patientID' => $patientID,
        'balance'=>$balance,
        'lastpaymentdate'=>$lastpaymentdate,
        'lastpaydate'=>$lastpaydate
      ];
      echo json_encode(['data'=>$patient_payment]);
    }
    else
    {
     echo "Error: " . mysqli_error($con);

    // http_response_code(422);
   }

 }else{
  $row_balance = $result_balance->fetch_assoc();
  $balance1 = $row_balance['balance'];
  $balance = (int)$balance1 ; 
  $balance = $balance + $amount ; 
  echo "$balance";

  $sql_price_update="UPDATE `patient_payment` SET`balance`='$balance',`lastpaydate`='$lastpaydate',`lastpaymentdate`='$lastpaymentdate' WHERE patientID = '{$patientID}'"; 

  if(mysqli_query($con,$sql_price_update))
  {
    echo "sent";
    http_response_code(201);
    $patient_payment = [
      'patientID' => $patientID,
      'balance'=>$balance,
      'lastpaymentdate'=>$lastpaymentdate,
      'lastpaydate'=>$lastpaydate
    ];
    echo json_encode(['data'=>$patient_payment]);
  }
  else
  {
   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
 }
}
if(mysqli_query($con,$sqlfinal))
{
  echo "sent";
  http_response_code(201);
  $patient_payment_detail = [
    'patientID' => $patientID,
    'empID'=>$empID,
    'amount'=>$amount,
    'senddate'=>$senddate,
    'paymenttype'=>$paymenttype
  ];
  echo json_encode(['data'=>$patient_payment_detail]);
}
else
{
 echo "Error: " . mysqli_error($con);

    // http_response_code(422);
}

}

?>