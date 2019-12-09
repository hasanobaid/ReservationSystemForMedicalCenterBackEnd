<?php
require 'conection.php';
?>

<?php
$empID=$_GET['rempID'];
$sql_res = "SELECT * FROM appointment WHERE  rempID = '$empID'";
$sql_pay = "SELECT * FROM patient_payment_detail WHERE  empID = '$empID'";

$act = 'reservation';
$act2 = 'payment';
$result_res = $conn->query($sql_res);
$result_pay = $conn->query($sql_pay);
$patientID   = array();
$adate=  array();
$myArray_res = array();
$myArray_pay = array();
$firstname = array(); 
$lastname=array();

if ($result_res->num_rows > 0) {
    // output data of each row
	while($row = $result_res->fetch_assoc()) {
		$patientID[] = $row['patientID'];
		$adate[] = $row['adate'];
	}
} 
foreach ($patientID as $value) {
	$sql_first = "SELECT firstname , lastname FROM patient WHERE  patientID = '$value'";
	$result_first = $conn->query($sql_first);
	if ($result_first->num_rows > 0) {
    // output data of each row
		while($row = $result_first->fetch_assoc()) {
			$firstname[] = $row['firstname'];
			$lastname[] = $row['lastname'];

		}
	} 

}

for ($i=0; $i <sizeof($patientID) ; $i++) {
				$activity[$i]=[
					'patientID'=> $patientID[$i],
					'firstname'=>$firstname[$i],
					'lastname'=>$lastname[$i],
					'date'=>$adate[$i],
					'activity' =>$act
				];	

}
// echo json_encode(['data'=>$activity]);
// $activity=[
// 'patientID'=> $patientID[],
// 'firstname'=>$firstname[],
// 'lastname'=>$lastname[],
// 'date'=>$adate[];
// ];

 $patientID1   = array();
$senddate =  array();
$firstname1 = array(); 
$lastname1=array();
//$activity = array();

if ($result_pay->num_rows > 0) {
    // output data of each row
	while($row = $result_pay->fetch_assoc()) {
		$patientID1[] = $row['patientID'];
		$senddate[] = $row['senddate'];
	}

}
// print_r($patientID1);
// print_r($senddate);
// }else{
// 	                   echo "Error: " . mysqli_error($con);

// }
// print_r($patientID1);

foreach ($patientID1 as $value) {
	$sql_first = "SELECT firstname , lastname FROM patient WHERE  patientID = '$value'";
	$result_first = $conn->query($sql_first);
	if ($result_first->num_rows > 0) {
    // output data of each row
		while($row = $result_first->fetch_assoc()) {
			$firstname1[] = $row['firstname'];
			$lastname1[] = $row['lastname'];

		}
	} 

}
// print_r($patientID1);
$activity2 = array(); 
for ($i=0; $i <sizeof($patientID1) ; $i++) {
		# code...
	
				$activity2[$i]=[
					'patientID'=> $patientID1[$i],
					'firstname'=>$firstname1[$i],
					'lastname'=>$lastname1[$i],
					'date'=>$senddate[$i],
					'activity' =>$act2
				];	

}
// print_r($activity);
// print_r($activity2);
// print_r($activity);

$activities = array_merge_recursive($activity,$activity2);
// print_r($activities);
// print_r($activities);

// $patientIDs = $activities['patientID'];
// $firstnames =$activities['firstname']; 
// $lastnames = $activities['lastname']; 
// $dates = $activities['date']; 
// $acts = $activities['activity'];
// print_r($patientIDs);
// echo sizeof($patientIDs);
// $finally = array(); 
// for ($i=0; $i <sizeof($patientIDs) ; $i++) {
// 		# code...
// 	echo "$i";
// 				$finally[$i]=[
// 					'patientID'=> $patientIDs[$i],
// 					'firstname'=>$firstnames[$i],
// 					'lastname'=>$lastnames[$i],
// 					'date'=>$dates[$i],
// 					'activity' =>$acts[$i]
// 				];	
// 				// echo json_encode(['data'=>$finally]);


// }

// print_r($patientIDs);
// print_r($firstnames);
// print_r($lastnames);
// print_r($dates);
// print_r($acts);

// print_r($activities);

 

// echo "$activities[0][0]" ;
	# code...


echo json_encode(['data'=>$activities]);

$conn->close();


?>
