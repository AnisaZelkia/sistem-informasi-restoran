<?php
$dbnm="anisa";
$conn=mysqli_connect("localhost","root","",$dbnm);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	echo '';
}
?>
