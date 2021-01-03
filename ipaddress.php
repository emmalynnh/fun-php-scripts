<?

function getExternalIP(){
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
	 //var_dump($getSocketName);
	 print_r("This is either internal or external IP: " . $address . PHP_EOL);
	 
	 socket_close($socket);
}

getExternalIP();

?>
