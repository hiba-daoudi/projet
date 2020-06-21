<?php
$im = imagecreatefrompng('../images/image.png');


if(isset($_POST['submit'])) {
 
        $im2=imagecrop($im, ['x' =>$_POST['x1'], 'y' =>  $_POST['y1'], 'width' => $_POST['w'], 'height' => $_POST['h']]);
        if ($im2 !== FALSE) {
            imagepng($im2, '../images/image.png');
            imagedestroy($im2);
        }
        imagedestroy($im);
        
        
    }
    header('location:../calc.html');

?>