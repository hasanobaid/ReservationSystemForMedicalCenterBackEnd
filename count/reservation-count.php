<?php
require 'conection.php';
?>

<?php


$m1 = date('2018-12-31');
$m2 = date('2019-01-31');
$m3 = date('2019-02-31');
$m4 = date('2019-03-31');
$m5 = date('2019-04-31');
$m6 = date('2019-05-31');
$m7 = date('2019-06-31');
$m8 = date('2019-07-31');
$m9 = date('2019-08-31');
$m10 = date('2019-09-31');
$m11 = date('2019-10-31');
$m12 = date('2019-11-31');
$m13 = date('2019-12-31');



$sql_m1 = "SELECT count(*) as total from  appointment WHERE adate > '$m1' and adate < '$m2' ";
$sql_m2 = "SELECT count(*) as total from appointment WHERE adate > '$m2' and adate < '$m3' ";
$sql_m3 = "SELECT count(*) as total from appointment WHERE adate > '$m3' and adate < '$m4' ";
$sql_m4 = "SELECT count(*) as total from appointment WHERE adate > '$m4' and adate < '$m5' ";
$sql_m5 = "SELECT count(*) as total from appointment WHERE adate > '$m5' and adate < '$m6' ";
$sql_m6 = "SELECT count(*) as total from appointment WHERE adate > '$m6' and adate < '$m7' ";
$sql_m7 = "SELECT count(*) as total from appointment WHERE adate > '$m7' and adate < '$m8' ";
$sql_m8 = "SELECT count(*) as total from appointment WHERE adate > '$m8' and adate < '$m9' ";
$sql_m9 = "SELECT count(*) as total from appointment WHERE adate > '$m9' and adate < '$m10' ";
$sql_m10 = "SELECT count(*) as total from appointment WHERE adate > '$m10' and adate < '$m11' ";
$sql_m11 = "SELECT count(*) as total from appointment WHERE adate > '$m11' and adate < '$m12' ";
$sql_m12 = "SELECT count(*) as total from appointment WHERE adate > '$m12' and adate < '$m13' ";


$result_m1 = $conn->query($sql_m1);
$result_m2 = $conn->query($sql_m2);
$result_m3 = $conn->query($sql_m3);
$result_m4 = $conn->query($sql_m4);
$result_m5 = $conn->query($sql_m5);
$result_m6 = $conn->query($sql_m6);
$result_m7 = $conn->query($sql_m7);
$result_m8 = $conn->query($sql_m8);
$result_m9 = $conn->query($sql_m9);
$result_m10 = $conn->query($sql_m10);
$result_m11 = $conn->query($sql_m11);
$result_m12 = $conn->query($sql_m12);

$data_m1=$result_m1->fetch_assoc();
$total_m1 = $data_m1['total'];
$data_m2=$result_m2->fetch_assoc();
$total_m2 = $data_m2['total'];

$data_m3=$result_m3->fetch_assoc();
$total_m3 = $data_m3['total'];
$data_m4=$result_m4->fetch_assoc();
$total_m4 = $data_m4['total'];
$data_m5=$result_m5->fetch_assoc();
$total_m5 = $data_m5['total'];
$data_m6=$result_m6->fetch_assoc();
$total_m6 = $data_m6['total'];
$data_m7=$result_m7->fetch_assoc();
$total_m7 = $data_m7['total'];
$data_m8=$result_m8->fetch_assoc();
$total_m8 = $data_m8['total'];
$data_m9=$result_m9->fetch_assoc();
$total_m9 = $data_m9['total'];
$data_m10=$result_m10->fetch_assoc();
$total_m10 = $data_m10['total'];
$data_m11=$result_m11->fetch_assoc();
$total_m11 = $data_m11['total'];
$data_m12=$result_m12->fetch_assoc();
$total_m12 = $data_m12['total'];

//  $reservation=[
// 'January'=>$total_m1,
// 'February'=>$total_m2,
// 'March'=>$total_m3,
// 'April'=>$total_m4,
// 'May'=>$total_m5,
// 'June'=>$total_m6,
// 'July'=>$total_m7,
// 'August'=>$total_m8,
// 'September'=>$total_m9,
// 'October'=>$total_m10,
// 'November'=>$total_m11,
// 'December'=>$total_m12
// ];
$m1 = new Counter('January',$total_m1);
$m2 = new Counter('February',$total_m2);
$m3 = new Counter('March',$total_m3);
$m4 = new Counter('April',$total_m4);
$m5 = new Counter('May',$total_m5);
$m6 = new Counter('June',$total_m6);
$m7 = new Counter('July',$total_m7);
$m8 = new Counter('August',$total_m8);
$m9 = new Counter('September',$total_m9);
$m10 = new Counter('October',$total_m10);
$m11 = new Counter('November',$total_m11);
$m12 = new Counter('December',$total_m12);

$reservation = array($m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12);
echo json_encode(['data'=>$reservation]);

$conn->close();

Class Counter{
	public $month;
	public $value;
	function __construct($a,$b){
		$this->month = $a;
		$this->value = $b;
	}
}


?>
