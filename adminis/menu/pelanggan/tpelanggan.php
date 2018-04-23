<h1 class="page-header">
    Data Pelanggan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li><a href="?eks=4">Data Pelanggan</a></li>
    <li class="active">Tambah Data Pelanggan</li>
</ol>
<div class="col-sm-10 col-lg-5" data-effect="slide-left">
<form class="form-horizontal" action="#" method="POST" id="load_content" onsubmit="return validasi(this)">
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Nama Lengkap</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" name="namaL" id="inputEmail" placeholder="Nama Lengkap">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Nama User</label>
    	<div class="col-lg-8">
      		<input type="text" class="form-control" name="namaU" id="inputEmail" placeholder="Nama User" >
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Password</label>
    	<div class="col-lg-8">
      		<input type="password" name="pass" class="form-control" id="inputEmail" placeholder="Password">
    	</div>
  	</div>
	<div class="form-group">
    	<label for="inputEmail" class="col-lg-4 control-label">Alamat</label>
    	<div class="col-lg-8">
      		<input type="text" name="alamat" class="form-control" id="inputEmail" placeholder="Alamat">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword" class="col-lg-4 control-label">Telepon</label>
    	<div class="col-lg-8">
      		<input type="text" name="telepon" class="form-control" id="inputEmail" placeholder="Telepon">
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
  $namaL = $_POST['namaL'];
  $namaU = $_POST['namaU'];
  $pass = md5($_POST['pass']);
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];

  $crud = new Crud();
  $insertfild = array('NmPelanggan' => $namaL, 
                     'nama_user' => $namaU, 
                     'pass' => $pass, 
                     'alamat' => $alamat, 
                     'telepon' => $telepon
                 );
  $insert = $crud->insert("pelanggan",$insertfild);
  if ($insert) {
    echo "sukses";
  } else {
  	echo "string";
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