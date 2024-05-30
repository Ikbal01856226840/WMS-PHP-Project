

<?php
  $file1=$pdf['offer_file'];
  $file="public/assets/.$file1";
 $f= str_ireplace('.', '', $file);
 echo $f1 = str_ireplace('pdf', '', $f);
echo $t="$f1.pdf";
  header("Content-type: application/pdf");


 @readfile($t);
 ?>


 
