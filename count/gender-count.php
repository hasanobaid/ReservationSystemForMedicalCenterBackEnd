<?php
require 'conection.php';
?>

<?php
$male = 'male';
$female = 'female'; 

$sql_male = "SELECT count(*) as total from patient WHERE gender = '$male' ";
$sql_female = "SELECT count(*) as total from patient WHERE gender = '$female' ";

$result = $conn->query($sql_male);
$result_female = $conn->query($sql_female);
$data_female=$result_female->fetch_assoc();
$total_female = $data_female['total'];
$data=$result->fetch_assoc();
$total = $data['total'];

$femaleCount = new Counter();
$femaleCount -> gender = 'Female';
$femaleCount -> value = $total_female;

$maleCount = new Counter();
$maleCount -> gender = 'Male';
$maleCount -> value = $total;

$genderArray = array($femaleCount, $maleCount);
echo json_encode(['data'=>$genderArray]);

$conn->close();

class Counter{
	public $gender;
	public $value;
}

?>
