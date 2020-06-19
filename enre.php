<?php
// include composer autoload
require 'test/vendor/autoload.php';

     
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
 
        if(!file_exists('images')) {
            mkdir('images', 0755);
        }
 
        $filename ='image.png';
        $filepath = 'images/'. $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
         
        
    }
    if (isset($_POST['oui'])) {
        header('location:test/index.html');
    } else if (isset($_POST['non'])) {
        header('location:mnist.php');
    } 
    
?> 