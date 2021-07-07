<?php
//Example API: http://localhost/yoloapi.php?key=yourkey&user=username&cookie={cookie}&yoloid={YOLOID}&header={HEADER}&message={MSG}&numberofmessages={NUMBEROFMESSAGES}
$APIKeys = array("3A3IFmilU6QWgom");
$usernames = array("Turlx", "MultiTool");
$msg = $_GET['message'];
$yoloheader = $_GET['header'];
$activekeys = array();
if (!isset($_GET["key"]) ||!isset($_GET["user"]) ||!isset($_GET["yoloid"]))
        die("You are missing a parameter");
$key = $_GET['key'];
$username = $_GET['user'];
$messages = $_GET['numberofmessages'];
$cookies = $_GET['cookie'];

if (!in_array($key, $APIKeys)) die("Invalid API key");
if (!in_array($username, $usernames)) die("Invalid username");
else {
	$x = 1;

	while($x <= $messages) {
		$id = $_GET['yoloid'];
	$url = "http://onyolo.com/$id/message";

		$ch = curl_init($url);
		//The JSON data.
		$jsonData = array("text"=>"$msg","cookie"=>"$cookies","wording"=>"$yoloheader");
		$jsonDataEncoded = json_encode($jsonData);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		$result = curl_exec($ch);
  		$x++;
	} 
}


?>