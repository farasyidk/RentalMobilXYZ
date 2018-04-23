<?php
@$eks=$_GET['eks'];
switch ($eks) {
	case 1:
		include "menu/mobil/mobil.php";
		break;
	case 2:
		include "menu/profil/index.php";
		break;
	case 3:
		include "menu/pelanggan/pelanggan.php";
		break;
	case 4:
		include "menu/login/form_login.php";
		break;
	case 5:
		include "menu/login/form_daftar.php";
		break;
	case 6:
		include "menu/usr/transaksi.php";
		break;
	case 7:
		include "menu/usr/dtransaksi.php";
		break;
	case 8:
		include "menu/usr/profil.php";
		break;
	case 9:
		include "menu/mobil/dmobil.php";
		break;
	default:
		include "menu/mobil/mobil.php";
		break;
}
?>