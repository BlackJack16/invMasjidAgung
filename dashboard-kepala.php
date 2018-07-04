<section class="content-header">
   <h1>Laporan <small>Inventaris</small></h1>
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
    $barang= mysql_query("SELECT * from tb_inventaris ");
      while ($row = mysql_fetch_array($barang)){
        // echo "<option value=".$row['id_inventaris'].">".$row['lokasi']." </option>";
        echo "<div class='col-lg-3 col-xs-6'>";
		    echo "<div class='small-box bg-aqua'>";
		    echo "		<div  style='height:70px' class='inner'>";
		    // echo "			<h3>3</h3>";
		    echo "			<p>".$row['lokasi']."                           </p>";
		    echo "		</div>";
		    echo "		<div class='icon'>";
		    echo "			<i class='ion ion-briefcase'></i>";
			echo "		</div>";
			echo "		<p class='small-box-footer'><a style='color:white' href='home-kepala.php?page=laporan-inventaris&idv=".$row['id_inventaris']."'>Detail </a><i class='fa fa-arrow-circle-right'></i></p>";
			
		    // echo "		<p class='small-box-footer'><a style='color:white' href='pages/laporan/laporan.php'>Detail </a><i class='fa fa-arrow-circle-right'></i></p>";
		    echo "	</div>";
			echo "</div>";
			
      }
    ?> 
		
    </div>
</section>