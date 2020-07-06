<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tf MNiST</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <link rel="stylesheet" href="mnist2.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script>
      let predictions
    //<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
let model
async function loadModelMnist() {
    model = await  tf.loadLayersModel('models/model.json');
}
 async function pr(){
    const digit = document.getElementById("output_image");   
    img = tf.browser.fromPixels(digit, 1);
    img= tf.image.resizeBilinear (img, [28,28]);
    img = img.reshape([-1, 28, 28, 1]);
    img = tf.cast(this.img, 'float32');
    console.log(this.img);
    const pred = await tf.tidy(() => {
    const output = model.predict(img);
    predictions = Array.from(output.dataSync());
    console.log(predictions);
    document.getElementById("res").innerHTML = predictions;});
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['0', '1', '2', '3', '4', '5','6','7','8','9'],
        datasets: [{
            label: '# of Votes',
            data: predictions,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}
function tst(){
    console.log(model);
}
function preview_image(event) {
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);

}
</script>

</head>
<body>
<div class="container">
    <div class="row">
        <div id="wrapper">
            <input type="file" accept="image/*" onchange="preview_image(event)">
            <br>
            <img id="output_image" width=400px height='400 px' />
            <br>
            <p id="res">
            
        </div>
        <div class="col-sm-12" style="margin-top: 15px;">
            <button id='styled' onclick="loadModelMnist()">Charger Modèle</button>
            <button id='styled' onclick="pr()">Predire</button>
        </div>
        
        <canvas id="myChart" width="200" height="200"></canvas>
    </div>
</div>
    
</body>
</html>