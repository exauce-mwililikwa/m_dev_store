<?php
	session_start();
	session_destroy();
	echo"
		<script>window.open('login.php?login','_self')</script>
	";
?>