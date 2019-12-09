
<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{

  
  // Extract the data.
  $request = json_decode($postdata);

    $updatedate= mysqli_real_escape_string($con, $request->data->updatedate);

    $insurancecompany= mysqli_real_escape_string($con, $request->data->insurancecompany);
    $membership=mysqli_real_escape_string($con, $request->data->membership);

    $discount=mysqli_real_escape_string($con, (double)$request->data->discount);
//**********************************************

$sql123 = "SELECT * FROM `insurance` WHERE insurancecompany = '{$insurancecompany}' ";
$result = $con->query($sql123);

if ($result->num_rows == 0) {
    $sql2="INSERT INTO `insurance`( `insurancecompany`, `update_date`) VALUES ('{$insurancecompany}','{$updatedate}')";
} else {
    echo "found !!!!!! ";
}
    
  


  $sql = "SELECT insuranceID FROM `insurance` WHERE insurancecompany ='{$insurancecompany}'";
  $result = $con->query($sql);
  //if ($result->num_rows > 0) {
    // output data of each row
  $row = $result->fetch_assoc();
  $insuranceID = $row['insuranceID'];
//} else {
  //  echo "0 results";
//}


    

$sql1="INSERT INTO `subinsurance`(`insuranceID`, `membership`, `discount`) VALUES ('{$insuranceID}','{$membership}','{$discount}')";

  // $sql2="INSERT INTO `patient`(`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `balance`, `insuranceco`, `password`) VALUES ('{$personalID}','$firstname','$secondname','$thirdname','$lastname','$cityID','$qID','$insuranceID','$subinsuranceID','$dateofbirth','$email','$phonenumber','$mobilenumber','$address',$gender,'$balance','$insurancecompany','$password')";

  if( mysqli_query($con,$sql1))
  {
    echo "sent";
    http_response_code(201);
    $insurance = [
      'insuranceID' => $insuranceID,
      'insurancecompany' => $insurancecompany,
      'updatedate' => $updatedate

    ];
    $subinsurance=[
      'insuranceID' => $insuranceID,
      'membership' => $membership,
      'discount' => $discount

    ];
         echo json_encode(['data'=>$insurance]);
        echo json_encode(['data'=>$subinsurance]);

  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}
