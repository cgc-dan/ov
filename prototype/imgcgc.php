<?php
// Print two names on the picture, which accepted by query string parameters.

$n1 = $_GET['n1'];
$n2 = $_GET['n2'];

Header ("Content-type: image/jpeg");
$image = imageCreateFromJPEG("images/wider.jpg");
$color = ImageColorAllocate($image, 255, 255, 255);

// Calculate horizontal alignment for the names.
$BoundingBox1 = imagettfbbox(13, 0, 'ITCKRIST.TTF', $n1);
$boyX = ceil((125 - $BoundingBox1[2]) / 2); // lower left X coordinate for text
$BoundingBox2 = imagettfbbox(13, 0, 'ITCKRIST.TTF', $n2);
$girlX = ceil((107 - $BoundingBox2[2]) / 2); // lower left X coordinate for text

// Write names.
imagettftext($image, 13, 0, $boyX+25, 92, $color, 'ITCKRIST.TTF', $n1);
imagettftext($image, 13, 0, $girlX+310, 92, $color, 'ITCKRIST.TTF', $n2);

// Return output.
ImageJPEG($image, NULL, 93);
ImageDestroy($image);
?>
<img src="imgcgc.php?n1=bebe&n2=jake" />
