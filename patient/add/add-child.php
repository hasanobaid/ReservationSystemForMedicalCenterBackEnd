ص<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	var_dump($request);

    
    $chID=mysqli_real_escape_string($con, (int)$request->data->chID);
    $parID=mysqli_real_escape_string($con, (int)$request->data->parID);
    echo "$chID";
    echo "$parID";
	$sql2="INSERT INTO `child`(`chID`, `parID`) VALUES ('{$chID}','{$parID}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $child = [
      'chID' => $chID,
      'parID'=>$parID
          ];
    echo json_encode(['data'=>$clinic]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>