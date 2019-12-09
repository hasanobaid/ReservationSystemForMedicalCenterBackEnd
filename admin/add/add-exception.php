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
    $edate=mysqli_real_escape_string($con, $request->data->edate);
    $start=mysqli_real_escape_string($con, $request->data->start);
    $end=mysqli_real_escape_string($con, $request->data->end);
    $note=mysqli_real_escape_string($con, $request->data->note);
    $status="false";
$sql2="INSERT INTO `exception_date`(`clinicID`, `empID`, `edate`, `start`, `end`,`note`,`status`) VALUES ('{$clinicID}','{$empID}','{$edate}','{$start}','{$end}','{$note}','{$status}')";

  

  if(mysqli_query($con,$sql2))
  {
    echo "sent";
    http_response_code(201);
    $exception_date= [
      'clinicID' => $clinicID,
       'empID' => $empID,
        'edate' => $edate,
         'start' => $start,
          'end' => $end,
          'note'=>$note,
          'status'=>$status
          ];
    echo json_encode(['data'=>$exception_date]);
  }
  else
  {
                   echo "Error: " . mysqli_error($con);

    // http_response_code(422);
  }
}

?>