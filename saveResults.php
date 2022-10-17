<?php

$parasitics = $_GET['parasitic'];
$non_parasitics = $_GET['non_parasitic'];
$names = $_GET['name'];


$conn=new mysqli('localhost','root','','patients');
if($conn->connect_error){
    die('Connection failed :'.$conn->connect_error);
}

$query = "UPDATE `patient_information` SET `parasitic in %` = '$parasitics', `non-parasitic in %` = '$non_parasitics' WHERE `patient_information`.`First_name` = '$names'";
if (mysqli_query($conn,$query)){
    echo 'submitted';
}
mysqli_close($conn);

