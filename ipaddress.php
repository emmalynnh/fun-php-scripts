<?

//======================================================================
// fun-php-scripts - PHP CLI GET IP ADDRESS
//======================================================================

/*
* Run from shell with the following command:
*
*   php ipaddress.php
*
*/

function getIPInternal(){
	$socket = socket_create(AF_INET, SOCK_DGRAM,  SOL_UDP);
	if ($socket === false) {
		echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
	} else {
	  //echo "OK.\n";
	}
	$connectSocket = socket_connect($socket, '8.8.8.8', 53);
	if ($connectSocket === false) {
		echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
	} else {
	  //echo "OK.\n";
	}
	$getSocketName = socket_getsockname($socket, $address);
	
	print_r("This is probably internal IP: " . $address . PHP_EOL);
	 
	socket_close($socket);
}


function getIPExternal() {
	$cl = curl_init();
	curl_setopt($cl, CURLOPT_URL, "checkip.amazonaws.com");
	curl_setopt($cl, CURLOPT_RETURNTRANSFER, 1);
	
	// Get detailed connection info
	//print_r(curl_getinfo($cl));
	
	
	if(curl_exec($cl) === false)
	{
		echo 'Curl error for external IP: ' . curl_error($cl) . PHP_EOL;
	}
	else
	{
		$externalIP = curl_exec($cl);
		print_r("This is probably external IP: " . $externalIP);
	}
	
	curl_close($cl);
	
}


function getIPExternalExp() {
	// WIP
	$authoritative = array("ns2.google.com");
	
	$getRecord1 = dns_get_record('o-o.myaddr.l.google.com', DNS_TXT, $authoritative, $addRecords);
	print_r("This is probably external IP: " . PHP_EOL);
	print_r($getRecord1);
}

getIPInternal();
getIPExternal();

?>
