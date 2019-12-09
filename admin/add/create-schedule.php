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

    $clinicID=mysqli_real_escape_string($con, (int)$request->data->clinicID);
    $empID=mysqli_real_escape_string($con, (int)$request->data->empID);
    $starttime=mysqli_real_escape_string($con, $request->data->starttime); 
    $endtime=mysqli_real_escape_string($con, $request->data->endtime); 
    $slot=mysqli_real_escape_string($con, (int)$request->data->slot); 
    $enddate=mysqli_real_escape_string($con, $request->data->enddate);
    $startdate=mysqli_real_escape_string($con, $request->data->startdate); 
    $sat=mysqli_real_escape_string($con, $request->data->sat);
    $sun=mysqli_real_escape_string($con, $request->data->sun); 
    $mon=mysqli_real_escape_string($con, $request->data->mon);
    $tue=mysqli_real_escape_string($con, $request->data->tue); 
    $wen=mysqli_real_escape_string($con, $request->data->wen);
    $thu=mysqli_real_escape_string($con, $request->data->thu); 
    $fri=mysqli_real_escape_string($con, $request->data->fri); 
    
    echo "$tue";
    $sql2="INSERT INTO `schedule`(`clinicID`, `empID`, `starttime`, `endtime`, `slot`, `startdate`, `enddate`, `sat`, `sun`, `mon`, `tue`, `wen`, `thu`, `fri`) VALUES ('{$clinicID}','{$empID}','{$starttime}','{$endtime}','{$slot}','{$startdate}','{$enddate}','{$sat}','{$sun}','{$mon}','{$tue}','{$wen}','{$thu}','{$fri}')";

    

    if(mysqli_query($con,$sql2))
    {
      echo "sent";
      http_response_code(201);
      $schedule = [
        'clinicID' => $clinicID,
        'empID' =>$empID,
        'starttime'=>$endtime,
        'slot'=>$slot,
        'startdate'=>$startdate,
        'enddate'=>$enddate,
        'sat'=>$sat,
        'sun'=>$sun,
        'mon'=>$mon,
        'tue'=>$tue,
        'wen'=>$wen,
        'thu'=>$thu,
        'fri'=>$fri
      ];

      echo json_encode(['data'=>$schedule]);
    }
    else
    {
     echo "Error: " . mysqli_error($con);

      // http_response_code(422);
   }
 }

 ?>