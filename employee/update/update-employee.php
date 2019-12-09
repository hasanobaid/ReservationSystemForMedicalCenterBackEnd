<?php
// require 'connect.php';
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  echo "$postdata";
  $request = json_decode($postdata);
var_dump($request);
  // Sanitize.
  //$personalID = mysqli_real_escape_string($con, $request->data->personalID);

    $empID= mysqli_real_escape_string($con, (int)$request->data->empID);
    $firstname = mysqli_real_escape_string($con, $request->data->firstname);
    $secondname= mysqli_real_escape_string($con, $request->data->secondname);
    $thirdname= mysqli_real_escape_string($con, $request->data->thirdname);
    $lastname= mysqli_real_escape_string($con, $request->data->lastname);
    $username= mysqli_real_escape_string($con, $request->data->username);
    $dateofbirth= mysqli_real_escape_string($con, $request->data->dateofbirth);
    $sID= mysqli_real_escape_string($con, (int)$request->data->sID);
    $jobID= mysqli_real_escape_string($con, (int)$request->data->jobID);
    $emergencynumber= mysqli_real_escape_string($con, $request->data->emergencynumber);
    $mobilenumber= mysqli_real_escape_string($con, $request->data->mobilenumber);
    $phonenumber= mysqli_real_escape_string($con, $request->data->phonenumber);
    $email= mysqli_real_escape_string($con, $request->data->email);
    $address= mysqli_real_escape_string($con, $request->data->address);
    $cityID= mysqli_real_escape_string($con, (int)$request->data->cityID);
    $qID= mysqli_real_escape_string($con, (int)$request->data->qID);
    $gender= mysqli_real_escape_string($con, $request->data->gender);
     $password= mysqli_real_escape_string($con, $request->data->password);  // Update.

    $sql2 = "SELECT * FROM `employee` WHERE empID='$empID' ";


$result = $con->query($sql2);

if ($result->num_rows == 0) {
 $sql="INSERT INTO `users`(`username`, `empID`, `password`) VALUES ('{$username}','{$empID}','{$password}')";
    mysqli_query($con,$sql);
$sql3="INSERT INTO `employee`(`empID`, `firstname`, `secondname`, `thirdname`, `lastname`, `username`, `email`, `phonenumber`, `mobilenumber`, `emergencynumber`, `cityID`, `qID`, `sID`, `jobID`, `gender`, `dateofbirth`, `address`) VALUES ('{$empID}','{$firstname}','${secondname}','${thirdname}','${lastname}','{$username}','{$email}','{$phonenumber}','{$mobilenumber}','{$emergencynumber}','${cityID}','${qID}','{$sID}','{$jobID}','{$gender}','{$dateofbirth}','{$address}')";

  if(mysqli_query($con,$sql3))
  {
    echo "sent";
    http_response_code(201);
    $employee = [
      'firstname' => $firstname,
      'secondname' => $secondname,
      'thirdname' => $thirdname,
      'lastname' => $lastname,
      'cityID' => $cityID,
      'qID' => $qID,
      'jobID' => $jobID,
      'sID' => $sID,
      'dateofbirth' => $dateofbirth,
      'email' => $email,
      'phonenumber' => $phonenumber,
      'mobilenumber' => $mobilenumber,
      'address' => $address,
      'gender' => $gender,
      'emergencynumber' => $emergencynumber,
      'username' => $username,
      'empID'=>$empID,
    ];

    echo json_encode(['data'=>$employee]);
  }
  else
  {
    echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }    
} else {
    
  $sql = "UPDATE `employee` SET `empID`='{$empID}',`firstname`='{$firstname}',`secondname`='{$secondname}',`thirdname`='{$thirdname}',`lastname`='{$lastname}',`email`='{$email}',`phonenumber`='{$phonenumber}',`mobilenumber`='{$mobilenumber}',`emergencynumber`='{$emergencynumber}',`cityID`='{$cityID}',`qID`='{$qID}',`sID`='{$sID}',`jobID`='{$jobID}',`gender`='{$gender}',`dateofbirth`='{$dateofbirth}',`address`='{$address}' WHERE empID='{$empID}'";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);
  }
}
  

}
