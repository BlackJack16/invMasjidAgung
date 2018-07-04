<?php
include "../../dist/koneksi.php"; 
$id_barang = $_GET['id'];
$barang= mysql_query("SELECT jumlah FROM tb_gudang where id_barang = '$id_barang'");
$hasil = mysql_fetch_array($barang);

?>
<input value="<?php echo $hasil['jumlah']?>" id ="jumlah" type="number" name="jumlah" class="form-control" oninvalid="this.setCustomValidity('Jumlah stok tersedia <?php echo $hasil['jumlah']?>')"  min="1" max="<?php echo $hasil['jumlah']?>">