<?php
	session_start(); 
	$id_user = $_SESSION['id_user'];
	$level = $_SESSION['level'];
	if (!isset($id_user)||!isset($level)) {header("Location:../page/login.php");}
	$sql_n = "SELECT `nama` FROM `user` WHERE `id_user`='$id_user'";
    $query_n = mysqli_query($koneksi, $sql_n);
    while($data_n = mysqli_fetch_row($query_n)){ 
      $nama = $data_n[0]; 
    }
?>