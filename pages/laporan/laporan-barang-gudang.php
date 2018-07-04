<section class="content-header">
    <h1>Laporan<small>Stok Barang</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Stok Barang Digudang</li>
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
								<th>Jumlah</th>
								<th>Bahan</th>
                                <th>Asal Barang</th>
								<th>Tanggal Masuk</th>
                                <th>Harga</th>
								<th>Kondisi</th>
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>

						<?php
							$tampilPeg=mysql_query("SELECT tb_gudang.id_gudang, tb_barang.nama_barang, tb_barang.merk, tb_barang.bahan_barang, tb_barang.asal_barang, tb_barang.tgl_masuk, tb_barang.harga_barang, tb_gudang.jumlah , tb_barang.kondisi FROM `tb_gudang` inner join tb_barang on tb_barang.id_barang = tb_gudang.id_barang ORDER BY `tb_barang`.`tgl_masuk` DESC");
						
							while($peg=mysql_fetch_array($tampilPeg)){
						?>	
							<tr>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['merk'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
                                <td><?php echo $peg['bahan_barang'];?></td>
								<td><?php echo $peg['asal_barang'];?></td>
                                <td><?php echo $peg['tgl_masuk'];?></td>
								<td><?php echo $peg['harga_barang'];?></td>
								<td><?php echo $peg['kondisi'];?></td>
								<!-- <td class="tools">
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=form-edit-barang-gudang&id_gudang=<?=$peg['id_gudang'];?>" title="edit"><i class="fa fa-edit"></i></a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=form-hapus-barang-gudang&id_gudang=<?php echo $peg['id_gudang'];?>" title="delete"><i class="fa fa-trash-o"></i></a></td> -->
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
					<button  name="edit" value="edit" class="btn btn-danger"><a style="color:white" href="pages/laporan/laporan-barang-gudang-pdf.php" class="button">Cetak PDF</a></button>
					
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