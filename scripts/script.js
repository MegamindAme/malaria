

var option = document.getElementById('symptoms')
var name = 'checkboxes[]';
var symptomsArray = ['fever', 'nausea', 'vomiting', 'Headeache', 'shaking chills', 'tiredness', 'diarrhea', 'high temperature', 'muscle pains', 'feeling hot and shivery']

symptomsArray.forEach(addToDiv)
counter();

function addToDiv(item){
    option.innerHTML += '<div class="symptom-options">' +
        '      <input type="checkbox" id="' + item + '" name="' + name + '">' +
        '      <label for="' + item + '">' + item + '</label>' +
        '    </div>'
}

function counter (){
    for(i=0; i<document.querySelectorAll('input').length; i++){
        document.querySelectorAll('input')[i].name=`prsc${i}`;
    }
}





