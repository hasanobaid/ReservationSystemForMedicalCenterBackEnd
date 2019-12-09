<?php
session_start();

$con = mysql_connect('localhost','root','');
mysql_select_db('seminar',$con);

$cities=array();
$ins="SELECT * FROM cities";

$result=mysql_query($ins);

while($row = mysql_fetch_assoc($result)){
$cities[]=$row;
}
echo json_encode(['data'=>$cities]);
// if($num==1){
// 	echo "city is already exist!";

// }else{
// 	$reg="INSERT INTO `cities`(`cityID`, `cityname`) VALUES ('','$cityname')";
// 	mysql_query($reg,$con);
// 	echo "sucssessful";

// }
?>
