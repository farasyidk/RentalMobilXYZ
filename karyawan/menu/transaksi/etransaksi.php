<h1 class="page-header">
    Data Transaksi
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li><a href="?eks=2">Data Transaksi</a></li>
    <li class="active">Edit Data Transaksi</li>
</ol>
<div class="col-sm-10 col-lg-7" data-effect="slide-left">
<?php
$id = $_GET['id'];
$query = $db->query("select * from transaksi where NoTransaksi = '$id'");
$array = $query->fetch();
$sopir = $db->query("select sopir.TarifPerhari from sopir,transaksi where transaksi.NoTransaksi = '$id' and sopir.IdSopir = transaksi.IdSopir");
$arrayS = $sopir->fetch();

?>
<form class="form-horizontal" action="#" method="POST" id="load_content">
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">NIK</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" class="form-control" id="inputEmail" placeholder="Nomor Induk Karyawan" value="<?php echo $array['0']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Id Pelanggan</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" class="form-control" id="inputEmail" placeholder="Id Pelanggan" value="<?php echo $array['1']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Pakai Sopir</label>
    	<div class="col-lg-8">
      		<input type="radio" id="optionsRadios1" value="Ya" name="sopir" checked="">Ya
      		<input type="radio" id="optionsRadios2" value="tidak" name="sopir">Tidak
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Id Sopir</label>
    	<div class="col-lg-8">
      		<input type="text" name="IdSopir" class="form-control" id="inputEmail" placeholder="Id Sopir" value="<?php echo $array['IdSopir']; ?>">
    	</div>
  	</div>
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">No Plat</label>
    	<div class="col-lg-8">
      		<input type="text" name="plat" class="form-control" id="inputEmail" placeholder="Nomor Plat" value="<?php echo $array['3']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Pesan</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" class="form-control datepicker"  data-date-format="yyyy-mm-dd" placeholder="Tanggal Pesan" value="<?php echo $array['4']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Pinjam</label>
    	<div class="col-lg-8">
      		<input type="text" name="tglpinjam" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker" placeholder="Tanggal Pinjam" value="<?php echo $array['5']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Jam Pinjam</label>
    	<div class="col-lg-8">
      		<input type="text" name="jampinjam" class="form-control" id="inputEmail" placeholder="Jam Pinjam" value="<?php echo $array['6']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Rencana Kembali</label>
    	<div class="col-lg-8">
      		<input type="text" name="tglrenkem" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker2" placeholder="Tanggal Rencana Kembali" value="<?php echo $array['7']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Jam Rencana Kembali</label>
    	<div class="col-lg-8">
      		<input type="text" name="jamrenkem" class="form-control" id="inputPassword" placeholder="Jam Rencana Kembali" value="<?php echo $array['8']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Kembali Real</label>
    	<div class="col-lg-8">
      		<input type="text" name="tglkemreal" class="form-control datepicker"  data-date-format="yyyy-mm-dd" placeholder="Tanggal Kembali Real" value="<?php echo $array['9']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Jam Kembali Real</label>
    	<div class="col-lg-8">
      		<input type="text" name="jamkemreal" class="form-control" id="inputPassword" placeholder="Jam Kembali Real" value="<?php echo $array['10']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Kerusakan</label>
    	<div class="col-lg-8">
      		<input type="text" name="rusak" class="form-control"  placeholder="Kerusakan" value="<?php echo $array['11']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Denda</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" name="denda" id="hasil" class="form-control" placeholder="Denda" value="<?php echo $array['12']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Biaya Kerusakan</label>
    	<div class="col-lg-8">
      		<input type="text" name="brusak" class="form-control" placeholder="Biaya Kerusakan" value="<?php echo $array['13']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Biaya BBM</label>
    	<div class="col-lg-8">
      		<input type="text" name="bbbm" class="form-control" value="<?php echo $array['14']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Biaya Sopir</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" name="Bsopir" class="form-control" id="inputPassword" placeholder="Jam Rencana Kembali" value="<?php echo $arrayS['0']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Total</label>
    	<div class="col-lg-8">
      		<input type="text" name="total" disabled="disabled" class="form-control" id="inputPassword" value="<?php echo $array['Total']; ?>" value="17">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Status</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" id="inputPassword" placeholder="Status" name="status" value="<?php echo $array['18']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<div class="col-lg-offset-4 col-lg-8">
      		<a href=""><button type="submit" class="btn btn-default" name="simpan">Simpan</button></a>
    	</div>
  	</div>
</form>
</div>
<?php
if (isset($_POST['simpan'])) {
  $IdSopir = $_POST['IdSopir'];
  $plat = $_POST['plat'];
  $tglpinjam = $_POST['tglpinjam'];
  $jampinjam = $_POST['jampinjam'];
  $tglrenkem = $_POST['tglrenkem'];
  $jamrenkem = $_POST['jamrenkem'];
  $tglkemreal = $_POST['tglkemreal'];
  $jamkemreal = $_POST['jamkemreal'];
  $rusak = $_POST['rusak'];
  $brusak = $_POST['brusak'];
  $bbbm = $_POST['bbbm'];
  $Bsopir = $arrayS['0'];
  $status = $_POST['status'];

  function hitungHari($awal,$akhir){
       $tglAwal = strtotime($awal);
       $tglAkhir = strtotime($akhir);
       $jeda = abs($tglAkhir - $tglAwal);
       return floor($jeda/(60*60*24));
     }
  $lama = hitungHari($tglpinjam,$tglrenkem);
  $lebih = hitungHari($tglrenkem,$tglkemreal);
  if ($lebih >= 1) {
  	$denda = $lebih * 10000;
  } else {
  	$denda = 0;
  }
  $crud = new Crud();
  $total = $denda + $brusak + $bbbm + ($Bsopir * $lama); 
  $updatefild = array('NoPlat' => $plat, 
                     'TglPinjam' => $tglpinjam, 
                     'JamPinjam' => $jampinjam, 
                     'TglKembaliRencana' => $tglrenkem, 
                     'JamKembaliRencana' => $jamrenkem, 
                     'TglKembaliReal' => $tglkemreal, 
                     'JamKembaliReal' => $jamkemreal, 
                     'Kerusakan' => $rusak,
                     'Denda' => $denda,
                     'BiayaKerusakan' => $brusak,
                     'BiayaBBM' => $bbbm,
                     'IdSopir' => $IdSopir,
                     'BiayaSopir' => $Bsopir,
                     'Total' => $total,
                     'status' => $status
                 );
  $where = "NoTransaksi = '$id'"; 
  $update = $crud->update("transaksi",$updatefild, $where);
  if ($update) {
    echo "sukses"." ".$lama." ".$bbbm;
  } else {
  	echo "string";
    echo $where;
    print_r($update);
    print_r($updatefild);
  }
}
?>