<?php
     
    if(isset($_FILES['input-file-preview']['name']) && !empty($_FILES['input-file-preview']['name'])) {
 
        if(!file_exists('../images')) {
            mkdir('../images', 0755);
        }
 
        $filename =$_FILES['input-file-preview']['name'];
        $p = explode(".", $filename); 
<<<<<<< HEAD:enre.php
        $filepath = 'images/image.'.$p[count($p)-1];
=======
        $filepath = '../images/image.'.$p[count($p)-1];
>>>>>>> 39bc7636b7b446e50285b729f815fdeaeacbd003:PHP/enre.php
        move_uploaded_file($_FILES['input-file-preview']['tmp_name'], $filepath);
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
            imagepng($core, '../images/image.png');
            imagedestroy($core);
        
    if (isset($_POST['oui'])) {
        header('location:../crop/index.html');
    } else if (isset($_POST['non'])) {
        header('location:../acceuil/calc.html');
    } 

}
?> 