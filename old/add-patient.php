<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
// echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	//echo json_decode($postdata);

// var_dump($request);
  // Validate.
  // if($request->data->firstname) === '' || (int)$request->data->personalID < 1)
  // {
  //   return http_response_code(400);
  // }
	
  // Sanitize.
    $firstname = mysqli_real_escape_string($con, $request->data->firstname);
    $secondname= mysqli_real_escape_string($con, $request->data->secondname);
    $thirdname= mysqli_real_escape_string($con, $request->data->thirdname);
    $lastname= mysqli_real_escape_string($con, (int)$request->data->lastname);
    $personalID= mysqli_real_escape_string($con, $request->data->personalID);
    $dateofbirth= mysqli_real_escape_string($con, $request->data->dateofbirth);
    $insuranceID= mysqli_real_escape_string($con, (int)$request->data->insuranceID);
    $subinsuranceID= mysqli_real_escape_string($con, (int)$request->data->subinsuranceID);
    $insurancecompany= mysqli_real_escape_string($con, $request->data->insurancecompany);
    $mobilenumber= mysqli_real_escape_string($con, $request->data->mobilenumber);
    $phonenumber= mysqli_real_escape_string($con, $request->data->phonenumber);
    $password= mysqli_real_escape_string($con, $request->data->password);
    $email= mysqli_real_escape_string($con, $request->data->email);
    $address= mysqli_real_escape_string($con, $request->data->address);
    $cityID= mysqli_real_escape_string($con, (int)$request->data->cityID);
    $qID= mysqli_real_escape_string($con, (int)$request->data->qID);
    $gender= mysqli_real_escape_string($con, $request->data->gender);
    $balance= mysqli_real_escape_string($con, (int)$request->data->balance);

echo "$personalID";
  // Store.
  $sql = "INSERT INTO `patient`(`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `balance`,`gender`, `insuranceco`, `password`) VALUES ('{$firstname}','{$secondname}','{$thirdname}','{$lastname}','{$cityID}','{$qID}','{$insuranceID}','{$subinsuranceID}','{$dateofbirth}','{$email}','{$phonenumber}','{$mobilenumber}','{$balance}','{$address}','{$gender}','{$insurancecompany}','{$password}')";

  if(mysqli_query($con,$sql))
  {
    echo "sent";
    http_response_code(201);
    $patient = [
      'firstname' => $firstname,
      'secondname' => $secondname,
      'thirdname' => $thirdname,
      'lastname' => $lastname,
      'cityID' => $cityID,
      'qID' => $qID,
      'insuranceID' => $insuranceID,
      'subinsuranceID' => $subinsuranceID,
      'dateofbirth' => $dateofbirth,
      'email' => $email,
      'phonenumber' => $phonenumber,
      'mobilenumber' => $mobilenumber,
      'address' => $address,
      'gender' => $gender,
      'insuranceco' => $insuranceco,
      'password' => $password

    ];
    echo json_encode(['data'=>$patient]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}
