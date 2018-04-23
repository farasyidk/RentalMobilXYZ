<?php
include "include/crud.php";

$db = new crud();

$tabel = "type";
$fild  = "*"; //menampilkan semua fild
$where = "IdType = 'B_EAT'"; // tampilkan yang nim -> 0612502526

$db->select($tabel,$fild,$where);
$hasil = $db->getResult(); 
//data di tampilkan dalam format json

function JsonToObject($json) {
    $array = json_decode($json);
    foreach($array as $key => $value) {
        $key = strtolower(trim($key));
        
        $object->$key = $value;
    }
    return $object;
}
$object = JsonToObject($hasil);
print_r($object);
$tgl = date('Y-m-d');
echo $tgl;

?>