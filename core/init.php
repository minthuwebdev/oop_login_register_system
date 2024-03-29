<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '1234',
		'db' => 'lr'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

spl_autoload_register(function ($class) {
	require_once 'classes/' . $class . '.php';
});
// $db = new DB();

require_once 'functions/sanitize.php';
// echo Cookie::exists(Config::get('remember/cookie_name'));
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hasCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hasCheck->count()) {
		$user = new User($hasCheck->first()->user_id);
		$user->login();
	}
}