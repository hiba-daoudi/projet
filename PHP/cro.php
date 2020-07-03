<?php
$im = imagecreatefrompng('../images/image.png');
$width = imagesx($im);
$height = imagesy($im);
$f = $_GET['var1'];
$p = explode(",", $f);
// echo count($p);
$n = 1;
for($i = 0; $i < count($p); $i = $i + 2) {
    $im2=imagecrop($im, ['x' =>$p[$i], 'y' => '0' , 'width' => $p[$i+1]-$p[$i], 'height' => $height]);
    if ($im2 !== FALSE) {
        imagepng($im2, '../images/image'.$n.'.png');
        imagedestroy($im2);
        $n++;
    }
}
imagedestroy($im);
$n = $n - 1 ;
 header('location:b3.php?v='.$n);
?>