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
        //xhttp.onload = function (){console.log(xhttp.responseText);}
        xhttp.open('POST', 'saveResults.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("paarasitic=" + parasitic "&non_parasitic=" + non_parasitic + "&name=" + name);
    }else  {
        alert("No results to exprot");
    }
}