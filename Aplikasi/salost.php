<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>PT KAI DAOP 2 Bandung - LOST & FOUND </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="superadmin.php">SUPER ADMIN PAGE</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="superadmin.php">Home</a></li>
					<li><a href="registrasi.php">Form Registrasi</a></li>
					<li><a href="saform.php">Form Barang</a></li>
					<li><a href="sadata.php">Data Admin</a></li>
					<li><a href="sahilangbproses.php">Laporan Kehilangan Belum Diproses</a></li>
					<li><a href="sahilangsproses.php">Laporan Kehilangan Terproses</a></li>
					<li><a href="salost.php">Data Barang Belum Diambil </a></li>
					<li><a href="safound.php">Data Barang Diambil</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>Data Barang Belum Diklaim</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<div class="table-wrapper">
						<table class="alt">
							<?php
							//skrip untuk koneksi
							require('mysqli_connect.php');
							//skrip ini u/ membaca rekaman
							$q="SELECT * FROM data WHERE status='belum diklaim'";
							$hasil=@mysqli_query ($dbkoneksi, $q);// menjalankan query 
						
								if($hasil){
							
                                    echo '
                                        <thead>
                                            <tr">
												<th>Edit</th>
                                                <th>No</th>
                                                <th>Jenis Barang</th>
												<th>Milik KNP KA</th>
												<th>Yang Menyerahkan</th>
												<th>Deskripsi</th>
												<th>Ditemukan</th>
												<th>Status</th>
												<th>Claim</th>
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
												<td><a href="saedit-before.php?idbarang=' . $baris['idbarang'] . '">
												<button type="button" class="button primary fit small">Edit</button></a></td>
												<td>' . $baris['idbarang'] . '</td>
                                                <td>' . $baris['jenis'] . '</td>
												<td>' . $baris['milikka'] . '</td>
                                                <td>' . $baris['penemu'] . '</td>
												<td>' . $baris['lainnya'] . '</td>
												<td>' . $baris['tglditemukan'] . '</td>
												<td>' . $baris['status'] . '</td>
												<td><a href="saklaim.php?idbarang=' . $baris['idbarang'] . '">
												<button type="button" class="button primary fit">Claim</button></a></td>
												</tr>
                                        </tbody>';}
									mysqli_free_result($hasil);
								
								}else{
									echo '<p class="error">Terjadi Kesalahan.! </p>';
									echo '<p>' . mysqli_error($dbkoneksi) . '<br><br>Query:' . $q . '</p>'; 
								}
								mysqli_close($dbkoneksi);
								?>
						</table>
						</div>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; PT KAI DAOP 2 BANDUNG, Divisi Pengamanan</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>