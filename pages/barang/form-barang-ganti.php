<section class="content-header">
    <h1>Pergantian <small>Barang</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Pergantian Barang</li>
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
								<th>Jumlah</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						<?php
							$tampilPeg=mysql_query("
              SELECT  tb_pergantian_barang.id_pergantian_barang, tb_barang.nama_barang , tb_pergantian_barang.jumlah, tb_pergantian_barang.keterangan, tb_pergantian_barang.status FROM `tb_pergantian_barang` INNER join tb_detail_inventaris on tb_detail_inventaris.id_detail_inventaris = tb_pergantian_barang.id_detail_inventaris inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang
                            ");
						
							while($peg=mysql_fetch_array($tampilPeg)){
						?>	
							<tr>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
              	<td><?php echo $peg['keterangan'];?></td>
								<td><?php echo $peg['status'];?></td>
								<td class="tools">
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=act-barang-ganti-terima&id_pergantian_barang=<?=$peg['id_pergantian_barang'];?>" title="terma"><i class="fa fa-check"></i></a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=act-barang-ganti-ditolak&id_pergantian_barang=<?=$peg['id_pergantian_barang'];?>" title="tolak"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
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