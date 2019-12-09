<?php
require 'conection.php';
?>

<?php
$empID=$_GET['empID'];
$clinicID=$_GET['clinicID'];
$ex_sql="SELECT * FROM `exception_date` WHERE empID='$empID' and clinicID='$clinicID' ";
$result_ex = $conn->query($ex_sql);

$row_ex = $result_ex->fetch_assoc();
$edate = $row_ex['edate'];
$start = $row_ex['start'];
$end = $row_ex['end'];
$slot = $row_ex['slot'];

// echo "$edate";
// echo "$start";
// echo "$end";
// echo "$slot";

$sql_sc="INSERT INTO `schedule`(`clinicID`, `empID`, `starttime`, `endtime`, `slot`, `startdate`, `enddate`, `sat`, `sun`, `mon`, `tue`, `wen`, `thu`, `fri`) VALUES ('$clinicID','$empID','$start','$end','$slot','$edate','$edate','1','1','1','1','1','1','1')";
if(mysqli_query($conn,$sql_sc))
    {
      echo "sent";
      http_response_code(201);
      $schedule = [
        'clinicID' => $clinicID,
        'empID' =>$empID,
        'starttime'=>$start,
        'endtime'=>$end,
        'slot'=>$slot,
        'startdate'=>$edate,
        'enddate'=>$edate,
        'sat'=>1,
        'sun'=>1,
        'mon'=>1,
        'tue'=>1,
        'wen'=>1,
        'thu'=>1,
        'fri'=>1
      ];

      echo json_encode(['data'=>$schedule]);
    }
 // echo json_encode($appointment_price);

$conn->close();


?>
