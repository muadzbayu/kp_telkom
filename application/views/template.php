<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<title>Absen Mahasiswa Magang Telkom</title>

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" />
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icon1.png' ?>">
	<!-- Bootstrap Datepicker-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css')?>">

	<!-- CSS Files -->

	<link href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/light-bootstrap-dashboard.css?v=2.0.1') ?>" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?= base_url('assets/css/demo.css') ?>" rel="stylesheet" />
	
	<script>
		var BASEURL = '<?= base_url() ?>';
	</script>
	<?php check_absen_harian() ?>
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-image="" data-color="red">
			<!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->
			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="<?= base_url() ?>" class="simple-text" style="font-weight: bold;font-size: 18pt">
						Telkom Indonesia
					</a>
				</div>
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link text-white">
							<h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
						</a>
					</li>
					<?php if (is_stts('user')) : ?>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url() ?>">
								<i class="nc-icon nc-chart-pie-35"></i>
								<p>Beranda</p>
							</a>
						</li>
					<?php endif; ?>
					<?php if(is_stts('admin')) : ?>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('absensi') ?>">
								<i class="nc-icon nc-tag-content"></i>
								<p>Absen Masuk</p>
							</a>
						</li>
					<?php endif; ?>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url('user') ?>">
							<i class="nc-icon nc-circle-09"></i>
							<p>Data Diri</p>
						</a>
					</li>
					<?php if (is_stts('admin')) : ?>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('Mahasiswa') ?>">
								<i class="nc-icon nc-simple-add"></i>
								<p>Buat Akun</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('divisi') ?>">
								<i class="nc-icon nc-bag"></i>
								<p>Divisi</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('absensi') ?>">
								<i class="nc-icon nc-notes"></i>
								<p>Absen Harian</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('nilai') ?>">
								<i class="nc-icon nc-check-2"></i>
								<p>Form Nilai KP</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('fileku') ?>">
								<i class="nc-icon nc-cloud-upload-94"></i>
								<p>Unggah</p>
							</a>
						</li>
					<?php else : ?>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('absensi/check_absen') ?>">
								<i class="nc-icon nc-notes"></i>
								<p class="d-inline">
									Absen Harian
									<?php if ($this->session->absen_warning == 'true') : ?>
										<span class="float-right ml-auto notification p-0 badge badge-danger"><i class="fa fa-exclamation"></i></span>
									<?php endif; ?>
								</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('absensi/detail_absensi') ?>">
								<i class="nc-icon nc-notes"></i>
								<p>Daftar Absen</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('nilai') ?>">
								<i class="nc-icon nc-tag-content"></i>
								<p>Nilai KP</p>
							</a>
						</li>
						<li class="nav-item <?= @$_active ?>">
							<a class="nav-link" href="<?= base_url('fileku') ?>">
								<i class="nc-icon nc-cloud-download-93"></i>
								<p>Unduh</p>
							</a>
						</li>
					<?php endif; ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('dashboard/logout') ?>">
							<span>Log out <i class="nc-icon nc-button-power"></i></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg" color-on-scroll="500">
				<div class="container-fluid">
					 <ol class="breadcrumb" style="background-color:#F7F8F8;">
       					<li><a href="<?php echo base_url(); ?>/<?php echo $pointer;?>">Absensi</a></li>
       					 <li class="active" style="color:#888889;"> &nbsp;>&nbsp;<?php echo $sub_bread; ?></li>
       				</ol>
       				 <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
					</button>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div id="alert">
						<?php if (@$this->session->response) : ?>
							<div class="alert alert-<?= $this->session->response['status'] == 'error' ? 'danger' : $this->session->response['status'] ?> alert-dismissable fade show" role="alert">
								<button class="close" aria-dismissable="alert">
									<span aria-hidden="true">&times;</span>
								</button>
								<p><?= $this->session->response['message'] ?></p>
							</div>
						<?php endif; ?>
					</div>
					<?= $content ?>
				</div>
			</div>
			<footer class="footer">
				<div class="container">
					<nav>
						<p class="copyright text-center">
							Copyright &copy; by <a href="#">MahasiswaKP</a> 2019 
						</p>
					</nav>
				</div>
			</footer>
		</div>
	</div>
</body>

<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= base_url('assets/js/plugins/bootstrap-switch.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- SweetAlert -->
<script src="<?= base_url('assets/js/plugins/sweetalert.min.js') ?>"></script>

<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?= base_url('assets/js/light-bootstrap-dashboard.js?v=2.0.1') ?>" type="text/javascript"></script>

<!-- Main Js -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<!-- Datepicker Js -->
<script src="<?= base_url('assets/js/jquery-3.1.1.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>" ></script>

<!-- Custom Script -->
<script>
	var hoursLabel = document.getElementById("hours");
	var minutesLabel = document.getElementById("minutes");
	var secondsLabel = document.getElementById("seconds");
	setInterval(setTime, 1000);

	function setTime() {
		secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
		minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
		hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
	}

	function pad(val) {
		var valString = val + "";
		if (valString.length < 2) {
			return "0" + valString;
		} else {
			return valString;
		}
	}

	<?php if (@$this->session->absen_needed) : ?>
		var absenNeeded = '<?= json_encode($this->session->absen_needed) ?>';
		<?php $this->session->sess_unset('absen_needed') ?>
	<?php endif; ?>
</script>

</html>
