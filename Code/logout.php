<?php
	// to logout, simply visit this page
	session_start();
	session_destroy();

	// in this case, when logging out we redirect them back to the home page. It could be whichever page you want.
	header('Location: index.php');
?>