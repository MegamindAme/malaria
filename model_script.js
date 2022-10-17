// This File Will Load The converted Model and load it into js Format to be Used
// Author Bright Augustino

// document.getElementById('export-report').disabled = true
// document.getElementById('detect-button').disabled = true

async function predict_fn(image_path) {

    model = await tf.loadLayersModel('cnn_model/model.json');
    console.log('Model is Loaded')

    const image = new Image();
    image.src = image_path;

    image.onload = () => {

        // 1) Converting The Image To Tensor-like Object
        const tensor = tf.browser.fromPixels(image, 3)

        // 2) Resizing The Image to 224 as trained by The Model
        const resized_image = tf.image.resizeBilinear(tensor, [134, 134]).toFloat();

        // 3 ) Expanding The Image to This vector like (1,x,y,z)
        reshape_img = resized_image.expandDims(0);

        // 4 ) Predicting The Output Of The Image
        predict_result = model.predict(reshape_img).arraySync();

        parasitized_value = (String(predict_result).split(',')[0]);
        unparasitized_value = (String(predict_result).split(',')[1]);

        status = (parseFloat(parasitized_value) > parseFloat(unparasitized_value) && parseFloat(parasitized_value) * 100 > 60) ?  'Positive' : 'Negative';
        console.log(status)

        // Converting To Float
        parasitized_value = parseFloat(parasitized_value).toPrecision(3) * 100;
        unparasitized_value = parseFloat(unparasitized_value).toPrecision(3) * 100;


        parasitized_value = String(parasitized_value) + '%';
        unparasitized_value = String(unparasitized_value) + '%';

        results = [parasitized_value, unparasitized_value]

        document.getElementById('parasitic-label').innerHTML = "Parasitic:"
        document.getElementById('non-parasitic-label').innerHTML = "Non-Parasitic:"
        document.getElementById('parasitic').innerHTML = results[0];
        document.getElementById('non-parasitic').innerHTML = results[1];
        document.getElementById('status-label').innerHTML = "Status: ";
        document.getElementById('status').innerHTML = status;
        document.getElementsByTagName('hr')[0].style.visibility = "visible"
        document.getElementById('export-report').disabled = false
        document.getElementById('detect-button').disabled = false
    }


}

function validate(image_id) {

    document.getElementById('div_animated').style.visibility = "visible";
    // Load the model......
    cocoSsd.load().then(model => {

        // detect objects in the image.....
        model.detect(image_id).then(predictions => {

            // If The Length Of the Prediction is 0 Then this means that
            // No Common Objects Are Found In The Images.....
            // Then We can Predict the iamge From Our Custom_pretrained Model....

            document.getElementById('div_animated').style.visibility = "hidden";

            if (predictions.length === 0) predict_fn(image_id.src);

            // This Means That The image passed by the user contains common objects......
            else alert('This Image is not Valid.....');

            console.log(predictions);

        });
    });
}

