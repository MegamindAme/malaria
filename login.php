<?php
$symptomsArray = ['fever', 'nausea', 'vomiting', 'Headeache', 'shaking chills', 'tiredness', 'diarrhea', 'high temperature', 'muscle pains', 'feeling hot and shivery'];
$name = 'checkboxes[]';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Patients Information Recording</title>
    <link rel="stylesheet" href="styles/cloudfare.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style2.css">

</head>
<body id="login-body">
<p id="heading">Patients Information</p>
<!-- partial:index.partial.html -->
<form class="login-form" method="post" action="direct_to_second_page.php" name="myform" >
    <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
    </p>
    <div id="names">
        <input type="text" class="login-username" name="first_name" id="first-name" required="true" placeholder="First Name" />
        <input type="text" class="login-username" name="last_name" id="second-name" required="true" placeholder="Last Name" />
    </div>
    <div  id="metrics">
        <input type="text" class="login-username" name="temp"  id="temp" required="true" placeholder="Temperature in celcius" maxlength="3" size="3"/>
        <input type="text" class="login-username" name="pressure" id="pressure" required="true" placeholder="Pressure" maxlength="3" size="3"/>
    </div>

    <div  id="info">
        <input type="text" class="login-username" name="age" id="age" required="true" placeholder="Age" maxlength="3" size="3"/>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div  id="adress">
        <input type="text" class="login-username" name="phone_number" id="phone_number" required="true" placeholder="Phone Number starting with 0" maxlength="10" size="10"/>
        <input type="text" class="login-username" name="city" id="city" required="true" placeholder="City" />
        <input type="text" class="login-username" name="region" id="district" required="true" placeholder="District" />
    </div>
    <div id="symptoms" >
        <p>Choose Patient's Symptoms</p>
        <?php
            foreach ($symptomsArray as $item){
                echo("<div class=\"symptom-options\">" .
                    "      <input type=\"checkbox\" value=\"". $item ."\" id=\"" . $item . "\" name=\"" . $name . "\">" .
                    "      <label for=\"" . $item . "\">" . $item . "</label>" .
                    "    </div>");
            }
        ?>
    </div>
    <div id="submit_buttons">
        <input type="button" value="Previous Reports" class="login-submit" onclick="report_analysis()" />
        <input type="button" id="btn" name="Login" value="Next" class="login-submit" onclick="submitform()"/>
    </div>
</form>



<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
<!--<script src="scripts/script.js" defer></script>-->
<script src="scripts/Validation.js" defer></script>
</body>
</html>
<!--<div class="symptom-options">-->
<!--  <input type="checkbox" id="fever" required="true" name="fever">-->
<!--  <label for="fever">fever</label>-->
<!--</div>-->