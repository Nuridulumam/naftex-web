<?php
	session_start(); 
	if (isset($_SESSION['id_user'])) { 
		$id_user = $_SESSION['id_user'];
		$query_n = mysqli_query($koneksi, "SELECT `nama` FROM `user` WHERE `id_user`='$id_user'");
	    while($data_n = mysqli_fetch_row($query_n)){ 
	      $nama = $data_n[0]; 
	    } 
	}
	if (isset($_SESSION['id_admin'])) {
		$id_admin = $_SESSION['id_admin'];
		$query_n = mysqli_query($koneksi, "SELECT `nama` FROM `admin` WHERE `id_admin`='$id_admin'");
	    while($data_n = mysqli_fetch_row($query_n)){ 
	      $nama = $data_n[0]; 
	    }
	}
	$username = $_SESSION['username'];
	$level = $_SESSION['level'];
	if (!isset($id_user)&&!isset($id_admin)) {header("Location:login.php");}
	
?>