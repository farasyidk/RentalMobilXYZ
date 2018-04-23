<?php
if (isset($_POST['daftar'])) {
	$nama = $_POST['nama'];
	$nm_user = $_POST['nama_user'];
	$pass = md5($_POST['password']);
	$almt = $_POST['alamat'];
	$NoTelp = $_POST['NoTelp'];

	include "../../include/crud.php";
	$db = new Crud();
	$query_nm = $db->query("select * from pelanggan where nama_user = '$nm_user'");
	$row = $query_nm->rowCount();
	if ($row >= 1) {
		echo "<script>alert('maaf, username sudah ada :D');location='../../?eks=5';</script>";
	} else {
		$query = $db->query("insert into pelanggan values ('','$nama','$nm_user','$pass','$almt','$NoTelp')");
		if ($query) {
			echo "<script>location='../../?eks=4&well=1';</script>";
			//header('../../pelanggan/?eks=1&well=1');
		} else {
			echo "<script>alert('maaf, anda kurang beruntung');location='../../?eks=5';</script>";
		}
	}
} else {
	echo "<script>alert('maaf, anda kurang beruntung :p');location='../../?eks=5';</script>";
}
?>