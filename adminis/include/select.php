<?php
@$eks=$_GET['eks'];
switch ($eks) {
	case 1:
		include "menu/dashbord/home.php";
		break;
	case 2:
		include "menu/karyawan/karyawan.php";
		break;
	case 3:
		include "menu/karyawan/ekaryawan.php";
		break;
	case 4:
		include "menu/pelanggan/pelanggan.php";
		break;
	case 5:
		include "menu/transaksi/transaksi.php";
		break;
	case 6:
		include "menu/transaksi/dtransaksi.php";
		break;
	case 7:
		include "menu/karyawan/tkaryawan.php";
		break;
	case 8:
		include "menu/karyawan/tpemilik.php";
		break;
	case 9:
		include "menu/karyawan/epemilik.php";
		break;
	case 10:
		include "menu/karyawan/tsopir.php";
		break;
	case 11:
		include "menu/karyawan/esopir.php";
		break;
	case 12:
		include "menu/pelanggan/tpelanggan.php";
		break;
	case 13:
		include "menu/kendaraan/kendaraan.php";
		break;
	case 14:
		include "menu/kendaraan/tkendaraan.php";
		break;
	case 15:
		include "menu/grafik/grafik.php";
		break;
	default:
		include "menu/dashbord/home.php";
		break;
}
?>