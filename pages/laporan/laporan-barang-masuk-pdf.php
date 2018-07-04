
<?php
//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='PDF'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
 
?>
<h2 style="text-align: center;">DAFTAR INVENTARIS</h2>
<h2 style="text-align: center">YAYASAN MASJID AGUNG PALEMBANG</h2>
<h3 style="text-align: right">Laporan:	 Barang Masuk</h3>
<!-- <h3 style="text-align: center">Laporan Barang Masuk</h3> -->
 <br>
 <br>
					<table  cellpadding="10" border="1" style="margin: 0px auto;">

							<tr style="background-color:grey">
								<th>No. </th>
                <th>Tanggal Masuk</th>
								<th>Nama Barang</th>
								<th>Merk atau type</th>
								<th>Jumlah</th>
								<th>Bahan</th>
                <th>Asal Barang</th>
                <th>Harga</th>
								<th>Kondisi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$Open = mysql_connect("localhost","root","");
							if (!$Open){
							die ("Koneksi ke Engine MySQL Gagal !<br>");
							}
						$Koneksi = mysql_select_db("db_inventaris");
							if (!$Koneksi){
							die ("Koneksi ke Database Gagal !");
							}
							$tampilBrg= mysql_query("SELECT * FROM tb_barang ");
							$no = 0;
							while($peg=mysql_fetch_assoc($tampilBrg)){
								$no++;
						?>	
							<tr>
								<td><?php echo $no;?></td>
              	<td><?php echo $peg['tgl_masuk'];?></td>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['merk'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
                <td><?php echo $peg['bahan_barang'];?></td>
								<td><?php echo $peg['asal_barang'];?></td>
								<td><?php echo $peg['harga_barang'];?></td>
								<td><?php echo $peg['kondisi'];?></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>

 <?php
 //penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
	
 $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
 ob_end_clean();
 //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output($nama_dokumen.".pdf" ,'I');
 exit;