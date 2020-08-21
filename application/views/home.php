<!DOCTYPE html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

	form.example input[type=text] {
		padding: 10px;
		font-size: 17px;
		border: 1px solid grey;
		float: left;
		width: 80%;
		background: #f1f1f1;
	}

	form.example button {
		float: left;
		width: 20%;
		padding: 10px;
		background: #2196F3;
		color: white;
		font-size: 17px;
		border: 1px solid grey;
		border-left: none;
		cursor: pointer;
	}

	form.example button:hover {
		background: #0b7dda;
	}

	form.example::after {
		content: "";
		clear: both;
		display: table;
	}
</style>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8"/>
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no"
	/>

	<link rel="icon" href="../StopHoax/Stop Hoax.png"/>
	<!-- Bootstrap CSS-->
	<link
		rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous"
	/>

	<title>Stop Hoax</title>
	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			top: 90%;
			width: 100%;
			color: white;
			text-align: left;
		}
	</style>
</head>
<body style="background: rgb(2, 83, 112);">
<div class="container" style="margin-top: 15%;">
	<img style=
		 "display: block;
                width: 30%;
                margin-left: auto;
                margin-right: auto;
                margin-top: auto;"
		 src="../StopHoax/Stop Hoax.png"
		 class="logo"
	/>

	<div class="form group has-search">
		<form class="example" action="<?php echo base_url('search') ?>" method="get">
			<input type="text" placeholder="Search.." name="keyword">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>

	<!-- Main Footer -->
	<footer class="footer">
		<p style="color: rgba(190, 189, 189, 0.5);">
			Copyright @Novianto 2020
		</p>
	</footer>
</div>

</body>
