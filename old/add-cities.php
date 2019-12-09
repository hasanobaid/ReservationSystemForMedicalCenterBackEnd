<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	

  // Validate.
  
	
  // Sanitize.
  $cityname = mysqli_real_escape_string($con, trim($request->data->cityname));
    

  // Store.
  $sql = "INSERT INTO `cities`(`cityID`, `cityname`) VALUES ('','{$cityname}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $city = [
      'cityname' => $cityname,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode(['data'=>$city]);
  }
  else
  {
    http_response_code(422);
  }
}
