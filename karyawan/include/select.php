<?php
@$eks = $_GET['eks'];
switch ($eks) {
	case 1:
		include "menu/dashboard/dashboard.php";
		break;
	case 2:
		include "menu/transaksi/transaksi.php";
		break;
	case 3:
		include "menu/kendaraan/kendaraan.php";
		break;
	case 4:
		include "menu/pelanggan/pelanggan.php";
		break;
	case 5:
		include "menu/transaksi/dtransaksi.php";
		break;
	case 6:
		include "menu/transaksi/etransaksi.php";
		break;
	case 7:
		include "menu/kendaraan/sewamobil.php";
		break;
	case 8:
		include "menu/kendaraan/dkendaraan.php";
		break;
	case 9:
		include "menu/pelanggan/tpelanggan.php";
		break;
	
	default:
		include "menu/dashboard/dashboard.php";
		break;
}
?>