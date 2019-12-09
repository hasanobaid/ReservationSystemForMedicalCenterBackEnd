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
  //$patientID = mysqli_real_escape_string($con, $request->data->patientID);
  $firstname = mysqli_real_escape_string($con, $request->data->firstname);
  $secondname= mysqli_real_escape_string($con, $request->data->secondname);
  $thirdname= mysqli_real_escape_string($con, $request->data->thirdname);
  $lastname= mysqli_real_escape_string($con, $request->data->lastname);
  $patientID= mysqli_real_escape_string($con, (int)$request->data->patientID);
  $dateofbirth= mysqli_real_escape_string($con, $request->data->dateofbirth);
  $insuranceID= mysqli_real_escape_string($con, (int)$request->data->insuranceID);
  $subinsuranceID= mysqli_real_escape_string($con, (int)$request->data->subinsuranceID);
  $insurancenum= mysqli_real_escape_string($con, (int)$request->data->insurancenum);
  $mobilenumber= mysqli_real_escape_string($con, $request->data->mobilenumber);
  $phonenumber= mysqli_real_escape_string($con, $request->data->phonenumber);
  $password= mysqli_real_escape_string($con, $request->data->password);
  $email= mysqli_real_escape_string($con, $request->data->email);
  $address= mysqli_real_escape_string($con, $request->data->address);
  $cityID= mysqli_real_escape_string($con, (int)$request->data->cityID);
  $qID= mysqli_real_escape_string($con, (int)$request->data->qID);
  $gender= mysqli_real_escape_string($con, $request->data->gender);
  $relation= mysqli_real_escape_string($con, $request->data->relation);

  // Update.
  $sql2 = "SELECT * FROM patient WHERE patientID='$patientID' ";
  $result = $con->query($sql2);

  if ($result->num_rows == 0) {
    
  if($relation!='child'){

    $sql2="INSERT INTO `patient`(`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `insurancenum`, `password`,`relation`) VALUES ('{$patientID}','{$firstname}','${secondname}','${thirdname}','${lastname}','${cityID}','${qID}','${insuranceID}','{$subinsuranceID}','{$dateofbirth}','{$email}','{$phonenumber}','{$mobilenumber}','{$address}','{$gender}','{$insurancenum}','{$password}','{$relation}')";

    if(mysqli_query($con,$sql2))
    {
      echo "sent";
      http_response_code(201);
      $patient = [
        'patientID'=>$patientID,
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
        '`insurancenum`' => $insurancenum,
        'password' => $password,
        'relation'=>$relation

      ];
      echo json_encode(['data'=>$patient]);
    }
    else
    {
      echo "Error: " . mysqli_error($con);

    // http_response_code(422);
    }
  }else{
    $fatherID= mysqli_real_escape_string($con, (int)$request->data->fatherID);
    $motherID= mysqli_real_escape_string($con, (int)$request->data->motherID);
   
    $sql5="INSERT INTO `patient`(`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `insurancenum`, `password`,`relation`) VALUES ('{$patientID}','{$firstname}','${secondname}','${thirdname}','${lastname}','${cityID}','${qID}','${insuranceID}','{$subinsuranceID}','{$dateofbirth}','{$email}','{$phonenumber}','{$mobilenumber}','{$address}','{$gender}','{$insurancenum}','{$password}','{$relation}')";
    $sql4="INSERT INTO `child`(`childID`, `fatherID`, `motherID`) VALUES ('{$patientID}','{$fatherID}','{$motherID}')";
    if(mysqli_query($con,$sql5)&&mysqli_query($con,$sql4))
    {
      echo "sent";
      http_response_code(201);
      $patient = [
        'patientID'=>$patientID,
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
        '`insurancenum`' => $insurancenum,
        'password' => $password,
        'relation'=>$relation

      ];
      $child=[
        'childID'=>$patientID,
        'fatherID'=>$fatherID,
        'motherID'=>$motherID
      ];
      echo json_encode(['data'=>$patient]);
      echo json_encode(['data'=>$child]);

    }
    else
    {
      echo "Error: " . mysqli_error($con);

    // http_response_code(422);
    }
  }
  } else {
    if($relation!='child'){

      $sql6 = "UPDATE `patient` SET `firstname`='$firstname',`secondname`='$secondname',`thirdname`='$thirdname',`lastname`='$lastname',`cityID`='$cityID',`qID`='$qID',`insuranceID`='$insuranceID',`subinsuranceID`='$subinsuranceID',`dateofbirth`='$dateofbirth',`email`='$email',`phonenumber`='$phonenumber',`mobilenumber`='$mobilenumber',`address`='$address',`gender`='$gender',`insurancenum`='$insurancenum',`password`='$password',`relation`='$relation' WHERE `patientID`='$patientID'";

      if(mysqli_query($con, $sql6))
      {
        http_response_code(204);
        echo "updated";
      }
      else
      {
       echo "Error: " . mysqli_error($con);
     }
   }else{
    $fatherID= mysqli_real_escape_string($con, (int)$request->data->fatherID);
    $motherID= mysqli_real_escape_string($con, (int)$request->data->motherID);
    $sql7="UPDATE `child` SET `fatherID`='$fatherID',`motherID`='$motherID' WHERE `childID`='$patientID'";
    $sql8="UPDATE `patient` SET `firstname`='$firstname',`secondname`='$secondname',`thirdname`='$thirdname',`lastname`='$lastname',`cityID`='$cityID',`qID`='$qID',`insuranceID`='$insuranceID',`subinsuranceID`='$subinsuranceID',`dateofbirth`='$dateofbirth',`email`='$email',`phonenumber`='$phonenumber',`mobilenumber`='$mobilenumber',`address`='$address',`gender`='$gender',`insurancenum`='$insurancenum',`password`='$password',`relation`='$relation' WHERE `patientID`='$patientID'";
    if(mysqli_query($con, $sql7)&&mysqli_query($con, $sql8) )
    {
      http_response_code(204);
      echo "updated";
    }
    else
    {
     echo "Error: " . mysqli_error($con);
   }
 }
}

}
