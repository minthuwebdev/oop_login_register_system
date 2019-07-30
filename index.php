<?php
require_once 'core/init.php';

$user = DB::getInstance()->update('users',6, array(
	'username' => 'MT',
	'password' => 'new-password',
	'name' => 'New Dale'

));