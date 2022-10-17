<?php
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/cloudfare.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style2.css">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"> </script>
    <script type="text/javascript" src="model_script.js"></script>

</head>
<body id="image-body">
<header>
    <p>Patient's malaria detection</p>
</header>
<main>
    <div id="image">
        <label for="image-place">Choose a image please to detect</label><br>
        <input type="file" accept="image/*" name="file_choose" onchange="selection2()" id="file">
        <div id="image-place" class="blur">
            <img src="" alt="Choose Image" id="img">
        </div>
        <input type="button" class="login-username" id="detect-button" value="detect" onclick="detect()">
    </div>
    <div id="results">
        <p id="result-p">Results</p>
        <div id="report" class="blur" style="font-size: 1rem;">

            <label for="firstname_2">Name:</label>
            <span id="name_2" class="info"><?php echo $first_name_2 . " " . $last_name_2; ?></span>
            <hr class="a">
            <label for="gender_2">Gender:</label>
            <div id="gender_2" class="info"><?php echo $gender_2; ?></div>
            <hr class="a">
            <label for="age_2">Age:</label>
            <div id="age_2" class="info"><?php echo $age_2; ?></div>
            <hr class="a">
            <label for="temp_2">Temperature:</label>
            <div id="temp_2" class="info"><?php echo $temp_2; ?></div>
            <hr class="a">
            <label for="pressure_2">Pressure:</label>
            <div id="pressure_2" class="info"><?php echo $pressure_2; ?></div>
            <hr class="a">

            <div id="div_animated"></div>
            <label for="parasitic" id="parasitic-label"></label>
            <span id="parasitic" class="info rslt"></span>
            <hr>
            <label for="non-parasitic" id="non-parasitic-label"></label>
            <span id="non-parasitic" class="info rslt"></span>

            <hr>
            <label for="status" id="status-label"></label>
            <span id="status" class="info rslt"></span>
        </div>
        <input type="button" class="login-username" id="export-report" value="Export Report" onclick="submitResults()">
    </div>
</main>

<footer>

</footer>
<style>
    .a {
        visibility: visible;
        padding: 0;
        margin: 0;
    }

    #report > * {
        padding: 0;
        margin: 0;
        line-height: 1;
    }

    .info {
        font-size: 1.3rem;
    }

    .rslt {
        font-size: 2rem;
    }
    #div_animated{
        height: 70px;
        width: 70px;
        border: white 5px dotted;
        border-radius: 100%;
        animation: rotate ease 3s;
        animation-iteration-count: infinite;
        animation-fill-mode: forwards;
        visibility: hidden;
        /*transition: transform 50s ease-in-out;*/
        /*transform: rotate(180deg);*/
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        50%{
            transform: rotate(3600deg);
        }
        100% {
            transform: rotate(0deg);
        }
    }
</style>
<script>
    console.log("script ready");
    function submitResults(){
        var parasitic = document.getElementById('parasitic').innerHTML;
        var non_parasitic = document.getElementById('non-parasitic').innerHTML;
        var name = document.getElementById('name_2').innerHTML;
        name = name.slice(0, name.indexOf(" "));
        alert(name);

        if (parasitic && non_parasitic){
            alert("Results saved to patient " + name);

            //sendind results
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function (){console.log(xhttp.responseText);}
            xhttp.open("GET", "saveResults.php?parasitic=" + parasitic + "&non_parasitic=" + non_parasitic + "&name=" + name, true);
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
            console.log("datas sent");
        }else  {
            alert("No results to export");
        }
    }
</script>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<script src="scripts/second-page.js" defer></script>
</body>
</html>