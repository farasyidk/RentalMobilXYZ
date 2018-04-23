<h1 class="page-header">
    Data Transaksi
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li><a href="?eks=2">Data Transaksi</a></li>
    <li class="active">Detail Data Transaksi</li>
</ol>
<?php
$db = new crud();
$id = $_GET['id'];
/*
$fild = "*";
$where = "NoTransaksi = '$id'";

$db->select("transaksi",$fild,$where);
$array = $db->getResult(); */
$query = $db->query("SELECT * FROM transaksi where NoTransaksi = '$id'");
$array = $query->fetch();
?>
<div class="form-group col-lg-6">
    <div class="row">
	    <label class="col-lg-5">NIK</label>
	    <span class="col-lg-3"><?php echo $array[0]; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Id Pelanggan</label>
	    <span class="col-lg-3"><?php echo $array['IdPelanggan']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Id Sopir</label>
	    <span class="col-lg-3"><?php echo $array['IdSopir']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">No Plat</label>
	    <span class="col-lg-3"><?php echo $array['NoPlat']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Tanggal Pesan</label>
	    <span class="col-lg-3"><?php echo $array['TglPesan']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Tanggal Pinjam</label>
	    <span class="col-lg-3"><?php echo $array['TglPinjam']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Jam Pinjam</label>
	    <span class="col-lg-3"><?php echo $array['JamPinjam']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Tanggal Kembali Rencana</label>
	    <span class="col-lg-3"><?php echo $array['TglKembaliRencana']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Jam Kembali Rencana</label>
	    <span class="col-lg-3"><?php echo $array['JamKembaliRencana']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Tanggal Kembali Real</label>
	    <span class="col-lg-3"><?php echo $array['TglKembaliReal']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Jam Kembali Real</label>
	    <span class="col-lg-3"><?php echo $array['JamKembaliReal']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Kerusakan</label>
	    <span class="col-lg-3"><?php echo $array['Kerusakan']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Denda</label>
	    <span class="col-lg-3"><?php echo $array['Denda']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Biaya Kerusakan</label>
	    <span class="col-lg-3"><?php echo $array['BiayaKerusakan']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Biaya BBM</label>
	    <span class="col-lg-3"><?php echo $array['BiayaBBM']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Biaya Sopir</label>
	    <span class="col-lg-3"><?php echo $array['BiayaSopir']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Total</label>
	    <span class="col-lg-3"><?php echo $array['Total']; ?></span>
    </div>
    <div class="row">
	    <label class="col-lg-5">Status</label>
	    <span class="col-lg-3"><?php echo $array['status']; ?></span>
    </div>
</div>