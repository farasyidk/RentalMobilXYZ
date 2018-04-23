<?php
if (isset($_POST['login'])) {
	$nm_user = $_POST['nama'];
	$pass = md5($_POST['pass']);
	
	include "../../include/crud.php";
	$db = new Crud();
	$query = $db->query("select * from karyawan where NmUser = '$nm_user' and pass = '$pass'");
	$row = $query->rowCount();
	if ($row == 1) {
		session_start();
		$array = $query->fetch();
		$_SESSION['kar'] = $nm_user;
		$_SESSION['nama_kar'] = $array['nama'];
		$_SESSION['id_kar'] = $array['NIK'];
		echo "<script>location='../../?eks=1';</script>";
	} else {
		echo "<script>alert('maaf, anda kurang beruntung :D');location='../../?eks=4';</script>";
	}
} else {
	echo "<script>alert('maaf, anda kurang beruntung :p');location='../../?eks=4';</script>";
}
?>