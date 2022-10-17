console.log("leo")

var firstname = document.getElementById('first-name');
var secondname = document.getElementById('second-name');
var temperature = document.getElementById('temp');
var pressure = document.getElementById('pressure');
var age = document.getElementById('age');
var phoneNumber = document.getElementById('phone_number');
var City = document.getElementById('city');
var district = document.getElementById('district');
var btn = document.getElementById('btn');

// btn.addEventListener('click', submitform(e));

const tempRegex = /[a-zA-Z]/;

age.addEventListener("keyup", l);
temperature.addEventListener("keyup", l);
pressure.addEventListener("keyup", l);
phoneNumber.addEventListener("keyup", l);

function l(e){
    test = !e.key.includes('Arrow') && e.key != 'Backspace' && e.key != 'Delete' && !e.key.includes('Enter');
    if (tempRegex.test(e.key) && test){
        console.log(this.value)
        this.value = this.value.slice(0,this.value.indexOf(e.key-1));
    }
    console.log(e);
}

//document.forms['myform'].addEventListener('submit',submitform(e))
function checkCheckBoxes(){
    var check = document.getElementsByName('checkboxes[]')
    for (const checkKey in check) {
        if (check[checkKey].checked)
            return true;
    }
    alert("Choose the Patient's symptoms");
    return false;
}

function checkNumbers(){
    if (phoneNumber.value.length < 10 || phoneNumber.value[0] != 0){
        alert("Phone Number is not valid");
        return false;
    }
    return true;
}
function submitform(){
     // e.preventDefault();
    if (!firstname.value){
        alert("write the first name");
        document.myform.first_name.focus();
        return;
    }
    if (!secondname.value){
        alert("write the last name");
        document.myform.second_name.focus();
        return;
    }
    if (!temperature.value){
        alert("write the temperature");
        document.myform.temp.focus();
        return;
    }
    if (!age.value){
        alert("write the age");
        document.age.focus();
        return;
    }
    if (!pressure.value){
        alert("write the pressure");
        document.myform.pressure.focus();
        return;
    }
    if (!phoneNumber.value){
        alert("write the phone number");
        document.myform.phone_number.focus();
        return;
    }
    if (!City.value){
        alert("write the city");
        document.myform.city.focus();
        return;
    }
    if (!district.value){
        alert("write the district");
        document.myform.region.focus();
        return;
    }
    if (checkCheckBoxes() && checkNumbers()){
            document.forms['myform'].submit();
    }
}

function report_analysis(){
    window.location = "third_page.php";
    console.log("yes")
}

