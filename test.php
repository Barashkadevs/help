<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$connection = socket_connect($socket, "shop.hypego.ru", 80);
?>