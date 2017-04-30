<?php
session_start();
include('../config/account.php');

$data = explode( ',', $_POST['datawebcam']);
$data = base64_decode($data[1]);
$datawebcam = imagecreatefromstring($data);
$path_filter = "../data/".$_POST['filter'].".png";
$filter = imagecreatefrompng($path_filter);
imagecreatenew($datawebcam , $filter, 0,0,0,0,320, 240, 100);
function imagecreatenew($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct)
{
    $cut = imagecreatetruecolor($src_w, $src_h);
    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);

}
ob_start();
imagepng($datawebcam);
$imgData = ob_get_contents();
ob_end_clean();
$base64 = "data:image/png;base64," . base64_encode($imgData);
$_SESSION['saveCollage'] = $base64;
echo $base64;

?>