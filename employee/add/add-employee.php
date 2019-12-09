
<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
echo "";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	//echo json_decode($postdata);

var_dump($request);
  // Validate.
  // if($request->data->firstname) === '' || (int)$request->data->personalID < 1)
  // {
  //   return http_response_code(400);
  // }
	
  // Sanitize.
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
   $password= mysqli_real_escape_string($con, $request->data->password);

 $sql="INSERT INTO `users`(`username`, `empID`, `password`, `jobID`) VALUES ('{$username}','{$empID}','{$password}','{$jobID}')";
   if(mysqli_query($con,$sql))
  {
    echo "sent";
    http_response_code(201);
    $user = [
      'username' => $username,
      'empID' => $empID,
      'password' => $password,
      'jobID' => $jobID
          ];

    echo json_encode(['data'=>$user]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }

    
  $sql2="INSERT INTO `employee`(`empID`, `firstname`, `secondname`, `thirdname`, `lastname`, `username`, `email`, `phonenumber`, `mobilenumber`, `emergencynumber`, `cityID`, `qID`, `sID`, `jobID`, `gender`, `dateofbirth`, `address`) VALUES ('{$empID}','{$firstname}','${secondname}','${thirdname}','${lastname}','{$username}','{$email}','{$phonenumber}','{$mobilenumber}','{$emergencynumber}','${cityID}','${qID}','{$sID}','{$jobID}','{$gender}','{$dateofbirth}','{$address}')";

  if(mysqli_query($con,$sql2))
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
      'password'=>$password
    ];

    echo json_encode(['data'=>$employee]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}
