<?php
require('fpdf.php');
require('../include/crud.php');

$db = new Crud();
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'CV. Rental Mobil XYZ','0','1','C',false);
$pdf->setFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jl. Parangtritis Km 12, Manding, Trirenggo, Bantul','0','1','C',false);
$pdf->setFont('Arial','',8);
$pdf->Cell(0,5,'Code by : Fadqurrosyidik','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Data Mobil Rental XYZ','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(20,6,'No Plat',1,0,'C');
$pdf->Cell(15,6,'Merk',1,0,'C');
$pdf->Cell(40,6,'Type',1,0,'C');
$pdf->Cell(25,6,'Pemilik',1,0,'C');
$pdf->Cell(25,6,'Status Rental',1,0,'C');
$pdf->Cell(25,6,'Harga Sewa',1,0,'C');
$pdf->Cell(25,6,'Jumlah Sewa',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = $db->query("select kendaraan.NoPlat, merk.NmMerk, type.NmType, pemilik.NmPemilik, kendaraan.StatusRental, kendaraan.Hargasewa, kendaraan.JmlSewa from kendaraan,merk,type,pemilik where kendaraan.KdMerk = merk.KdMerk and type.IdType = kendaraan.IdType and kendaraan.IdPemilik = pemilik.IdPemilik");
while ($data = $sql->fetch()) {
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,4,++$no.".",1,0,'C');
	$pdf->Cell(20,4,$data['0'],1,0,'L');
	$pdf->Cell(15,4,$data['1'],1,0,'L');
	$pdf->Cell(40,4,$data['2'],1,0,'L');
	$pdf->Cell(25,4,$data['3'],1,0,'L');
	$pdf->Cell(25,4,$data['4'],1,0,'L');
	$pdf->Cell(25,4,"Rp.".$data['5'],1,0,'L');
	$pdf->Cell(25,4,$data['6'],1,0,'C');
}
$pdf->Output();

/*
class PDF extends FPDF
{
	
	function LoadData($file) {
		$lines = file($file);
		$data = array();
		foreach ($$lines as $line) {
			$data[] = explode(';',trim($line));
		return $data;
		}
	}

	function TampilTabel($header, $data) {
		foreach ($header as $col)
			$this->Ln();

		foreach($data as $row) {
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	$header = array('Country', 'Capital', 'Area', 'POP Yeah');
	$data = $pdf->LoadData('tutorial/countries.txt');
	$pdf->SetFont('Time new Roman', '', '14');
	$pdf->AddPage();
	$pdf->TampilTabel($header, $data);
	$pdf->Output();
}
*/
?>