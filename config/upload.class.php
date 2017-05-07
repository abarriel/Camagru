<?php
if($_POST['key'] !== '232323')
    exit();
class uploadsim {
	function localupload($file) {
     $curlSession = curl_init('http://uploads.im/api?upload');
     curl_setopt($curlSession, CURLOPT_POST, true);
     curl_setopt($curlSession,CURLOPT_POSTFIELDS,'fileupload=@'.$file);
     curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
     $jsonData = json_decode(curl_exec($curlSession), true);
     curl_close($curlSession);
     if ($jsonData['status_code'] == '200')
     {
      $status = true;
      $url = $jsonData['data']['img_url'];
      $delete = $jsonData['data']['delete_key'];
      $status_txt = '';
  } 
  elseif ($jsonData['status_code'] == '403')
  {
      $status = '403';
      $url ='';
      $delete = '';
      $status_txt = $jsonData['status_txt'];
  }
  else
  {
      $status = '0';
      $url = '';
      $delete = '';
      $status_txt = 'wrong';
  }
  $finaldata = ["status" => $status, "url" => $url, "delete" => $delete, "status_txt" => $status_txt];
  return $finaldata;
}
}
if ($_POST['upload'] === "yes" && $_POST['ref']){

$file_name_with_full_path = realpath('../data/0.png');
$curl_handle = curl_init("ttp://uploads.im/api?upload");
curl_setopt($curl_handle, CURLOPT_POST | CURLOPT_VERBOSE, 1);
$args['file'] = new CurlFile($file_name_with_full_path, 'image/png');
curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $args); 
  curl_setopt($curl_handle, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
   curl_setopt($curl_handle, CURLOPT_AUTOREFERER, true); 
   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($curl_handle, CURLOPT_VERBOSE, 1);

   curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

//execute the API Call
$returned_data = curl_exec($curl_handle);
curl_close ($curl_handle);

echo $returned_data;



}
else
    echo "te";
?>