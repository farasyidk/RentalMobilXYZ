<div class="col-sm-10 col-lg-7" data-effect="slide-left">
<?php
$plat = $_GET['plat'];
$query = $db->query("select * from kendaraan where NoPlat = '$plat'");
$array = $query->fetch();
?>
<form class="form-horizontal" action="#" method="POST" onsubmit="return validasi(this)">
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">No Plat</label>
    	<div class="col-lg-8">
      		<input type="text" disabled="disabled" class="form-control" id="inputEmail" value="<?php echo $array['0']; ?>" placeholder="Nomor Plat">
    	</div>
  	</div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">IdPelanggan</label>
      <div class="col-lg-8">
          <input type="text" name="pelanggan" class="form-control" id="inputEmail" placeholder="Id Pelanggan">
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
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Pinjam</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control datepicker" name="tglpinjam" data-date-format="yyyy-mm-dd" id="datepicker" placeholder="Tanggal Pinjam">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Jam Pinjam</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" name="jampinjam" id="inputEmail" placeholder="Jam Pinjam">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Rencana Kembali</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control datepicker" name="tglrenkem" data-date-format="yyyy-mm-dd" id="datepicker" placeholder="Tanggal Rencana Kembali">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Jam Rencana Kembali</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" id="inputPassword" name="jamrenkem" placeholder="Jam Rencana Kembali">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Total</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" id="inputPassword" value="0">
    	</div>
  	</div>
  	<div class="form-group">
    	<div class="col-lg-offset-2 col-lg-10">
      		<a href=""><button type="submit" class="btn btn-default" name="sewa">Sewa</button></a>
    	</div>
  	</div>
</form>
</div>
<?php
if (isset($_POST['sewa'])) {
  $sopir = $_POST['sopir'];
  $pelanggan = $_POST['pelanggan'];
  $tglpinjam = $_POST['tglpinjam'];
  $jampinjam = $_POST['jampinjam'];
  $tglrenkem = $_POST['tglrenkem'];
  $jamrenkem = $_POST['jamrenkem'];
  $tglpesan = date('Y-m-d');
  $NIK = $_SESSION['id_kar'];

  function hitungHari($awal,$akhir){
       $tglAwal = strtotime($awal);
       $tglAkhir = strtotime($akhir);
       $jeda = abs($tglAkhir - $tglAwal);
       return floor($jeda/(60*60*24));
     }
  $hsopir = 0;
  $ssopir = "";
  if ($sopir == "Ya") {
    $hsopir = 20000;
    $ssopir = "'IdSopir' => '1'";
  } 
$crud = new Crud();
  $lama = hitungHari($tglpinjam,$tglrenkem);
  $total = ($hsopir * $lama) + ($array['HargaSewa'] * $lama);
  $tambahfild = array('NIK' => '$NIK',
                      'IdPelanggan' => $pelanggan,
                      'NoPlat' => $plat,
                      'TglPesan' => $tglpesan, 
                     'TglPinjam' => $tglpinjam, 
                     'JamPinjam' => $jampinjam, 
                     'TglKembaliRencana' => $tglrenkem, 
                     'JamKembaliRencana' => $jamrenkem,
                     'IdSopir' => '1',
                     'BiayaSopir' => $hsopir,
                     'Total' => $total,
                     'status' => 'real'
                 );
  $insert = $crud->insert("transaksi",$tambahfild);
  if ($insert) {
    $mobil = $db->query("select * from kendaraan where NoPlat = '$plat'");
    $arrayM = $mobil->fetch();
    $jmlSewa = $arrayM['JmlSewa'] + 1;
    $updatefield  = array('StatusRental' => 'dipesan', 'JmlSewa' => $jmlSewa);
    $where = "where NoPlat = '$plat'";
    $update = $db->query("update kendaraan set StatusRental = 'dipesan', JmlSewa = '$jmlSewa' where NoPlat = '$plat'");
    if ($update) {
      echo "string222";
    } else {
      echo "string222111";
    }
    //header("?eks=2");
  } else {
  	echo "string";
    print_r($update);
  }
}
?>
<script type="text/javascript">
  function validasi(form) {
     if (form.pelanggan.value == "") {
    alert('Anda Belum Mengisikan Id Pelanggan');
    form.pelanggan.focus();
    return(false);
  }
    if (form.tglpinjam.value == "") {
    alert('Anda Belum Mengisikan Tanggal Pinjam');
    form.tglpinjam.focus();
    return(false);
  }
  if (form.jampinjam.value == "") {
    alert('Anda Belum Mengisikan Jam Pinjam');
    form.jampinjam.focus();
    return(false);
  }
  if (form.tglrenkem.value == "") {
    alert('Anda Belum Mengisikan Tanggal Rencana Kembali');
    form.tglrenkem.focus();
    return(false);
  }
  if (form.jamrenkem.value == "") {
    alert('Anda Belum Mengisikan Jam Rencana Kembali');
    form.jamrenkem.focus();
    return(false);
  }

  return(true);
}
</script>