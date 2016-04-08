<?php
   header('Content-Type: image/jpeg');
   include('SimpleImage.php');
   $t=$_GET["name"]; 
   $image = new SimpleImage();
   $image->load('upload/gameface.JPG');

echo "$t";

#if ($image_height>$image_width) {
#        $image->resizeToHeight(100);
#        }
#else {
#        $image->resizeToWidth(100);
#        }

#   $image->output();
?>
