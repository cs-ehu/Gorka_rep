<?php
	session_start();
	session_destroy();
	echo("<script>alert('Vuelve cuando quieras')</script>");
    echo("<script>window.location = '../login.php';</script>");
?>