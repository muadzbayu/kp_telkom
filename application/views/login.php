<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Menu Login</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icon1.png' ?>">
	
	<link rel="stylesheet" href="<?= base_url('assets/css/light-bootstrap-dashboard.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
</head>

<body>
	<div class="wraper">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mt-5">
					<section id="login-body" class="pt-3">
						<div class="card border-0 shadow pt-3">
							<div class="card-header bg-transparent border-bottom-0 pb-0 text-center">
								<img src="<?= base_url('assets/images/logo_telkomsel10.png') ?>" alt="Logo Telkom" class="img-fluid mx-auto d-block">
							</div>
							<div class="card-body">
								<?php if (@$this->session->error) : ?>
									<div class="alert alert-danger alert-dismissable fade show" role="alert">
										<button class="close" aria-dismissable="alert">
											<span aria-hidden="true">&times;</span>
										</button>
										<p><?= $this->session->error ?></p>
									</div>
								<?php endif; ?>
								<form action="<?= base_url('auth/login') ?>" method="post">
									<div class="form-group">
										<label for="username">Username :</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fa fa-user"></i></span>
											</div>
											<input type="text" name="username" id="username" class="form-control" autocomplete="username" placeholder="Masukan Username" />
										</div>
									</div>

									<div class="form-group">
										<label for="password">Password :</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fa fa-lock"></i></span>
											</div>
											<input type="password" name="password" id="password" class="form-control" autocomplete="current-password" placeholder="**********" />
											<div class="input-group-append">
												<span class="input-group-text" id="baru"><i class="fa fa-eye"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group mt-4">
										<button type="submit" class="btn btn-danger btn-block">Login</button>
									</div>
									<center>
										<a href="<?= base_url('auth/register') ?>">Register</a>
									</center>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#baru').click(function(){
				var as = $('#password').attr('type');
				if(as == "password"){
					$('#password').attr('type','text');
					$('#baru').css({"background":"#c8cacc","transition":"all 0.3s ease-in-out"});
				}else{
					$('#password').attr('type','password');
					$('#baru').css({"background":"#e9ecef","animation":"2s"});
				}
			});
		});
	</script>
</html>
