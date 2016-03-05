<?php
	session_destroy();
	unset($_SESSION['userid']);
	echo "Successfully logged out";
?>