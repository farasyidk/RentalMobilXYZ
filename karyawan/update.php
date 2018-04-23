<?php
include "include/crud.php";

$db = new crud();

//#update - Contoh 
$tabel = "type";
$isi = "inidia";
$updatefild = array('NmType' => $isi
                 );
$where = "IdType = 'B_EAT'"; 

echo $db->update("type",$updatefild, $where);

?>
