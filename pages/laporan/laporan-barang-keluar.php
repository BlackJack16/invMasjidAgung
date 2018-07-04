<?php
            include "dist/koneksi.php"; 
?>     
<section class="content-header">
    <h1>Laporan<small>Barang Keluar</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Barang Keluar</li>
    </ol>
</section>

<section class="content">
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
            $tampil=mysql_query("SELECT tb_detail_inventaris.id_detail_inventaris, tb_barang.nama_barang, tb_barang.merk, tb_inventaris.lokasi, tb_detail_inventaris.jumlah, tgl_diterima FROM `tb_detail_inventaris` inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_detail_inventaris.id_inventaris ");
							while($peg=mysql_fetch_array($tampil)){
						?>	
							<tr>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['merk'];?></td>
								<td><?php echo $peg['lokasi'];?></td>
                <td><?php echo $peg['jumlah'];?></td>
								<td><?php echo $peg['tgl_diterima'];?></td>
								<!-- <td class="tools">
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=form-edit-barang-keluar&id_detail_inventaris=<?=$peg['id_detail_inventaris'];?>" title="edit"><i class="fa fa-edit"></i></a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=act-hapus-barang-keluar&id_detail_inventaris=<?=$peg['id_detail_inventaris'];?>" title="delete"><i class="fa fa-trash-o"></i></a>
								</td> -->
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
					<button  name="edit" value="edit" class="btn btn-danger"><a style="color:white" href="pages/laporan/laporan-barang-keluar-pdf.php" class="button">Cetak PDF</a></button>
					
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