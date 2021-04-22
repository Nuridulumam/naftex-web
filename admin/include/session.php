<?php
	session_start(); 
	$id_user = $_SESSION['id_user'];
	$level = $_SESSION['level'];
	if (!isset($id_user)||!isset($level)) {header("Location:login.php");}
?>