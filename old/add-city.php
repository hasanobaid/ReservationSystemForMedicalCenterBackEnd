<?php
session_start();

$con = mysql_connect('localhost','root','');
mysql_select_db('seminar',$con);

$cityname= $_POST['cityname'];
$ins="SELECT * FROM cities WHERE cityname='$cityname'";
$result=mysql_query($ins);

$num=mysql_num_rows($result);

if($num==1){
	echo "city is already exist!";

}else{
	$reg="INSERT INTO `cities`(`cityID`, `cityname`) VALUES ('','$cityname')";
	mysql_query($reg,$con);
	echo "sucssessful";

}
?>
