<h1 class="page-header">
    Data Kendaraan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li><a href="?eks=13">Data Kendaraan</a></li>
    <li class="active">Tambah Data Kendaraan</li>
</ol>
<div class="col-sm-10 col-lg-5" data-effect="slide-left">
<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">No Plat</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" name="plat" id="inputEmail" placeholder="No Plat">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Merk</label>
    	<div class="col-lg-8">
          <select name="merk" class="form-control">
          <?php
          $merk = $db->query("select * from merk");
          while ($merkA = $merk->fetch()) {
          ?>
          <option value="<?php echo $merkA[0]; ?>"><?php echo $merkA[1]; ?></option>
          <?php } ?>
          </select>
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Type</label>
    	<div class="col-lg-8">
          <select name="type" class="form-control">
          <?php
          $type = $db->query("select * from type");
          while ($typeA = $type->fetch()) {
          ?>  
          <option value="<?php echo $typeA[0]; ?>"><?php echo $typeA[1]; ?></option>
          <?php } ?>
          </select>
      </div>
  	</div>
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Pemilik</label>
    	<div class="col-lg-8">
          <select name="pemilik" class="form-control">
          <?php
          $pemilik = $db->query("select * from pemilik");
          while ($pemilikA = $pemilik->fetch()) {
          ?>  
          <option value="<?php echo $pemilikA[0]; ?>"><?php echo $pemilikA[1]; ?></option>
          <?php } ?>
          </select>
      </div>
  	</div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Harga Sewa</label>
      <div class="col-lg-8">
          <input type="text" name="harga" class="form-control" id="inputEmail" placeholder="Harga Sewa">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Foto Mobil</label>
      <div class="col-lg-8">
          <input type="file" name="foto" id="inputEmail" placeholder="Foto Mobil">
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
  $plat = $_POST['plat'];
  $merk = $_POST['merk'];
  $type = md5($_POST['type']);
  $pemilik = $_POST['pemilik'];
  $harga = $_POST['harga'];
  $foto = $_FILES['foto']['name'];
  $folder= './img/';

  if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$foto)){
    $crud = new Crud();
    $insertfild = array('NoPlat' => $plat, 
                       'KdMerk' => $merk, 
                       'IdType' => $type, 
                       'IdPemilik' => $pemilik, 
                       'HargaSewa' => $harga,
                       'FotoMobil' => $foto,
                   );
    $insert = $crud->insert("kendaraan",$insertfild);
    if ($insert) {
      echo "sukses";
    } else {
    	echo "string";
    }
  }
}
?>
<script type="text/javascript">
  function validasi(form) {
     if (form.namaL.value == "") {
    alert('Anda Belum Mengisikan nama Lengkap');
    form.namaL.focus();
    return(false);
  }
    if (form.namaU.value == "") {
    alert('Anda Belum Mengisikan namaL');
    form.namaL.focus();
    return(false);
  }
  if (form.pass.value == "") {
    alert('Anda Belum Mengisikan pass');
    form.pass.focus();
    return(false);
  }
  if (form.alamat.value == "") {
    alert('Anda Belum Mengisikan alamat');
    form.alamat.focus();
    return(false);
  }
  if (form.telepon.value == "") {
    alert('Anda Belum Mengisikan telepon');
    form.telepon.focus();
    return(false);
  }

  return(true);
}
</script>