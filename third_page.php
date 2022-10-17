<?php
$conn = new mysqli('localhost', 'root', '', 'patients');
$query = "SELECT * FROM `patient_information` ";
if ($conn->connect_error) {
    echo 'no';
} else {

}
//echo 'yes';
$variable = mysqli_query($conn, $query);
if ($variable) {
    while ($datas = mysqli_fetch_assoc($variable)) {
        $load[] = $datas;
    }

    // echo json_encode($load);

}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malaria Diagnosis Report</title>
    <link rel="stylesheet" href="styles/cloudfare.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style2.css">
    <link rel="stylesheet" href="styles/table.css">
</head>
<body id="table-Body">
<p id="header_p">Patients' Records</p>
<div id="input-div">
    <input type="text" id="myInput" placeholder="search" onkeyup="tableSearch()">
</div>
<main id="center">
    <div id="scroll">
        <table id="myTable">
            <thead>
            <tr>
                <?php

                $num = 0;
                $load_array_keys = array_keys($load[0]);
                while ($num < count($load_array_keys)) {
                    echo "<th>" . ($load_array_keys[$num] . "</th>");
                    $num++;
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($load as $patient) {
                echo "<tr>";
                foreach ($patient as $attribute) {
                    echo "<td>" . $attribute . "</td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div id="selected-row">
        <p id="firstName"></p>
        <p id="lastName"></p>
        <p id="age"></p>
        <p id="gender"></p>
        <p id="temperature"></p>
        <p id="pressure"></p>
        <p id="region"></p>
        <p id="telephoneNumber"></p>
        <p id="symptoms" style="padding: 0;"></p>
        <p id="parasitic" style="padding: 0;"></p>
        <p id="non-parasitic" style="padding: 0;"></p>
        <p id="status" style="padding: 0;"></p>

    </div>
</main>
<style>
    #header_p{
        text-align: center;
    }
    #center{
        display: flex;
        flex-direction: row;
        /*align-items: flex-start;*/
        margin: 0;
        padding: 0;
    }
    input {
        width: 19rem;
        height: 2rem;
        margin: 3%;
        margin-left: 15px;
        color: black;
    }

    #scroll {
        /*height: 10rem;*/
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        margin: 0;
        margin-right: 3px;
        margin-left: 11px;
        padding: 0;
        text-wrap: normal;
    }

    #input-div {
        align-items: center;
        justify-content: center;
        width: fit-content;
        margin: 0;
        padding: 0;
    }

    table {
        margin: 0;
        margin-left: 15px;
        margin-right: 3px;
        margin-bottom: 3px;
    }
    #selected-row{
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 0;
        padding-top: 0;
        overflow: hidden;
    }
    p{
        text-align: left;
        margin-top: 0;
        margin-bottom: 1px;
        padding: 0;
        text-wrap: initial;
    }
    p:last-child{
        padding: 0;
    }
    span{

    }
    label{
        font-size: 1.2rem;
    }

</style>

<div class="underlay-photo"></div>
<div class="underlay-black"></div>

<script>
    function tableSearch() {
        let input, filter, table, tr, td, td1, txtValue, txtValue1;

        //Initializing variables

        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        table = document.getElementById('myTable');
        tr = table.getElementsByTagName('tr');

        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td')[1];
            td1 = tr[i].getElementsByTagName('td')[2];
            if (td || td1) {
                txtValue = td.textContent || td.innerText;
                txtValue1 = td1.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    addEventListeners();

    var firstname = document.getElementById('firstName');
    var secondname = document.getElementById('lastName');
    var temperature = document.getElementById('temperature');
    var gender = document.getElementById('gender');
    var pressure = document.getElementById('pressure');
    var age = document.getElementById('age');
    var phoneNumber = document.getElementById('telephoneNumber');
    var city = document.getElementById('region');
    var symptoms = document.getElementById('symptoms');
    var parasytic = document.getElementById('parasitic');
    var non_parasytic = document.getElementById('non-parasitic');
    var status_id = document.getElementById('status');

    function addEventListeners() {
        var table = document.getElementById('myTable');

        for (let i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function () {

                let tds = this.getElementsByTagName('td');
                console.log(this);
                firstname.innerHTML = "<label>FirstName:</label> " + "<span>" + tds[1].innerText + "</span>" + "<br>";
                secondname.innerHTML = "<label>LastName:</label> " + "<span>" + tds[2].innerText + "</span>" + "<br>";
                age.innerHTML = "<label>Age:</label> " + "<span>" + tds[3].innerText + "</span>" + "<br>";
                gender.innerHTML = "<label>Gender:</label> " + "<span>" + tds[4].innerText + "</span>" + "<br>";
                pressure.innerHTML = "<label>Pressure:</label> " + "<span>" + tds[5].innerText + "</span>" + "<br>";
                temperature.innerHTML = "<label>Temperature:</label> " + "<span>" + tds[6].innerText + "</span>" + "<br>";
                phoneNumber.innerHTML = "<label>PhoneNumber:</label> " + "<span>" + tds[7].innerText + "</span>" + "<br>";
                city.innerHTML = "<label>City:</label> " + "<span>" + tds[8].innerText + "</span>" + "<br>";
                symptoms.innerHTML = "<label>Symptoms:</label> " + "<span>" + tds[9].innerText + "</span>" ;
                parasytic.innerHTML = "<label>Malaria positive by:</label> " + "<span>" + tds[10].innerText + "</span>" ;
                non_parasytic.innerHTML = "<label>Malaria negative by:</label> " + "<span>" + tds[11].innerText + "</span>" ;

                status = (parseFloat(parasytic.getElementsByTagName('span')[0].innerHTML) > parseFloat(non_parasytic.getElementsByTagName('span')[0].innerHTML) && parseFloat(parasytic.getElementsByTagName('span')[0].innerHTML) * 100 > 60) ?  'Positive' : 'Negative';
                status_id.innerHTML = "<label>Status:</label>" + "<span>" + status + "</span>";
            }
        }
    }
</script>
</body>
</html>

