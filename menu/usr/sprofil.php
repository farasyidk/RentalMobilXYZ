<?php
session_start();
include "../../include/crud.php";
$db = new Crud();
if (isset($_POST['update'])) {
	$nmL = $_POST['namaL'];
	$nmU = $_POST['namaUsr'];
	$passS = $_POST['passS'];
	$passL = md5($_POST['passL']);
	$passB = md5($_POST['passB']);
	$alamat = $_POST['alamat'];
	$nomor = $_POST['nomor'];
	$id = $_SESSION['id_usr'];

	if ($_POST['passB'] == "" and $_POST['passL'] == "") {
		$pass = $passS;
	} else {
		$queryC = $db->query("select * from pelanggan where IdPelanggan = '$id' and pass = '$passL'");
		$row = $queryC->rowCount();
		if ($row == 1) {
			$pass = $passB;
		} else {
			$pass = $passS;
			echo "<script>alert('Password Lama Anda Salah');location='../../?eks=8';</script>";
		}
	}
	$query = $db->query("update pelanggan set NmPelanggan = '$nmL', nama_user = '$nmU', pass = '$pass', alamat = '$alamat', telepon = '$nomor' where IdPelanggan = '$id'");
	if ($query) {
		echo "<script>location='../../?eks=8';</script>";
	} else{
		echo "<script>alert('Gagal');location='../../?eks=8';</script>";
	}
} else {
	echo "stringup";
}
?>