<?php

$filename='data\\data.json';
$file = fopen($filename, 'r');

$first_name_2= fgets($file);
$last_name_2= fgets($file);
$gender_2= fgets($file);
$age_2= fgets($file);
$temp_2= fgets($file);
$pressure_2= fgets($file);
fclose($file);

?>
