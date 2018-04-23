<?php
if (empty($_SESSION['user'])) {
	echo "<script>location='?eks=4&alert=1';</script>";
}
?>
<section id="inner-headline">
	<div class="container" style="padding: 0">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active"> Detail Mobil</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="col-sm-6 col-lg-6">
    <p class="lead text-muted">Detail Mobil</p>
    <table class="table table-striped" data-effect="fade">
    <?php
    $plat = $_GET['plat'];
    $query = $db->query("select merk.NmMerk, type.NmType, pemilik.NmPemilik, kendaraan.StatusRental, kendaraan.HargaSewa, kendaraan.JmlSewa, kendaraan.FotoMobil, kendaraan.NoPlat from kendaraan,type,merk,pemilik where kendaraan.IdType = type.IdType and kendaraan.KdMerk = merk.KdMerk and kendaraan.IdPemilik = pemilik.IdPemilik and kendaraan.NoPlat = '$plat'");
    $array = $query->fetch();
    ?>
      <tbody>
      	<tr>
          <td>No Plat</td>
          <td><?php echo $array['7'] ?></td>
        </tr>
        <tr>
          <td>Merk</td>
          <td><?php echo $array['0'] ?></td>
        </tr>
        <tr>          
          <td>Type</td>
          <td><?php echo $array['1'] ?></td>
        </tr>
        <tr>
          <td>Pemilik</td>
          <td><?php echo $array['2'] ?></td>
        </tr>
        <tr>
          <td>Status Rental</td>
          <td><?php echo $array['3'] ?></td>
        </tr>
        <tr>
          <td>Harga Sewa</td>
          <td><?php echo $array['4'] ?></td>
        </tr>
        <tr>
          <td>Jumlah Sewa</td>
          <td><?php echo $array['5'] ?></td>
        </tr>
      </tbody>
    </table>          
</div>
<div class="col-lg-6 col-sm-6 ">
    <a href="#" class="thumbnail">
      <img src="img/product/<?php echo $array['6'] ?>" alt="">
    </a>
</div>
<div class="col-lg-12">
	<form method="POST" action="#">
		<a  href="#myModal1" data-toggle="modal"><button <?php if ($array['3'] != 'Kosong') { echo "disabled='disabled'"; }?>  type="submit" class="btn btn-default" name="sewa">Sewa</button></a>
	</form>
</div>


<div class="modal-fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true"></div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
	        <div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	          	<h4 class="modal-title">Form Sewa Mobil</h4>
	        </div>
        	<div class="modal-body">        		
	            <form class="form-horizontal" action="#" method="POST">
	            	<div class="form-group">
	                	<label for="inputEmail" class="col-lg-4 control-label">No Plat</label>
	                	<div class="col-lg-8">
	                  		<input type="text" disabled="disabled" class="form-control" id="inputEmail" placeholder="Nomor Plat" value="<?php echo $plat; ?>">
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
	                  		<input type="text" name="tglpinjam" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker" placeholder="Tanggal Pinjam">
	                	</div>
	              	</div>
	              	<div class="form-group">
	                	<label for="inputEmail" class="col-lg-4 control-label">Jam Pinjam</label>
	                	<div class="col-lg-8">
	                  		<input type="text" name="jampinjam" class="form-control" id="inputEmail" placeholder="Jam Pinjam">
	                	</div>
	              	</div>
	              	<div class="form-group">
	                	<label for="inputPassword" class="col-lg-4 control-label">Tanggal Rencana Kembali</label>
	                	<div class="col-lg-8">
	                  		<input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker" name="tglrenkem" placeholder="Tanggal Rencana Kembali">
	                	</div>
	              	</div>
	              	<div class="form-group">
	                	<label for="inputPassword" class="col-lg-4 control-label">Jam Rencana Kembali</label>
	                	<div class="col-lg-8">
	                  		<input type="text" name="jamrenkem" class="form-control" id="inputPassword" placeholder="Jam Rencana Kembali">
	                	</div>
	              	</div>
	              	<div class="form-group">
	                	<label for="inputPassword" class="col-lg-4 control-label">Total</label>
	                	<div class="col-lg-8">
	                  		<input type="text" disabled="disabled" class="form-control" id="inputPassword" value="0">
	                	</div>
	              	</div>
	              	<div class="form-group">
	                	<div class="col-lg-offset-2 col-lg-10">
	                  		<input type="submit" name="sewa" class="btn btn-default" value="Sewa">
	                	</div>
	              	</div>
	            </form>          
          	</div>
        	<div class="modal-footer"></div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php
if (isset($_POST['sewa'])) {
  $sopir = $_POST['sopir'];
  $pelanggan = $_SESSION['id_usr'];
  $tglpinjam = $_POST['tglpinjam'];
  $jampinjam = $_POST['jampinjam'];
  $tglrenkem = $_POST['tglrenkem'];
  $jamrenkem = $_POST['jamrenkem'];
  $tglpesan = date('Y-m-d');
  $NIK = 1;

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
  $tsopir = $hsopir * $lama;
  $total = $tsopir + ($array['HargaSewa'] * $lama);
  $tambahfild = array('NIK' => $NIK,
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
                     'status' => 'pending'
                 );
  $insert = $crud->insert("transaksi",$tambahfild);
  if ($insert) {
    $mobil = $db->query("select * from kendaraan where NoPlat = '$plat'");
    $arrayM = $mobil->fetch();
    $jmlSewa = $arrayM['JmlSewa'] + 1;
    //$updatefield  = array('StatusRental' => 'dipesan', 'JmlSewa' => $jmlSewa);
    //$where = "where NoPlat = '$plat'";
    $update = $db->query("update kendaraan set StatusRental = 'dipesan', JmlSewa = '$jmlSewa' where NoPlat = '$plat'");
    if ($update) {
      echo "string222";
    } else {
      echo "string222111";
    }
    //header("?eks=2");
  } else {
  	echo "string";
  }
}
?>
<script type="text/javascript">
  function validasi(form) {
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