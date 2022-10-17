<?php
header('Location: second_page.php');

$filename='data\\data.json';
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$temperature = $_POST['temp'];
$pressure = $_POST['pressure'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$city = $_POST['city'];
$region = $_POST['region'];
$symptoms = $_POST['checkboxes'];
$symptoms_to_database_string = "";

$file = fopen($filename, 'w');
fwrite($file, $firstname."\n".$lastname."\n".
                    $gender."\n".$age."\n".$temperature."\n".
                        $pressure);
fclose($file);


foreach ($symptoms as $items){
    $symptoms_to_database_string .= ($items . ", ");
}
echo $symptoms_to_database_string;
//$symptoms = array("symptoms" => "malaria");
//$num = 0;
//    foreach ($_POST['checkboxes'] as $items){
//        $symptoms = array_merge($symptoms, [(string)$num => $items]);
//        $num++;
//    }
$conn=new mysqli('localhost','root','','patients');
if($conn->connect_error){
    die('Connection failed :'.$conn->connect_error);
}
else
{

}

$query = "INSERT INTO `patient_information`(`First_name`, `Last_name`, `Age`, `gender`, `Temperature`, `Pressure`, `Region`, `telephone_number`,`symptoms`)
 VALUES ('$firstname','$lastname','$age','$gender','$temperature','$pressure','$region','$phone_number','$symptoms_to_database_string')";
    if (mysqli_query($conn,$query)){
            echo 'submitted';
    }
    mysqli_close($conn);

