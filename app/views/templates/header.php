<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman <?= $data['judul'] ?></title>
	<link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a href="<?= BASEURL ?>" class="navbar-brand">PHP MVC</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a href="<?= BASEURL ?>" class="nav-item nav-link">Home</a>
				<a href="<?= BASEURL ?>/siswa" class="nav-item nav-link">Siswa</a>
				<a href="<?= BASEURL ?>/about" class="nav-item nav-link">About</a>
			</div>
		</div>
	</div>
</nav>