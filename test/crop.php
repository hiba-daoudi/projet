<?php
// include composer autoload
require 'vendor/autoload.php';
 
use Intervention\Image\ImageManagerStatic as Image;
 
if(isset($_POST['submit'])) {
     
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
 
        if(!file_exists('images')) {
            mkdir('images', 0755);
        }
 
        $filename = $_FILES['image']['name'];
        $filepath = 'images/'. $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
         
        if(!file_exists('images/crop')) {
            mkdir('images/crop', 0755);
        }
 
        // crop image
        $img = Image::make($filepath);
        $croppath = 'images/crop/'. $filename;
 
        $img->crop($_POST['w'], $_POST['h'], $_POST['x1'], $_POST['y1']);
        $img->save($croppath);
 
        echo "<img src='". $croppath ."'width=\"400px\" />";
    }
}
?>