<h1 class="page-header">
    Edit Data Sopir
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li><a href="?eks=2"> Data Karyawan</a></li>
    <li class="active">Edit Data Sopir</li>
</ol>
<?php

$id = $_GET['id'];
$query = $db->query("select * from sopir where IdSopir = '$id'");
$array = $query->fetch();
?>
<form action="#" method="POST">
<div class="col-lg-5">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input class="form-control" name="namaL" placeholder="Enter text" value="<?php echo $array[1]; ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" name="alamat" placeholder="Enter text" value="<?php echo $array[2]; ?>">
    </div>
    <div class="form-group">
        <label>No Telepon</label>
        <input class="form-control" name="telepon" placeholder="Enter text" value="<?php echo $array[3]; ?>">
    </div>
    <div class="form-group">
        <label>No Sim</label>
        <input class="form-control" name="sim" placeholder="Enter text" value="<?php echo $array[4]; ?>">
    </div>
    <div class="form-group">
        <label>Tarif Perhari</label>
        <input class="form-control" name="tarif" placeholder="Enter text" value="<?php echo $array[5]; ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-default" name="simpan" type="submit" value="simpan"></input>
    </div>

</div>
</form>
<?php
if (isset($_POST['simpan'])) {
  $namaL = $_POST['namaL'];
  $sim = $_POST['sim'];
  $tarif = $_POST['tarif'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $alert = "";
  if (empty($passL) and empty($passB)) {
    $passw = $array[3];
  } else {
    if ($passL == $array[3]) {
        $passw = $passB;
    } else {
        $alert = "<script>alert('Password Lama Salah !');</script>";
        
        $passw = $array[3];
    }
  }
//echo $alert;
/*  $updatetfild = array('NmPemilik' => $namaL, 
                     'alamat' => $alamat, 
                     'telpon' => $telepon
                 ); 
  $where = "where IdPemilik = '$id'";
  $update = $db->update("pemilik", $updatetfild, $where); */
  $update = $db->query("update sopir set NmSopir = '$namaL', alamat = '$alamat', telepon = '$telepon', NoSim = '$sim', TarifPerhari = '$tarif' where IdSopir = '$id'");
  if ($update) {
    echo "sukses";
  } else {
    echo "string";
    print_r($array[3]);

  }
}
?>
<script type="text/javascript">
  function validasi(form) {
     if (form.namaL.value == "") {
    alert('Anda Belum Mengisikan Nama Lengkap');
    form.namaL.focus();
    return(false);
  }
    if (form.namaU.value == "") {
    alert('Anda Belum Mengisikan Nama User');
    form.namaU.focus();
    return(false);
  }
  if (form.passL.value != "") {
    if (form.passB.value == "") {
    alert('Anda Belum Mengisikan Password Baru');
    form.passB.focus();
    return(false);
    }
  }  
  if (form.alamat.value == "") {
    alert('Anda Belum Mengisikan Alamat');
    form.alamat.focus();
    return(false);
  }
  if (form.telepon.value == "") {
    alert('Anda Belum Mengisikan No Telepon');
    form.telepon.focus();
    return(false);
  }

  return(true);
}
</script>