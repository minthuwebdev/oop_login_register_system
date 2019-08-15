<?php
require_once 'core/init.php';

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') .  '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>
	<p>Hello <a href="profile.php?user=<?= escape($user->data()->username); ?>"><?= escape($user->data()->username); ?></a></p>
	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change Password</a></li>
	</ul>
<?php

if($user->hasPermission('admin')) {
	echo 'Your are Administrator.';
}

} else {
	echo '<p>Your need to <a href="login.php">login</a> in or <a href="register.php">register</a>.</p>';
}