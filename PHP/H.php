<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tf MNiST</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    
    <script src="https://cdn.jsdelivr.net/npm/p5@1.0.0/lib/p5.min.js"></script>
<<<<<<< HEAD:H.php
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="mnist2.css">
    <link rel="stylesheet" href="blossom.css">
    <style>
        img {
            vertical-align: middle;
            margin-top: 2%;
        }

        body {
            text-align: center;
        }
        .c{
    background: rgb(18,60,105);;
    color: rgb(238,226,220);
  }
=======
    <link rel="stylesheet" href="../CSS/H.css">
    <!-- <link rel="stylesheet" href="../CSS/blossom.css"> -->
    <style>
 
 .modal a.close-modal[class*="icon-"] {
    top: -10px;
    right: -10px;
    width: 20px;
    height: 20px;
    color: #fff;
    line-height: 1.25;
    text-align: center;
    text-decoration: none;
    text-indent: 0;
    background: #900;
    border: 2px solid #fff;
    -webkit-border-radius: 26px;
    -moz-border-radius: 26px;
    -o-border-radius: 26px;
    -ms-border-radius: 26px;
    -moz-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
}
>>>>>>> 39bc7636b7b446e50285b729f815fdeaeacbd003:PHP/H.php
    </style>
<script>
     let predictions
        let model
    async function loadModelMnist() {
<<<<<<< HEAD:H.php
            model = await tf.loadLayersModel('models/model.json');
=======
            model = await tf.loadLayersModel('../models/model.json');
>>>>>>> 39bc7636b7b446e50285b729f815fdeaeacbd003:PHP/H.php
            const  myImage = new Image(400, 400);
            for (var y = 1; y <= v; y = y + 1) {
                myImage.src = '../images/image' + y + '.png';
                console.log(myImage);
                // document.getElementById('i').appendChild(myImage); 
                img = tf.browser.fromPixels(myImage, 1);
                img = tf.image.resizeBilinear(img, [28, 28]);
                img = img.reshape([-1, 28, 28, 1]);
                img = tf.cast(this.img, 'float32');
                console.log(this.img);
                const pred = await tf.tidy(() => {
                    const output = model.predict(img);
                    predictions = Array.from(output.dataSync());
                    console.log(predictions);
                });}
                document.getElementById("charge2").style.display="block";

        }
    </script>

</head>

<body id='i' onload = 'loadModelMnist()'>
    <script>
       
        const v = <?php echo $_GET['v']; ?>;

        

        async function pr() {
            var index = [];
                const  myImage = new Image(400, 400);
                for (var y = 1; y <= v; y = y + 1) {
                myImage.src = '../images/image' + y + '.png';
                console.log(myImage);
                // document.getElementById('i').appendChild(myImage); 
                img = tf.browser.fromPixels(myImage, 1);
                img = tf.image.resizeBilinear(img, [28, 28]);
                img = img.reshape([-1, 28, 28, 1]);
                img = tf.cast(this.img, 'float32');
                console.log(this.img);
                const pred = await tf.tidy(() => {
                    const output = model.predict(img);
                    predictions = Array.from(output.dataSync());
                    console.log(predictions);
                    m=predictions.indexOf(max(predictions));
                    index.push(m);
                });
            }

            console.log(index);
            index = index.join('');
            console.log(index);
            document.getElementById("g").innerHTML='le numero affiche est : ' + index;
        }
        function max(n){
    var b = 0;
    for(var i = 0;i < n.length; i++){
        if(b <= n[i]){
            b = n[i];
        }
    }
    console.log(b);
return b ;
}
    </script>
<!-- <header class="b3"> hiba </header> -->
<<<<<<< HEAD:H.php
    <img id="output_image" src="images\image.png" width='300px' height='300 px' />
=======
<div id="ex1" class="modal"> 
    <p id = "g"></p>
</div>
    <img id="output_image" src="..\images\image.png" width='300px' height='300 px' />
>>>>>>> 39bc7636b7b446e50285b729f815fdeaeacbd003:PHP/H.php
    
    <br>
    <p id="res">
        <center>
            
<<<<<<< HEAD:H.php
            <a href="#myChart"><button class="btn c" id='charge2' onclick="pr()">Predire</button></a>
            <center>
    </p>

    <div id='idnameofdiv' style="display: none;"></div>
    <!-- <div class="footer">
        Copyright © 2020
    </div> -->
=======
            <a href="#ex1" rel="modal:open" ><button class="btn c" id='charge2' style= "display: none;" onclick="pr()">Predire</button></a>
            <center>
    </p>
    <div class="footer">
        
    <strong> Copyright © 2020</strong>
    </div>
>>>>>>> 39bc7636b7b446e50285b729f815fdeaeacbd003:PHP/H.php

</body>