<section class="content-header">
   <h1>Inventaris <small>Dashboard</small></h1>
    <ol class="breadcrumb">
		<!-- <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li> -->
    </ol>
</section>
<?php
	include "dist/koneksi.php";
?>
<section class="content">
    <div class="row">

    <?php 
    $barang= mysql_query("SELECT * from tb_inventaris where id_user = '$_SESSION[id_user]' ");
      while ($row = mysql_fetch_array($barang)){
        // echo "<option value=".$row['id_inventaris'].">".$row['lokasi']." </option>";
        echo "<div class='col-lg-3 col-xs-6'>";
		    echo "<div class='small-box bg-aqua'>";
		    echo "		<div class='inner'>";
		    echo "			<h3>3</h3>";
		    echo "			<p>".$row['lokasi']."</p>";
		    echo "		</div>";
		    echo "		<div class='icon'>";
		    echo "			<i class='ion ion-briefcase'></i>";
			echo "		</div>";
		    echo "		<p class='small-box-footer'><a style='color:white' href='home-pegawai.php?page=barang-pegawai&idv=".$row['id_inventaris']."'>Detail </a><i class='fa fa-arrow-circle-right'></i></p>";
		    echo "	</div>";
			echo "</div>";
			
      }
    ?> 
		
    </div>
</section>