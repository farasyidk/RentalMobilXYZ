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