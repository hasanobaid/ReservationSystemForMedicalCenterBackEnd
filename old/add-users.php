<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db('seminar',$con);

$firstname= $_POST['firstname'];
$secondname=$_POST['secondname'];
$thirdname= $_POST['thirdname'];
$lastname= $_POST['lastname'];
$email= $_POST['email'];
$password= $_POST['password'];
$dateofbirth= $_POST['dateofbirth'];
$patientID=$_POST['personalID'];
$phonenumber= $_POST['phonenumber'];
$mobilenumber= $_POST['mobilenumber'];
$insuranceID=$_POST['insuranceID'];
$subinsuranceID=$_POST['subinsuranceID'];
$insuranceco=$_POST['insurancecompany'];
$cityname=$_POST['cityname'];
$qname=$_POST['qname'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$balance=$_POST['balance'];

// $ins="select * from patient where patientID='$patientID'";


	$reg="INSERT INTO `patient`(`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `balance`, `insuranceco`, `password`)  VALUES ('$patientID','$firstname','$secondname','$thirdname','$lastname,'$cityname','$qname','$insuranceID','$subinsuranceID','$dateofbirth','$email','$phonenumber','$mobilenumber','$address','$gender','$balance','$insuranceco','$password')";
	mysqli_query($reg,$con);

	if(	mysqli_query($reg,$con)){
		echo "done";
	}else{
		echo mysql_error($con);
	}
echo "sucssessful";
echo "$firstname";
echo "$cityname";
?>
