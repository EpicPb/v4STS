<!DOCTYPE html>
<html>
	<head>
		<script src="view/admin/js/home.js" charset="utf-8"></script>
		<link rel="stylesheet" href="view/admin/css/home.css">
		<link rel="stylesheet" href="view/admin/css/grid.css">
		<link rel="stylesheet" href="view/admin/css/layoutstyle.css">
		<meta charset="utf-8">
		<title></title>

	</head>
	<body>
		<div class="column nav">
			<div class="navtop">
				<img src="resources/icons/logo.png" alt="" height="45px" style="margin:2.5px 0px 0px 70px;">
			</div>
			<a href='?controller=layout&action=listlayouts'>
				<div class="navitem">
				<p class='nav-title'>Layouts</p>
				</div>
			</a>
			<a href='?controller=movie&action=listmovies'>
				<div class="navitem">
				<p class='nav-title'>Movies</p>
				</div>
			</a>
			<a href='?controller=cinema&action=listcinemas'>
				<div class="navitem">
				<p class='nav-title'>Cinema</p>
				</div>
			</a>
			<a href='?controller=schedule&action=listmenu'>
				<div class="navitem">
				<p class='nav-title'>Schedule</p>
				</div>
			</a>
		</div>
		<div class="content">
			<div class="navtop">
				<p class="logoName">STS CINEMAS</p>
			</div>
			<div class="">
				<?php
				require_once ('routes.php');
				 ?>
			</div>
		</div>

	</body>
</html>
