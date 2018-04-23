<?php
if (isset($_POST['login'])) {
	$nm_user = $_POST['nama'];
	$pass = md5($_POST['pass']);
	
	include "../../include/crud.php";
	$db = new Crud();
	$query = $db->query("select * from admin where nama_usr = '$nm_user' and pass = '$pass'");
	$row = $query->rowCount();
	if ($row == 1) {
		session_start();
		$array = $query->fetch();
		$_SESSION['adm'] = $nm_user;
		$_SESSION['nama_adm'] = $array['nama'];
		$_SESSION['id_adm'] = $array['id'];
		echo "<script>location='../../?eks=1';</script>";
	} else {
		echo "<script>alert('maaf, anda kurang beruntung :D');location='../../?eks=4';</script>";
	}
} else {
	//echo "<script>alert('maaf, anda kurang beruntung :p');location='../../?eks=4';</script>";
}
?>