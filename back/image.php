<?php
session_start();
include('../config/account.php');

$data = explode( ',', $_POST['datawebcam']);
$data = base64_decode($data[1]);
$datawebcam = imagecreatefromstring($data);
$path_filter = "../data/".$_POST['filter'].".png";
$filter = imagecreatefrompng($path_filter);
$transparent = imagecreatetruecolor(320, 240);
imagecopy( $transparent , $datawebcam, 0, 0, 0, 0,320, 240);
imagecopy( $transparent , $filter, 0, 0, 0, 0, 320, 240);
imagecopymerge($datawebcam,  $transparent , 0, 0, 0, 0, 320, 240, 100);
ob_start();
imagepng($datawebcam);
$imgData = ob_get_contents();
ob_end_clean();
$base64 = "data:image/png;base64," . base64_encode($imgData);
$_SESSION['saveCollage'] = $base64;
echo $base64;

?>