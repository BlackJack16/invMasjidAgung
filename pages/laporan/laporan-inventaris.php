<section class="content-header">
  <h1>Inventaris<small>Masa Pakai</small></h1>
  <ol class="breadcrumb">
    <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Data Masa Pakai Barang</li>
  </ol>
</section>
<?php
include "dist/koneksi.php";

?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
			<div class="box box-primary">				
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
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
              $idv = $_GET['idv'];
              $tampil=mysql_query("SELECT tb_barang.nama_barang, tb_barang.merk, tb_inventaris.lokasi, tb_detail_inventaris.jumlah, tgl_diterima FROM `tb_detail_inventaris` inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_detail_inventaris.id_inventaris where tb_detail_inventaris.id_inventaris = '$idv'");
              while($peg=mysql_fetch_array($tampil)){
                ?>	
                <tr>
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
          
          <button  name="edit" value="edit" class="btn btn-danger"><a style="color:white" href="pages/laporan/laporan-inventaris-pdf.php?idv=<?=$idv;?>" class="button">Cetak PDF</a></button>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- datepicker -->
<script type="text/javascript" src="plugins/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.form_date').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });
</script>