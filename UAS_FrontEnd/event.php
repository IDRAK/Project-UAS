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
$query8 = mysqli_query($connection, "SELECT * FROM kegiatan");
$query9 = mysqli_query($connection, "SELECT kegiatan.*,kabupatenNama from kegiatan, kabupaten where kegiatan.kabupatenID = kabupaten.kabupatenID");

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

            <div style="background: #EECE9F;">
                <h1 class="display-4" style="text-align: center;">Calendar of Event</h1>


                <?php if (mysqli_num_rows($query9) > 0) {
                    while ($row = mysqli_fetch_array($query9)) { ?>
                           <div  style="background: #EECE9F; width: 1000px; height: 325px;"> 
                            <div style="margin: 10px 0 0 65px; width: 350px; float: left;">
                                <img src="../UAS_backend/images/<?php echo $row["eventPoster"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="height: 200px; width:350px">
                                <p>Sumber: <?php echo $row["eventSumber"] ?></p>
                            </div>
                            <div style="margin: 0 -50px 0 25px; width: 600px; float: left">
                                <h4 style="border-bottom: 2px solid black;"><?php echo $row["kabupatenNama"] ?></h4>
                                <h3><?php echo $row["eventNama"] ?></h3>
                                <p style="font-size: medium; text-align: justify; color: black; margin: 5px 0 0 0"><?php echo $row["eventKet"] ?></p>
                                <h4 style="border-bottom: 2px solid black;">Event on <?php echo $row["eventMulai"] ?> - <?php echo $row["eventSelesai"] ?></h4>

                            </div>
                           </div>
                <?php }
                } ?>

            </div>
            <!-- akhir -->




        </article>

        <footer>
            <div style="background: #EECE9F; width: 1110px; height: 420px;">
                <div>
                    <br>
                    <h1 style="text-align: center;">The Author</h1>
                    <br>
                </div>
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
        </footer>
    </div>
    <!--div penutup container-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>