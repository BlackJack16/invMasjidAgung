<?php
//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='PDF'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
$Open = mysql_connect("localhost","root","");
if (!$Open){
die ("Koneksi ke Engine MySQL Gagal !<br>");
}
$Koneksi = mysql_select_db("db_inventaris");
if (!$Koneksi){
die ("Koneksi ke Database Gagal !");
}
$idv = $_GET['idv'];
$inv=mysql_query("SELECT * from tb_inventaris where  id_inventaris='$idv'");
$hasil=mysql_fetch_array($inv);
$lokasi = $hasil['lokasi'];
?>
<h2 style="text-align: center;">DAFTAR INVENTARIS</h2>
<h2 style="text-align: center">YAYASAN MASJID AGUNG PALEMBANG</h2>
<h3 style="text-align: right">Laporan: <?php echo $lokasi;?></h3>
<!-- <h3 style="text-align: center">Laporan Barang Masuk</h3> -->
 <br>
 <br>
					<table  cellpadding="10" border="1" style="margin: 0px auto;">
						<thead>
						<tr style="background-color:grey">
						<th>No. </th>
            <th>Nama Barang</th>
            <th>Merk atau type</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Tangal Keluar</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>

        <?php    
          $no = 0;
        $tampil=mysql_query("SELECT tb_barang.nama_barang, tb_barang.merk, tb_inventaris.lokasi, tb_detail_inventaris.jumlah, tgl_diterima FROM `tb_detail_inventaris` inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_detail_inventaris.id_inventaris where tb_detail_inventaris.id_inventaris = '$idv'");
          while($peg=mysql_fetch_array($tampil)){
            $no++;
            
        ?>	
          <tr>
							<td><?php echo $no;?></td>
          
            <td><?php echo $peg['nama_barang'];?></td>
            <td><?php echo $peg['merk'];?></td>
            <td><?php echo $peg['lokasi'];?></td>
            <td><?php echo $peg['jumlah'];?></td>
            <td><?php echo $peg['tgl_diterima'];?></td>
            <!-- <td class="tools"><a href="home-admin.php?page=form-lihat-data-pegawai&nip=<?=$peg['nip'];?>" title="view"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=form-edit-data-pegawai&nip=<?=$peg['nip'];?>" title="edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=delete-data-pegawai&nip=<?php echo $peg['nip'];?>" title="delete"><i class="fa fa-trash-o"></i></a></td> -->
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