var image_place = document.getElementById("image-place")
var folderPath = 'testing_images\\';
var imageName ;
// function selection(){
//     console.log(file.value)
//
//     var string = file.value.slice(12)
//     console.log(string)
//     //string = '<image href="'+string+'"></image>'
//     image_place.style.background = "url('"+string+"')"
//     // a.innerHTML = string
//     console.log(string)
//     console.log("url('"+string+"')")
// }

function selection2(){
    console.log(file.value.slice(12))
    imageName = file.value.slice(12)
    const files = document.getElementById("file").files[0];
    console.log(files)
    if (files){
        const reader = new FileReader()
        reader.addEventListener("load", function (){
            console.log(this)
            console.log(this.result)
            document.getElementById("img").setAttribute("src", this.result)
            document.getElementById("img").style.border = "3px white solid"
        })
        reader.readAsDataURL(files)
    }
}

function  detect(){
    validate(document.getElementById('img'));
    console.log('called')
}