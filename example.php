<?php

require_once dirname(__FILE__) . '/uploadsim.class.php';
$upload = new uploadsim();
$result = $upload->localupload("image.jpg");
if ($result["status"] = true) {
   echo $result['url'];
} else {
   var_dump($result);
}
$result = $upload->remoteupload("http://yoursite.com/image.jpg");
if ($result["status"] = true) {
   echo $result['url'];
} else {
   var_dump($result);
}
?>