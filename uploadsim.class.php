<?php


class uploadsim {
	function localupload($file) {
	$curlSession = curl_init('http://uploads.im/api?upload');
    	curl_setopt($curlSession, CURLOPT_POST, true);
    	curl_setopt($curlSession,CURLOPT_POSTFIELDS,array('file' => '@' . $file));
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
	function remoteupload($link) {
	$curlSession = curl_init();
    	curl_setopt($curlSession, CURLOPT_URL, 'http://uploads.im/api?upload='.$link);
    	curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
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
?>