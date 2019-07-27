<?php
require_once 'core/init.php';

$user = DB::getInstance()->query("SELECT * FROM users WHERE username = ? OR username = ?", array('alex', 'billy'));

if($user->error()) {
	echo 'No users';
}	else {
	echo 'OK';
}