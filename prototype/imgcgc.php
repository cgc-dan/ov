<?php
header("Content-type:image/jpeg");
$array=array("I am a monument to all your sins", "Currently making pizza","Best before 12/7/09", "Farming Onions");
        function imagettftext_cr(&$im, $size, $angle, $x, $y, $color, $fontfile, $text)
        {
            // retrieve boundingbox
            $bbox = imagettfbbox($size, $angle, $fontfile, $text);
            // calculate deviation
            $dx = ($bbox[2]-$bbox[0])/2.0 - ($bbox[2]-$bbox[4])/2.0;         // deviation left-right
            $dy = ($bbox[3]-$bbox[1])/2.0 + ($bbox[7]-$bbox[1])/2.0;        // deviation top-bottom
            // new pivotpoint
            $px = $x-$dx;
            $py = $y-$dy;
            return imagettftext($im, $size, $angle, $px, $y, $color, $fontfile, $text);
        }
$image = imagecreate(500,90);
$black = imagecolorallocate($image,0,0,0);
$grey_shade = imagecolorallocate($image,40,40,40);
$white = imagecolorallocate($image,255,255,255);


$text = $array[rand(0,sizeof($array)-1)];

// Local font files, relative to script
$otherFont = 'army1.ttf';
$font = 'army.ttf';

if($_GET['name'] == ""){ $name = "Sam152";}else{$name= $_GET['name'];}
$name = substr($name, 0, 25);    


//BG text for Name
while($i<10){
imagettftext_cr($image,rand(2,40),rand(0,50),rand(10,500),rand(0,200),$grey_shade,$font,$name);
$i++;
}
//BG text for saying
while($i<10){
imagettftext_cr($image,rand(0,40),rand(90,180),rand(100,500),rand(200,500),$grey_shade,$otherFont,$text);
$i++;
}

// Main Text
imagettftext_cr($image,35,0,250,46,$white,$font,$name);
imagettftext_cr($image,10,0,250,76,$white,$otherFont,$text);
imagejpeg($image);

?>
