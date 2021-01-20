<?php
session_start();
//sleep(5);
header('Content-Type: application/json; charset=utf-8');
if(! isset($_SESSION['chats'])) $_SESSION['chats'] = Array();
echo (json_encode($_SESSION['chats']));
