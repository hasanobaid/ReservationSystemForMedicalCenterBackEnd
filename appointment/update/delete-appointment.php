<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
    
      

         $appID=mysqli_real_escape_string($con, (int)$request->data->appID);
$sql2="DELETE FROM `appointment` WHERE `appID`='{$appID}'";

  

  if(mysqli_query($con,$sql2))
  {
    echo "deleted";
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>