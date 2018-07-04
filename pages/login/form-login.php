<div class="login-box">
	<div class="login-logo">
		<a href="index.php">
	<img style="height:200px; width:200px" src='dist/img/logo.png' class='user-image' alt='User Image'>		
		
		</a>
	</div>
	<div class="box box-success">
		<div class="login-box-body" style="border-color:white">
			<p class="login-box-msg">Sistem Informasi Inventaris Barang Masjid Agung Palembang</p>
			<form action="index.php?page=act-login&op=in" method="POST">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="User Name"><span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password"><span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-success  btn-block btn-flat">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>