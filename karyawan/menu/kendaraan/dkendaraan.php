<h1 class="page-header">
    Data Kendaraan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li>
        <i class="fa fa-fw fa-table"></i> <a href="?eks=3"> Data Kendaraan</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Detail Data Kendaraan
    </li>
</ol>
<div class="col-sm-6 col-lg-5">
    <table class="table table-striped" data-effect="fade">
    <?php
    $plat = $_GET['plat'];
    $query = $db->query("select merk.NmMerk, type.NmType, pemilik.NmPemilik, kendaraan.StatusRental, kendaraan.HargaSewa, kendaraan.JmlSewa, kendaraan.FotoMobil from kendaraan,type,merk,pemilik where kendaraan.IdType = type.IdType and kendaraan.KdMerk = merk.KdMerk and kendaraan.IdPemilik = pemilik.IdPemilik and kendaraan.NoPlat = '$plat'");
    $array = $query->fetch();
    ?>
      <tbody>
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
    <?php
    $db = new Crud();
    $query = $db->query("select * from kendaraan where NoPlat = '$plat'");
    $array = $query->fetch();
    if ($array[4] == 'dipesan' or $array[4] == 'jalan') { ?>
      <form method="POST" action="#">
      	<input type="submit" class="btn btn-default" name="back" value="Kembali">
      </form>
    <?php } ?>          
</div>
<div class="col-lg-6 col-sm-6 ">
    <a href="#" class="thumbnail">
      <img src="../img/product/<?php echo $array['6'] ?>" alt="">
    </a>
</div>
<?php
if (isset($_POST['back'])) {
	//$updatefield  = array('StatusRental' => 'Kosong');
    $update = $db->query("update kendaraan set StatusRental = 'Kosong' where NoPlat = '$plat'");
    //print_r($update);
}
?>