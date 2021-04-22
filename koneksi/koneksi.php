<?php 
$koneksi = mysqli_connect("localhost","root","","naftex"); 
// cek koneksi 
if (!$koneksi){ 
  die("Error koneksi: " . mysqli_connect_errno()); 
} 
?> 