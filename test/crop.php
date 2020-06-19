<?php
// include composer autoload
require 'vendor/autoload.php';
 
use Intervention\Image\ImageManagerStatic as Image;

 
if(isset($_POST['submit'])) {
 
        if(!file_exists('images')) {
            mkdir('images', 0755);
        }
         
        if(!file_exists('images/crop')) {
            mkdir('images/crop', 0755);
        }
        $filepath='..image\image.png';
        // crop image
        // $img = Image::make($filepath);
        file_put_contents($filepath, file_get_contents($filepath));
 
        $img->crop($_POST['w'], $_POST['h'], $_POST['x1'], $_POST['y1']);
        $img->save($filepath);
 
        echo "<img src='". $filepath ."'width=\"400px\" />";
    }

?>