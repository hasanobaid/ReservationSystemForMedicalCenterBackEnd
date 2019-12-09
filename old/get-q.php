<?php

session_start();

$con = mysql_connect('localhost','root','');
mysql_select_db('seminar',$con);

$q=array();
$postdata = file_get_contents("php://input");
$req=json_decode($postdata);
$cityname=$req->cityname;
// $cityname=$_POST['cityname'];

// $c="SELECT cityID FROM cities WHERE cityname='$cityname'";

// $cID=mysql_query($c);
// $cityID=array();
// $cityID= mysql_fetch_assoc($cID);

$ins="SELECT qname FROM `quantom` WHERE (SELECT cityID FROM `cities` WHERE cityname='$cityname')";

$result=mysql_query($ins);
if(!$result){
	echo "error 2";
}
while($row = mysql_fetch_assoc($result)){
$q[]=$row;
}
echo json_encode(['data'=>$q]);

?>