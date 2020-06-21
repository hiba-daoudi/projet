<?php
     
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
 
        if(!file_exists('images')) {
            mkdir('images', 0755);
        }
 
        $filename =$_FILES['image']['name'];
        $p = explode(".", $filename); 
        $filepath = 'images/image.'.$p[count($p)-1];
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
        switch ($p[count($p)-1]) {
            case 'png':
            case 'x-png':
                $core = imagecreatefrompng($filepath);
                break;

            case 'jpg':
            case 'jpeg':
            case 'pjpeg':
                $core = imagecreatefromjpeg($filepath);
                if (!$core) {
                    $core= imagecreatefromstring(file_get_contents($filepath));
                }
                break;

            case 'gif':
                $core = imagecreatefromgif($filepath);
                break;

            case 'bmp':
                
                $core = imagecreatefrombmp($filepath);
                break;
            }
            imagepng($core, 'images/image.png');
            imagedestroy($core);
        
    }
    if (isset($_POST['oui'])) {
        header('location:test/index.html');
    } else if (isset($_POST['non'])) {
        header('location:calc.html');
    } 
    
?> 