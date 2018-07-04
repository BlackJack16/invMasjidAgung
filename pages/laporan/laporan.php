

<?php
ob_start();
// memanggil library FPDF
ini_set("session.auto_start", 0);
require_once('fpdf181/fpdf.php');	
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','legal');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 
$pdf->Cell(350,7,'DAFTAR INVENTARIS BARANG',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(350,7,'YAYASAN MASJID AGUNG PALEMBANG',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(450,7,'Ruangan: TATA USAHA',0,1,'C');
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(95,6,'NAMA BARANG',1,0,'C');
$pdf->Cell(27,6,'MEREK',1,0,'C');
$pdf->Cell(27,6,'JUMLAH',1,0,'C');
$pdf->Cell(35,6,'ASAL BARANG',1,0,'C');
$pdf->Cell(27,6,'BAHAN',1,0,'C');
$pdf->Cell(30,6,'HARGA',1,0,'C');
$pdf->Cell(27,6,'TAHUN',1,0,'C');
$pdf->Cell(27,6,'KONDISI',1,0,'C');
$pdf->Cell(27,6,'LOKASI',1,0,'C');
$pdf->Output();

?>



