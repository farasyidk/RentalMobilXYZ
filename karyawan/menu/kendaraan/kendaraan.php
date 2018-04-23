<h1 class="page-header">
    Data Kendaraan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Data Kendaraan
    </li>
</ol>
<p class="lead text-muted">With Captions</p>
<!-- Thumbnails container -->
<div class="row">
<?php
$query = $db->query('select kendaraan.StatusRental as stts, type.NmType as nama, kendaraan.FotoMobil as foto, kendaraan.NoPlat as plat from kendaraan,type where kendaraan.IdType = type.IdType');
while ($array = $query->fetch()) {
?>
  <div class="col-lg-3">
    <div class="">
      <img src="../img/product/<?php echo $array[2]; ?>" width="265px" height="183px" alt="">
      <div class="caption" align="center">
        <h3><?php echo substr($array[1],0,10); ?></h3>
            <a class="hover-wrap fancybox" data-fancybox-group="gallery" href="?eks=8&plat=<?php echo $array[3]; ?>"><button type="button" class="btn btn-lg btn-info">Detail</button></a>
            <?php
            $disable = "";
            if ($array[0] == 'dipesan' or $array[0] == 'jalan') {
              $disable = "disabled = disabled";
            }
            ?>
            <a href="?eks=7&plat=<?php echo $array[3]; ?>"><button type="button" <?php echo $disable; ?> class="btn btn-lg btn-Primary">Sewa</button></a>
            <p><?php echo $array[0]; ?></p>
          
    
      </div>
    </div>
  </div>
  <?php } ?>
</div>
