<?php
// http://localhost/tiktokshare.php?videoid={videoid}&shares={shareamount}
$videoid = $_GET['videoid'];
$shares = $_GET['shares'];



$deviceid = sprintf("%10d", mt_rand(1, mt_getrandmax())).sprintf("%9d", mt_rand(1, mt_getrandmax()));
if (strlen($deviceid) < 20)
    $deviceid = str_pad($deviceid, 19, rand(1, 9), STR_PAD_RIGHT);
else if(strlen($deviceid) > 19)
    $deviceid = substr($deviceid, 1, 19);
	$x = 1;
	while($x <= $shares) {
		$actiontime = "0";
		$url = "https://api16-core-c-useast1a.tiktokv.com/aweme/v1/aweme/stats/?ac=WIFI&op_region=SE&app_skin=white&";
		$ch = curl_init($url);
		$jsonData = array("action_time=$actiontime&item_id=$videoid&item_type=1&share_delta=1&stats_channel=copy");
		$jsonDataEncoded = json_encode($jsonData);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-common-params-v2: version_code=16.6.5&app_name=musical_ly&channel=App%20Store&device_id=$deviceid&aid=1233&os_version=13.5.1&device_platform=iphone&device_type=iPhone10,5")); 
		$result = curl_exec($ch);
		curl_exec($ch);
		if (curl_errno($ch)) {
		    $error_msg = curl_error($ch);
		}
		curl_close($ch);
		
		if (isset($error_msg)) {
		    $x++;
		}
  		$x++;
  	} 

?>