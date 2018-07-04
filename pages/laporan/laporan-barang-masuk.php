<section class="content-header">
    <h1>Laporan<small> Barang Masuk</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Barang Masuk</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
?>
<section class="content">

				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                <th>Tanggal Masuk</th>
								<th>Nama Barang</th>
								<th>Merk atau type</th>
								<th>Jumlah</th>
								<th>Bahan</th>
                <th>Asal Barang</th>
                <th>Harga</th>
								<!-- <th>Mutasi dari</th> -->
								<th>Kondisi</th>
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						<?php
            	$tampilBrg= mysql_query("SELECT * FROM tb_barang ");
							while($peg=mysql_fetch_array($tampilBrg)){
						?>	
							<tr>
              <td><?php echo $peg['tgl_masuk'];?></td>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['merk'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
                <td><?php echo $peg['bahan_barang'];?></td>
								<td><?php echo $peg['asal_barang'];?></td>

								<td><?php echo $peg['harga_barang'];?></td>
								<!-- <td><?php echo $peg['mutasi'];?></td> -->
								<td><?php echo $peg['kondisi'];?></td>
								<!-- <td class="tools">
									<a href="home-admin.php?page=form-edit-barang-masuk&id_barang=<?=$peg['id_barang'];?>" title="edit"><i class="fa fa-edit"></i></a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=act-hapus-barang&id_barang=<?php echo $peg['id_barang'];?>" title="delete"><i class="fa fa-trash-o"></i></a>
								</td> -->
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
      <button  name="edit" value="edit" class="btn btn-danger"><a style="color:white" href="pages/laporan/laporan-barang-masuk-pdf.php" class="button">Cetak PDF</a></button>
					
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