<?php
require 'conection.php';
?>

<?php
$appID = $_GET['appID'];

$get_appointment_sql = "SELECT * FROM appointment WHERE appID = '$appID'";
$appointment_result = $conn->query($get_appointment_sql);

  $row_appointment = $appointment_result->fetch_assoc();
$clinicID= $row_appointment['clinicID'];
$patientID = $row_appointment['patientID']; 

$get_patient_sql="SELECT * FROM patient WHERE patientID = '$patientID'";
$patinet_result = $conn->query($get_patient_sql);
$row_patient = $patinet_result->fetch_assoc();
$insuranceID = $row_patient['insuranceID'];
$subinsuranceID = $row_patient['subinsuranceID'];
$get_price_sql = "SELECT * FROM `clinic_insurance_price` WHERE clinicID = '$clinicID' and insuranceID = '$insuranceID' and subinsuranceID = '$subinsuranceID'";
$result = $conn->query($get_price_sql);


$row = $result->fetch_assoc();
$price = $row['price'];
$appointment_price =  [
'appID'=>$appID,
'price'=>$price
];
 echo json_encode($appointment_price);

$conn->close();


?>
