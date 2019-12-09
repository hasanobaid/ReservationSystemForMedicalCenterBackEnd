<?php
$conn = new mysqli('localhost', 'root', '', 'seminar');

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

// $khra=file_get_contents("php://input");
// echo "$khra";
$sql = "INSERT INTO `patient` (`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `balance`, `insuranceco`, `password`) VALUES ($patientID,'$firstname','$secondname','$thirdname','$lastname',$cityname,$qname,$insuranceID,$subinsuranceID,'$dateofbirth','$email','$phonenumber','$mobilenumber','$address','$gender',$balance,'$insuranceco','$password')";

// $sql1 = "INSERT INTO `patient` (`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `balance`, `insuranceco`, `password`) VALUES (111,'hasan','khaled','hasan','obaid',1,1,123,123,'1997-01-01','hasan','123','1234','ha','male',0,'lkl','hasan')";

   if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . mysqli_error($conn);
            }
            $conn->close();

?>