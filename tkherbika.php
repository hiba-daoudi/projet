<?php
// include composer autoload
require 'test/vendor/autoload.php';
 
$fileName = $_GET['var1'];

echo $fileName;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>tkhebika</title>
    <script> 
    jQuery(function($) {
 
 var p = $("#previewimage");
 $("body").on("change", "#image", function(){

     var imageReader = new FileReader();
     imageReader.readAsDataURL(<?php $fileName ?>);
     console.log( imageReader);
     imageReader.onload = function (oFREvent) {
         p.attr('src', oFREvent.target.result).fadeIn();
     };
 });
});
 </script>
</head>
<body>
<input type="button" id="image" value="hiba" >
<p><img id="previewimage" style="display:none;" width="400px" /></p>
</body>
</html>