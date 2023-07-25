<!DOCTYPE html>
<?php
include "includes/config.php";
$query1 = mysqli_query($connection, "SELECT * FROM area");

$query2 = mysqli_query($connection, "SELECT * FROM provinsi");

$query3 = mysqli_query($connection, "SELECT * FROM kategori");

$query5 = mysqli_query($connection, "SELECT * FROM kecamatan");

$query6 = mysqli_query($connection, "SELECT * FROM kabupaten");

$query7 = mysqli_query($connection, "SELECT * FROM provinsi");

$jumlah = mysqli_num_rows($query5);
$jumlah2 = mysqli_num_rows($query6);
$jumlah3 = mysqli_num_rows($query7);

$destinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi
  WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");
$kecamatan = mysqli_query($connection, "SELECT * FROM kecamatan, kabupaten
   WHERE kecamatan.kabupatenID = kabupaten.kabupatenID");

$sql =  mysqli_query($connection, "SELECT * FROM destinasi");

$foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");


?>
<html>

<head>
	<title>PESONA INDONESIA</title>
	<link rel="shortcut icon" href="images/cp.png">
	<!-- <link rel="stylesheet" type="text/css" href="css/web.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<header>
			<!-- MEMBUAT MENU -->
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#DDA15E;">
				<img class="logo" style="width:50px; height:50px;" src="images/cp.png">
				<a class="navbar-brand" style="color:beige;" href="#"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" style="color:beige;" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="color:beige;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Provinsi
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

								<?php if (mysqli_num_rows($query2) > 0) {
									while ($row = mysqli_fetch_array($query2)) { ?>
										<a class="dropdown-item" href="#"><?php echo $row["provinsiNama"] ?></a>
								<?php }
								} ?>


							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="color:beige;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Area
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

								<?php if (mysqli_num_rows($query1) > 0) {
									while ($row = mysqli_fetch_array($query1)) { ?>
										<a class="dropdown-item" href="#"><?php echo $row["areaNama"] ?></a>
								<?php }
								} ?>


							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="color:beige;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kategori
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

								<?php if (mysqli_num_rows($query3) > 0) {
									while ($row = mysqli_fetch_array($query3)) { ?>
										<a class="dropdown-item" href="#"><?php echo $row["kategoriNama"] ?></a>
								<?php }
								} ?>


							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" style="color:beige;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Events
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="event.php">Event Calendar</a>
							</div>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>

			<!--AKHIR MENU -->
		</header>
		<article>
			<!-- SLIDER -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/slide1.JPG" alt="First slide">

						<div class="carousel-caption d-none d-md-block">
							<h1>PESONA ALAM INDONESIA</h1>
							<p>Keindahan Alam Terbaik di Seluruh Dunia</p>
						</div>

					</div>

					<div class="carousel-item">
						<img class="d-block w-100" src="images/slide2.JPG" alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
							<h1>PESONA ALAM INDONESIA</h1>
							<p>Keindahan Alam Terbaik di Seluruh Dunia</p>
						</div>
					</div>

					<div class="carousel-item">
						<img class="d-block w-100" src="images/slide3.JPG" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h1>PESONA ALAM INDONESIA</h1>
							<p>Keindahan Alam Terbaik di Seluruh Dunia</p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<!-- AKHIR SLIDER -->

			<!-- CONTENT -->

			<div style="background: #DDA15E; width: 1110px; height: 420px;">
				<br>
				<h1 style="margin: 0 0 0 50px;">Keindahan Alam Indonesia</h1>
				<br>
				<div style="width: 500px; float: left;">
					<p style="margin: 0 25px 0 50px; text-align: justify;">Indonesia terkenal di mancanegara sebagai negara dengan alam yang indah. Negara kepulauan seluas 1,91 juta km2 ini memang memiliki bentang alam yang memesona, mulai dari Aceh hingga Papua. Tak heran jika jumlah wisatawan yang datang terus bertambah, baik dari dalam maupun luar negeri untuk melihat langsung ragam keindahan wisata alam yang ada di Indonesia.</p><br>
					<p style="margin: 0 25px 0 50px; text-align: justify;">Karena keindahan alam Indonesia yang tak terkira, berlibur pun tak perlu jauh-jauh ke luar negeri. Ada sejumlah destinasi wisata alam Indonesia yang sangat menarik untuk dikunjungi.</p>
				</div>
				<div style="width: 500px; float: right; margin: 0 50px 0 0;">
					<img src="images/pic1.jpg" style="width: 500px; height:auto">
				</div>
				<br>
			</div>

			<div style="background: #FEFAE0; width: 1110px; height: 460px;">
				<br>
				<h1 style="margin: 0 0 0 50px;">Keindahan Budaya Indonesia</h1>
				<br>
				<div style="width: 500px; float: right;">
					<p style="margin: 50px 50px 0 25px; text-align: justify;">Indonesia adalah bangsa majemuk yang terdiri dari berbagai suku bangsa, agama dan bahasa. Kemajemukan ini terjalin dalam satu ikatan bangsa indonesia sebagai satu kesatuan bangsa yang utuh dan berdaulat.</p><br>
					<p style="margin: 0 50px 0 25px; text-align: justify;">Keragaman adalah suatu kondisi dalam masyarakat dimana terdapat perbedaan dalam berbagai bidang terutama suku bangsa, ras, agama, idelogi, budaya “masyarakat yang manjemuk.</p>
				</div>
				<div style="width: 500px; float: left; margin: 0 0 0 50px;">
					<img src="images/pic2.jpg" style="width: 500px; height:auto">
				</div>
				<br>
			</div>

			<div style="background: #DDA15E; width: 1110px; height: 625px;">
				<iframe width="1110" height="625" src="https://www.youtube.com/embed/feoRIr5MNHM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>

			<div style="background: #DDA15E; width: 1110px; height: 420px;">
				<br>
				<h1 style="text-align: center;">Foto Destinasi</h1>
				<!-- Galeri -->

				<div class="container">
					<div class="row">

						<?php
						$batas = 3;
						$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
						$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

						$previous = $halaman - 1;
						$next = $halaman + 1;

						$jumlah_data = mysqli_num_rows($foto);
						$total_halaman = ceil($jumlah_data / $batas);

						$data_foto = mysqli_query($connection, "SELECT * from fotodestinasi limit $halaman_awal, $batas");

						while ($row3 = mysqli_fetch_array($data_foto)) { ?>

							<div class="col-sm-4" style="margin-top: 20px;">
								<div class="figure">
									<img src="../UAS_backend/images/<?php echo $row3["fotoFile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="height: 200px; width:350px">
									<figcaption style="text-align: center; color: black;"><?php echo $row3["fotoNama"] ?></figcaption>

								</div>


							</div>

						<?php } ?>


					</div>
					<div style="width: 650px;">
						<nav style="margin-left:450px; margin-top:20px;">
							<ul class="pagination justify-content-center">
								<li class="page-item">
									<a class="page-link" <?php if ($halaman > 1) {
																echo "href='?halaman=$previous'";
															} ?>>Previous</a>
								</li>
								<?php
								for ($x = 1; $x <= $total_halaman; $x++) {
								?>
									<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
								<?php
								}
								?>
								<li class="page-item">
									<a class="page-link" <?php if ($halaman < $total_halaman) {
																echo "href='?halaman=$next'";
															} ?>>Next</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<div style="background: #FEFAE0; width: 1110px; height: 530px;">
				<br>
				<h1 style="text-align: Center;">Our Tour Guide</h1>
				<br>

				<div style="background: #EECE9F; float: left; height: 360px; width: 300px; border-radius: 5px; margin: 0 0 0 55px">
					<div style="margin: 50px 0 0 100px;">
						<?php
						$pemandu1 = mysqli_query($connection, "select * from tourguide where pemanduID='P001'");
						$row4 = mysqli_fetch_array($pemandu1);
						?>

						<img style="width:100px; height:100px;" src="../uas_backend/images/<?php echo $row4["pemanduFoto"];
																							?>">
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row4["pemanduID"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row4["pemanduNama"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row4["pemanduTL"] ?></h3>
					</div>
				</div>
				<div style="background: #EECE9F; float: left; height: 360px; width: 300px; border-radius: 5px; margin: 0 0 0 50px">
					<div style="margin: 50px 0 0 100px;">
						<?php
						$pemandu2 = mysqli_query($connection, "select * from tourguide where pemanduID='P002'");
						$row5 = mysqli_fetch_array($pemandu2);
						?>

						<img style="width:100px; height:100px;" src="../uas_backend/images/<?php echo $row5["pemanduFoto"];
																							?>">
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row5["pemanduID"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row5["pemanduNama"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row5["pemanduTL"] ?></h3>
					</div>
				</div>
				<div style="background: #EECE9F; float: left; height: 360px; width: 300px; border-radius: 5px; margin: 0 0 0 50px">
					<div style="margin: 50px 0 0 100px;">
						<?php
						$pemandu3 = mysqli_query($connection, "select * from tourguide where pemanduID='P003'");
						$row6 = mysqli_fetch_array($pemandu3);
						?>

						<img style="width:100px; height:100px;" src="../uas_backend/images/<?php echo $row6["pemanduFoto"];
																							?>">
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row6["pemanduID"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row6["pemanduNama"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row6["pemanduTL"] ?></h3>
					</div>
				</div>
			</div>
			<div style="background: #DDA15E; width: 1110px; height: 530px;">
				<br>
				<h1 style="text-align: center;">Our Translator</h1>
				<br>
				<div style="width: 400px; height: 360px; border-radius: 5px; float: left; margin: 0 0 0 100px; background: #FEFAE0">
					<div style="margin: 50px 0 0 150px;">
						<?php
						$translator1 = mysqli_query($connection, "select * from translator where translatorID='T001'");
						$row7 = mysqli_fetch_array($translator1);
						?>

						<img style="width:100px; height:100px;" src="../uas_backend/images/<?php echo $row7["translatorFoto"];
																							?>">
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row7["translatorID"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row7["translatorNama"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row7["translatorTL"] ?></h3>
					</div>
				</div>
				<div style="width: 400px; height: 360px; border-radius: 5px; float: left; margin: 0 0 0 100px; background: #FEFAE0">
					<div style="margin: 50px 0 0 150px;">
						<?php
						$translator2 = mysqli_query($connection, "select * from translator where translatorID='T002'");
						$row8 = mysqli_fetch_array($translator2);
						?>

						<img style="width:100px; height:100px;" src="../uas_backend/images/<?php echo $row8["translatorFoto"];
																							?>">
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row8["translatorID"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row8["translatorNama"] ?></h3>
					</div>
					<div style="margin: 15px 0 0 0;">
						<h3 style="color: black; text-align: center;"><?php echo $row8["translatorTL"] ?></h3>
					</div>
				</div>
				<br>
			</div>
			<div style="background: #FEFAE0; width: 1110px; height: 760px;">
				<br>
				<h1 style="text-align: center;">Keindahan Alam Indonesia</h1>
				<br>
				<div style="width: 550px; height: 250px;">
					<iframe width="400" height="224" src="https://www.youtube.com/embed/ijQ8xk-JYNk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin: 0 0 0 375px;"></iframe>
				</div>
				<div style="text-align: center;">
					<p>Lentera Indonesia - Program dokumenter yang diangkat dari kisah-kisah pengalaman nyata para anak muda yang rela melepaskan peluang karir dan kemapanan kehidupan kota besar untuk menjadi guru dan mengajar di desa desa terpencil di seluruh pelosok negeri selama satu tahun.</p>
				</div>
				<div style="width: 470px; height: 250px;">
					<iframe width="400" height="224" src="https://www.youtube.com/embed/O9tLEJCalxg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin: 0 0 0 375px;"></iframe>
				</div>
				<div style="text-align: center;">
					<p>Lentera Indonesia - Program dokumenter yang diangkat dari kisah-kisah pengalaman nyata para anak muda yang rela melepaskan peluang karir dan kemapanan kehidupan kota besar untuk menjadi guru dan mengajar di desa desa terpencil di seluruh pelosok negeri selama satu tahun.</p>
				</div>
			</div>

			<!-- data -->

			<div class="container" style="background: #DDA15E;">
				<br>
				<div class="row">
					<div class="col-sm-4">
						<div class="jumbotron jumbotron-fluid" style="background: #EECE9F; border-radius: 5px">
							<div class="container">
								<h1 class="display-4">Daftar Kecamatan</h1>
							</div>
						</div>

						<?php if (mysqli_num_rows($query5) > 0) {
							while ($row = mysqli_fetch_array($query5)) { ?>
								<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px"><?php echo $row["kecamatanNama"] ?></p>
						<?php }
						} ?>
						<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px; text-align: center">Total <?php echo $jumlah ?> Kecamatan</p>
					</div>

					<div class="col-sm-4">
						<div class="jumbotron jumbotron-fluid" style="background: #EECE9F; border-radius: 5px">
							<div class="container">
								<h1 class="display-4">Daftar Kabupaten</h1>
							</div>
						</div>

						<?php if (mysqli_num_rows($query6) > 0) {
							while ($row = mysqli_fetch_array($query6)) { ?>
								<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px"><?php echo $row["kabupatenNama"] ?></p>
						<?php }
						} ?>
						<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px; text-align: center">Total <?php echo $jumlah2 ?> Kabupaten</p>
					</div>

					<div class="col-sm-4">
						<div class="jumbotron jumbotron-fluid" style="background: #EECE9F; border-radius: 5px">
							<div class="container">
								<h1 class="display-4">Daftar Provinsi</h1>
							</div>
						</div>

						<?php if (mysqli_num_rows($query7) > 0) {
							while ($row = mysqli_fetch_array($query7)) { ?>
								<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px"><?php echo $row["provinsiNama"] ?></p>
						<?php }
						} ?>
						<p style="background-color : #EECE9F; border-radius: 5px; padding: 1px 10px; text-align: center">Total <?php echo $jumlah3 ?> Provinsi</p>
						<br>
					</div>
				</div>
			</div>

			<!-- akhir -->
			<div style="background: #EECE9F; width: 1110px; height: 420px;">
				<br>
				<h1 style="text-align: center;">The Author</h1>
				<br>
				<div style="margin: 0 0 0 280px;">
					<div style="width: 300px; float: left;">
						<img src="images/pasfoto.jpeg" style="width: 250px; height:auto; margin: 0 0 0 50px;">
					</div>
					<div style="width: 200px; float: left; margin: 80px 50px 0 50px;">
						<h2>Aldy Sukardi</h2>
						<h2>825200107</h2>
					</div>
				</div>
			</div>
	</div>



	</article>

	<!-- <footer>
			Copyright &copy; 2021 | <a href="https://www.ygfamily.com/artist/Main.asp?LANGDIV=K&ATYPE=2&ARTIDX=70" target="_blank">YG Entertainment</a> All Right Reserved
		</footer> -->
	</div>
	<!--div penutup container-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>