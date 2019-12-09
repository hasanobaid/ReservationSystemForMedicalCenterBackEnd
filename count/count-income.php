<?php
require 'conection.php';
?>

<?php

$q1 = date('2018-12-31');
$q2 =  date('2019-03-31');
$q3 =  date('2019-06-31');
$q4 =  date('2019-9-31');
$q5 =  date('2019-12-31');
$income_q1 = 0 ; 
$income_q2 = 0 ; 
$income_q3 = 0 ; 
$income_q4 = 0 ; 
$sql_q1 = "SELECT amount FROM patient_payment_detail WHERE senddate > '$q1' and senddate < '$q2' ";
$sql_q2 = "SELECT amount FROM patient_payment_detail WHERE senddate > '$q2' and senddate < '$q3' ";
$sql_q3 = "SELECT amount FROM patient_payment_detail WHERE senddate > '$q3' and senddate < '$q4' ";
$sql_q4 = "SELECT amount FROM patient_payment_detail WHERE senddate > '$q4' and senddate < '$q5' ";

$result_q1 = $conn->query($sql_q1);
$result_q2 = $conn->query($sql_q2);
$result_q3 = $conn->query($sql_q3);
$result_q4 = $conn->query($sql_q4);

$myArray_q1 = array();
$myArray_q2 = array();
$myArray_q3 = array();
$myArray_q4 = array();

if ($result_q1->num_rows > 0) {
    // output data of each row
    while($row = $result_q1->fetch_assoc()) {
         $myArray_q1[] = $row['amount'];
    }

} 
foreach ($myArray_q1 as  $value) {
$income_q1 = $income_q1+(int)$value ; 
}

// echo "$income_q1";
// q2
if ($result_q2->num_rows > 0) {
    // output data of each row
    while($row = $result_q2->fetch_assoc()) {
         $myArray_q2[] = $row['amount'];
    }

} 
foreach ($myArray_q2 as  $value) {
$income_q2 = $income_q2+(int)$value ; 
}

// echo "$income_q2";
if ($result_q3->num_rows > 0) {
    // output data of each row
    while($row = $result_q3->fetch_assoc()) {
         $myArray_q3[] = $row['amount'];
    }

} 
foreach ($myArray_q3 as  $value) {
$income_q3 = $income_q3+(int)$value ; 
}

// echo "$income_q3";
if ($result_q4->num_rows > 0) {
    // output data of each row
    while($row = $result_q4->fetch_assoc()) {
         $myArray_q4[] = $row['amount'];
    }

} 
foreach ($myArray_q4 as $value) {
$income_q4 = $income_q4+(int)$value; 
}
//  $incoming=[
// 'Incoming Q1'=>$income_q1,
// 'Incoming Q2'=>$income_q2,
// 'Incoming Q3'=>$income_q3,
// 'Incoming Q4'=>$income_q4
//  ];

$ele1 = new Counter();
$ele1 -> value = $income_q1;
$ele1 -> incoming = 'Incoming Q1';

$ele2 = new Counter();
$ele2 -> value = $income_q2;
$ele2 -> incoming = 'Incoming Q2';

$ele3 = new Counter();
$ele3 -> value = $income_q3;
$ele3 -> incoming = 'Incoming Q3';

$ele4 = new Counter();
$ele4 -> value = $income_q4;
$ele4 -> incoming = 'Incoming Q4';

$incoming = array($ele1,$ele2,$ele3,$ele4);
echo json_encode(['data'=>$incoming]);

$conn->close();

Class Counter{
    public $value;
    public $incoming;
}


?>
