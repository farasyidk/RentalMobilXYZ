<section id="inner-headline">
    <div class="container" style="padding: 0">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active"><a href="?eks=6">Transaksi</a><i class="icon-angle-right"></i></li>
                    <li class="active">Detail Transaksi</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$id = $_GET['id'];
$queryT = $db->query("select * from transaksi where NoTransaksi = '$id'");
$array = $queryT->fetch();
?>
<form action="#" method="POST" class="form-search">
    <table cellpadding="0" cellspacing="0"  id="id-form">
            <tr>
              <th align="left">Kode Karyawan</th>
              <td><input class="form-control" type="text" disabled="disabled" disabled="disabled" value="<?php echo $array['NIK']; ?>" name="nama_siswa" /></td>
            </tr>
             <tr>
              <th align="left">No Plat Kendaraan</th>
              <td><input class="form-control" type="text" disabled="disabled" value="<?php echo $array['NoPlat']; ?>"  name="nis" /></td>
            </tr>
            <tr>
              <th align="left">Tanggal Kembali Rencana</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['TglKembaliRencana']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Tanggal Kembali Real</th>
              <td><input class="form-control" type="text" disabled="disabled" value="<?php echo $array['TglKembaliReal']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Jam Kembali Rencana</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['JamKembaliRencana']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Jam Kembali Real</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['JamKembaliReal']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Denda</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['Denda']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Biaya Kerusakan</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['BiayaKerusakan']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Biaya BBM</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['BiayaBBM']; ?>"  name="nilai" /></td>
            </tr>
              <th align="left">Biaya Sopir</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['BiayaSopir']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Total</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['Total']; ?>"  name="nilai" /></td>
            </tr>
            <tr>
              <th align="left">Status</th>
              <td><input class="form-control" type="text" disabled="disabled"  value="<?php echo $array['status']; ?>"  name="nilai" /></td>
            </tr>
    </table>
</form>