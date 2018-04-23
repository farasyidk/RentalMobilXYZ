<?php
if (isset($_POST['login'])) {
	
	include "../../include/crud.php";
	require_once "../../include/functions.php";
	 function anti_injection($data){
		$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}

	$nm_user = anti_injection($_POST['nama']);
	$pass = anti_injection (md5($_POST['pass']));
	$ip = $_SERVER['REMOTE_ADDR']; 
	$bs = $_SERVER['HTTP_USER_AGENT'];
	
	$db = new Crud();
	$query = $db->query("select * from pelanggan where nama_user = '$nm_user' and pass = '$pass'");
	$row = $query->rowCount();
	if ($row == 1) {
		session_start();
		$array = $query->fetch();
		$_SESSION['user'] = $nm_user;
		$_SESSION['nama_usr'] = $array['NmPelanggan'];
		$_SESSION['id_usr'] = $array['IdPelanggan'];
		echo "<script>location='../../?eks=1';</script>";
	} else {
		echo "<script>alert('maaf, anda kurang beruntung :D');location='../../?eks=4';</script>";
	}
} else {
	echo "<script>alert('maaf, anda kurang beruntung :p');location='../../?eks=4';</script>";
}
?>