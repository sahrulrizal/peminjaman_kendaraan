<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PK</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/asset_login/css/native.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/asset_login/css/bootstrap.min.css">
</head>
<body>

<div class="Login">
	<div class="col-md-4" style="margin: 0 auto;padding-top:20px;">
		<div class="card">
			<div class="card-header text-center">
				<h3>Login PK</h3>
			</div>
			<div class="card-body">
		    	<form action="<?php echo base_url(); ?>C_Auth/login" method="POST" accept-charset="utf-8" autocomplete="off">

          <?php if ($this->session->flashdata('error')) {?>
            <div class="alert alert-danger alert-dismissible mt-3 small">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $this->session->flashdata('error') ?>
            </div>
          <?php } else if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success alert-dismissible mt-3 small">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php } ?>

		    		<div class="form-group">
		    			<label class="font-weight-bold">Email</label>
		    			<input type="email" name="email" placeholder="Masukan Email" class="form-control" required>
		    		</div>
		    		<div class="form-group">
		    			<label class="font-weight-bold">Password</label>
		    			<input type="password" name="password" placeholder="Masukan Password" class="form-control" required>
		    		</div>
		    		<div class="row">
		    			<button type="submit" class="btn btn-info ml-3">Login</button>
		    		</div>
		    	</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
