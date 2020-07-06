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
    
    <script src="https://cdn.jsdelivr.net/npm/p5@1.0.0/lib/p5.min.js"></script>
    <link rel="stylesheet" href="../CSS/x.css">
    <style>
 
    </style>
<script>
     let predictions
        let model
    async function loadModelMnist() {
            model = await tf.loadLayersModel('../models/model.json');
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
            document.getElementById("g").innerHTML='le numéro écrit est : ' + index ;
            
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
<div class = "b3"> 
<a href="../acceuil/acceuil.html" > <button class ="e"> Accueil </button></a> </div>
<div id="ex1" class="modal"> 
    <p id = "g"></p>
</div>
    <img id="output_image" src="..\images\image.png" width='300px' height='300 px' />
    
    <br>
    <p id="res">
        <center>
            
            <a href="#ex1" rel="modal:open" ><button class="btn c" id='charge2' style= "display: none;" onclick="pr()">Predire</button></a>
            <a href="../acceuil/acceuil.html" > <button id ="m"> Accueil </button></a> 
            <center>
            
    </p>
    <div class="footer">
        
    <strong> Copyright © 2020</strong>
    </div>

</body>