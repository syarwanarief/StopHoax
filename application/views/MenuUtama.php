<style>

	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		margin-right: 20%;
		margin-left: 20%;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
		margin-right: 20%;
		margin-left: 20%;
	}

	.tabcontentAll {
		display: block;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
		margin-right: 20%;
		margin-left: 20%;
	}

	.footer {
		position: absolute;
		bottom: 0;
		width: 100%;
	}

	.alert {
		padding: 20px;
		color: white;
	}

	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	.closebtn:hover {
		color: black;
	}
</style>

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale1"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge"/>

	<title>Stop Hoax Io</title>
	<link rel="icon" href="../StopHoax/Stop Hoax.png">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../StopHoax/static/plugins/fontawesome-free/css/all.min.css"/>
	<!-- Theme Style -->
	<link rel="stylesheet" href="../StopHoax/static/dist/css/adminlte.css"/>
	<!-- Google Font : Source Sans Pro-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
		<div class="container">
			<a href="<?php echo base_url('Welcome') ?>" class="navbar-brand">
				<img src="../StopHoax/Stop Hoax.png" alt="AdminLTE Logo"
					 class="brand-image img-circle elevation-3" style="opacity: 0.8;"/>
				<span class="brand-text font-weight-light">Stop Hoax</span>
			</a>

			<button
				class="navbar-toggler order-1"
				type="button"
				data-toggle="collapse"
				data-target="#navbarCollapse"
				aria-controls="navbarCollapse"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<!-- Left Navbar Links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					</li>
					<li class="nav-item">
						<button type="button" class="btn nav-link" data-toggle="modal"
								data-target="#exampleModalTarget">
							Kontak
						</button>
						<!-- Button Trigger Modal -->
					</li>

					<li class="nav-item dropdown">
						<a id="dropdownSubMenu1" href="#" data-toggle="dropdown"
						   aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"
						>Berita</a>
						<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
							<li><a href="/berita1" class="dropdown-item">Berita I</a></li>
							<li><a href="/berita2" class="dropdown-item">Berita II</a></li>
							<li><a href="/berita3" class="dropdown-item">Berita III</a></li>
							<li><a href="/berita4" class="dropdown-item">Berita IV</a></li>
							<li><a href="/berita5" class="dropdown-item">Berita V</a></li>
						</ul>
					</li>
				</ul>

				<!-- Search Form -->
				<div style="margin-top: 2%">

					<form action="<?php echo base_url('search') ?>" method="get" class="form-inline ml-0 ml-md-5">
						<div class="input-group input-group-sm">
							<input type="text" placeholder="Search.." name="keyword">
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</nav>
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains Page Content -->

	<div class="alertA" id="alertA" style="margin-left: 20%; margin-right: 20%; margin-top: 3%;display: none">

		<div style="background-color: red; ">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			<strong>Peringatan!</strong> Artikel berita yang anda cari tidak ada atau Hoax
		</div>

	</div>


	<div class="alertB" id="alertB" style="margin-left: 20%; margin-right: 20%; margin-top: 3%;display: none" >
		<div style="background-color: dodgerblue;">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			<strong>Informasi!</strong> Artikel berita yang anda cari adalah benar, dan bukan Hoax
		</div>
	</div>

	<p id="cekValid" style="display: none"><?php foreach ($radar as $data): echo $data->judul; endforeach;?></p>

	<script>
        window.onload = function () {

            $cek = document.getElementById('cekValid');

            if ($cek === ''){
                document.getElementById('alertA').style.display = 'block';
			}
            else{
                document.getElementById('alertB').style.display = 'block';
			}

        };
	</script>

	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'All')">All</button>
		<button class="tablinks" onclick="openCity(event, 'LP')">Lampung Post</button>
		<button class="tablinks" onclick="openCity(event, 'RL')">Radar Lampung</button>
		<button class="tablinks" onclick="openCity(event, 'TL')">Teras Lampung</button>
		<button class="tablinks" onclick="openCity(event, 'HL')">Haluan Lampung</button>
		<button class="tablinks" onclick="openCity(event, 'kompas')">Liputan6</button>
	</div>

	<div id="All" class="tabcontent" style="display: block">
		<?php foreach ($radar as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
		<?php foreach ($lampos as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
		<?php foreach ($TerasLampung as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
		<?php foreach ($haluan_lampung as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
		<?php foreach ($kompas as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>

	<div id="LP" class="tabcontent">
		<?php foreach ($lampos as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>

	<div id="RL" class="tabcontent">
		<?php foreach ($radar as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>

	<div id="TL" class="tabcontent">
		<?php foreach ($TerasLampung as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>

	<div id="HL" class="tabcontent">
		<?php foreach ($haluan_lampung as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>

	<div id="kompas" class="tabcontent">
		<?php foreach ($kompas as $data): ?>
			<h5 style="color: #0086b3"><?php echo $data->judul; ?></h5>
			<a href="<?php echo $data->link; ?>" target="_blank"><?php echo $data->link; ?></a><br><br>
		<?php endforeach; ?>
	</div>
	<!-- /.content-wrapper -->

	<!-- Main Footer -->
	<footer class="main-footer" style="position: absolute; bottom: 0">
		<!-- To the right -->
		<!-- Default to the left -->
		<strong>
			Copyright &copy; <a href="https://adminlte.io">StopHoax 2020</a>.
		</strong>
		All right reserved.
	</footer>
</div>
<!-- /.wrapper -->

<!-- REQUIRED SCRIPTS -->

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks, tabcontentAll;
        tabcontent = document.getElementsByClassName("tabcontent");
        tabcontentAll = document.getElementsByClassName("tabcontentAll");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- jQuery -->
<script src="../StopHoax/static/plugins/jquery/jquery.min.js"></script>
<!--Bootstrap 4 -->
<script src="../StopHoax/static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../StopHoax/static/dist/js/adminlte.min.js"></script>

<script src="../StopHoax/static/script.js"></script>

</body>
