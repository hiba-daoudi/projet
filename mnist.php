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
    <script src="https://cdn.jsdelivr.net/npm/p5@1.0.0/lib/p5.min.js"></script>
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
let digit;
var index = [];
 async function pr(){  
    for (var y = 1; y <= <?php echo $_GET['v']; ?>; y = y + 1) {
        var digit =  document.getElementById('image');
        digit.src = 'images/image'+y+'.png';
        document.getElementById("res").innerHTML = 'images/image'+y+'.png';
    img = tf.browser.fromPixels(digit, 1);
    img= tf.image.resizeBilinear (img, [28,28]);
    img = img.reshape([-1, 28, 28, 1]);
    img = tf.cast(this.img, 'float32');
    console.log(this.img);
    const pred = await tf.tidy(() => {
    const output = model.predict(img);
    predictions = Array.from(output.dataSync());
    console.log(predictions);
    // console.log(predictions.max());
    // m=predictions.indexOf(Math.max(predictions));
    // index.push(m);
});
console.log(index);
}
//     var ctx = document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['0', '1', '2', '3', '4', '5','6','7','8','9'],
//         datasets: [{
//             label: '# of Votes',
//             data: predictions,
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 0.5
//         }]
//     },
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });
}
function tst(){
    console.log(model);
}
</script>

</head>
<body>
            <img id="output_image" src="images\image.png" width=400px height='400 px' />
            <img id="image"  width=400px height='400 px' style="display:none;" />

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