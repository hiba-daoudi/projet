<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tf MNiST</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="mnist2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
   <style>
       img{
        vertical-align: middle;
        margin-top:2% ;
      }
      body{
          text-align: center;  
      }
   </style>
  <script>
      let predictions
    //<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
let model
async function loadModelMnist() {
    model = await  tf.loadLayersModel('models/model.json');
    alert('le modele est chargé avec succès'); 
    document.getElementById("charge").style.display='none';
    document.getElementById("charge").style.marginleft='-3%';
}
 async function pr(){
    const digit = document.getElementById("output_image");   
    img = tf.browser.fromPixels(digit, 1);
    console.log(this.img);
    console.log(" ");
    img= tf.image.resizeBilinear (img, [28,28]);
    img = img.reshape([-1, 28, 28, 1]);
    img = tf.cast(this.img, 'float32');
    console.log(this.img);
    const pred = await tf.tidy(() => {
    const output = model.predict(img);
    predictions = Array.from(output.dataSync());
    console.log(predictions);});
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
            borderWidth: 0.5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
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
            <input type="file" accept="image/*" onchange="preview_image(event)"style="margin-top: 3%;">
            <br>
            <img id="output_image" width=400px height='400 px' />
            <br>
            <p id="res">
            
        <center>
            <button class="btn btn-info" id='charge' onclick="loadModelMnist()">Charger Modèle</button>
            <a href="#myChart"><button class="btn btn-info" id='charge2'onclick="pr()">Predire</button></a><center>
    
        
        <canvas id="myChart"></canvas>
    
    
</body>
<!-- fonction de scroll vers le bas si on click sur view chart -->
<script>
        $("a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});
</script>
</html>