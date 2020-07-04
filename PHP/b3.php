<?php
header ("Content-type: image/png");
 $v = $_GET['v'];
for($i = 1; $i <= $v; $i = $i + 1) {
$s = imagecreatefrompng("../images/image".$i.".png");
$largeur = imagesx($s);
$hauteur = imagesy($s);
if ($largeur / 5 > $hauteur / 5){
$m = $largeur / 5;
}else{
    $m = $hauteur / 5;  
}
$d = imagecreate( $largeur + (2 * $m) , $hauteur + (2 * $m));
$largeur_destination = imagesx($d);
 $blanc = imagecolorallocate($d, 255, 255, 255);
 imagecopymerge($d, $s, $m, $m, 0, 0, $largeur, $hauteur, 100);
imagepng($d, "../images/image".$i.".png");
}
header('location:H.php?v='.$v);
?>