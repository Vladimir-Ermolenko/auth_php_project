<?php

//height and width of the captcha image
$width = 300;
$height = 150;

//amount of background noise to add in captcha image
$noise_level = 150;

//generate the random string
$random_str = md5(rand(0,999));
//We don't need a 32 character long string so we trim it down to 5
$security_code = substr($random_str, 15, 5);

//save it in SESSION for further form validation
session_start();
$_SESSION["captcha_code"] = $security_code;

//create the image resource
$im = imagecreatetruecolor($width, $height);
$bg = imagecolorallocate($im, rand(0, 240), rand(0, 240), rand(0, 240)); //background color
$fg = imagecolorallocate($im, 255, 255, 255);//text color
$ns = imagecolorallocate($im, 200, 200, 200);//noise color

//fill the image resource with the bg color
imagefill($im, 0, 0, $bg);

$fontfile = "JuliusSansOne-Regular.ttf";

imagettftext($im , 70 , rand(-5, 5) , 10 , 90 , $fg, $fontfile, $security_code);


// Add some noise to the image.
for ($i = 0; $i < $noise_level; $i++) {
    for ($j = 0; $j < $noise_level; $j++) {
        imagesetpixel(
            $im,
            rand(0, $width),
            rand(0, $height),//make sure the pixels are random and don't overflow out of the image
            $ns
        );
    }
}

//tell the browser that this is an image
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');

//generate the png image
imagepng($im);

//destroy the image
imagedestroy($im);
?>