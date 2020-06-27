<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tf MNiST</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="mnist2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p5@1.0.0/lib/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <style>
        img {
            vertical-align: middle;
            margin-top: 2%;
        }

        body {
            text-align: center;
        }
    </style>


</head>

<body id='i' >
    <script>
        let predictions
        let model
        const v = <?php echo $_GET['v']; ?>;

        async function loadModelMnist() {
            model = await tf.loadLayersModel('models/model.json');
            
            document.getElementById("charge").style.display = 'none';
            document.getElementById("charge").style.marginleft = '-3%';
            const  myImage = new Image(400, 400);
            for (var y = 1; y <= v; y = y + 1) {
                myImage.src = 'images/image' + y + '.png';
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
                alert('le modele est chargé avec succès');

        }

        async function pr() {
            var index = [];
                const  myImage = new Image(400, 400);
                for (var y = 1; y <= v; y = y + 1) {
                myImage.src = 'images/image' + y + '.png';
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

    <img id="output_image" src="images\image.png" width='400px' height='400 px' />
    
    <br>
    <p id="res">
        <center>
            <button class="btn btn-info" id='charge' onclick="loadModelMnist()">Charger Modèle</button>
            <a href="#myChart"><button class="btn btn-info" id='charge2' onclick="pr()">Predire</button></a>
            <center>
    </p>

    <div id='idnameofdiv' style="display: none;"></div>


</body>