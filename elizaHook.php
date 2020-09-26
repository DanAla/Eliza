<?php
	require_once('src/Eliza.php');

	error_reporting(E_ALL | E_STRICT);

	$e = new \Crell\Eliza\Eliza();


	$path = "https://api.telegram.org/bot918067819:AAFatCqT2AJOeW_u46KwM6qEY5B6CwsOUWg";
	$inputjson = file_get_contents("php://input");
	$update = json_decode($inputjson, TRUE);
	$chatId = $update["message"]["chat"]["id"];
	$message = $update["message"]["text"];
	if (strpos($message, "/start") === 0) {
		$elizaSays = "Hello, I am Eliza. How are you today?";
	}else{
		$elizaSays = $e->analyze($message);
	}
	file_get_contents($path."/sendmessage?chat_id=" . $chatId . "\&text=" . urlencode($elizaSays));
?>
