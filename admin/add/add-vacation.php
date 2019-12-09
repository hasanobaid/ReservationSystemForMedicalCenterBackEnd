<?php
$con= new mysqli('localhost', 'root', '', 'seminar');

// Get the posted data.
$postdata = file_get_contents("php://input");
echo "$postdata";
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
  
      var_dump($request);

    $clinicID=1;
    $empID=1; 
    $vdate=mysqli_real_escape_string($con, $request->data->vdate);
    $start=mysqli_real_escape_string($con, $request->data->start);
    $end=mysqli_real_escape_string($con, $request->data->end);
    $note=mysqli_real_escape_string($con, $request->data->note);

$sql2="INSERT INTO `vacation_date`(`clinicID`, `empID`, `vdate`, `start`, `end`,`note`) VALUES ('{$clinicID}','{$empID}','{$vdate}','{$start}','{$end}','{$note}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $vacation_date= [
      'clinicID' => $clinicID,
       'empID' => $empID,
        'vdate' => $vdate,
         'start' => $start,
          'end' => $end,
          'note'=>$note
          ];
    echo json_encode(['data'=>$vacation_date]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>