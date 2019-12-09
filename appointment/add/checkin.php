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

  $checkin=1; 
  $senddate = date("Y-m-d");
  $paymentdate = date("Y-m-d");
  $paymenttype = "cash";
  $balance = 0 ; 
  $lastpaydate = date("Y-m-d"); 
  $lastpaymentdate = date('Y-m-d', strtotime('+1 month'));
  $sql2="UPDATE `appointment` SET `checkin`='$checkin' WHERE clinicID='{$clinicID}' and empID = '{$empID}' and slottime ='{$slottime}' and adate= '{$adate}' and patientID = '{$patientID}'";

  $sql_patient="SELECT * FROM `patient` WHERE patientID = '{$patientID}'";
  $result_patinet = $con->query($sql_patient);
  //if ($result->num_rows > 0) {
 // output data of each row
  $row_patient = $result_patinet->fetch_assoc();
  $insuranceID = $row_patient['insuranceID'];
  $subinsuranceID = $row_patient['subinsuranceID'];

  $sql_price = "SELECT * FROM `clinic_insurance_price` WHERE clinicID = '{$clinicID}' and insuranceID = '$insuranceID' and subinsuranceID = '$subinsuranceID' ";
  $result_price = $con->query($sql_price);

  $row_price = $result_price->fetch_assoc();
  $price = $row_price['price'];
  $sqlfinal = "INSERT INTO `patient_payment_detail`(`patientID`, `empID`, `amount`, `senddate`,`paymenttype`) VALUES ('{$patientID}','{$empID}','$price','$senddate','$paymenttype')"; 

  $sql_get_balance = "SELECT * FROM `patient_payment` WHERE patientID = '{$patientID}'";
$result_balance = $con->query($sql_get_balance);

  $row_balance = $result_balance->fetch_assoc();
  $balance1 = $row_balance['balance'];
$balance = (int)$balance1 ; 
$balance = $balance - $price ; 
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
  if(mysqli_query($con,$sqlfinal))
  {
    echo "sent";
    http_response_code(201);
    $patient_payment_detail = [
      'patientID' => $patientID,
      'empID'=>$empID,
      'amount'=>$price,
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
    'slottime'=>$slottime
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