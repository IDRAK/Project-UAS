<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi</title>
    <link rel="shortcut icon" href="images/cp.png">
</head>
<?php
ob_start();
session_start();
if (!isset($_SESSION['emailuser'])) {
    header("location:login.php");
}
?>

<?php include "header.php"; ?>


<div class="container-fluid">
    <div class="card shadow mb-4">


        <?php
        include "includes/config.php";
        ?>

        <!-- php input -->
        <?php

        if (isset($_POST['Simpan'])) {
            if (isset($_REQUEST['inputkode'])) {
                $destinasikode = $_REQUEST['inputkode'];
            }

            if (!empty($destinasikode)) {
                $destinasikode = $_POST['inputkode'];
            } else {
        ?><?php
                die('Anda harus memasukan datanya');
            }

            $destinasiNama = $_POST['inputnama'];
            $alamat = $_POST['alamat'];
            $kodekategori = $_POST['kodekategori'];
            $kodearea = $_POST['kodearea'];


            mysqli_query($connection, "insert into destinasi values('$destinasikode',
'$destinasiNama', ' $alamat','$kodekategori','$kodearea')");
        }

        $datakategori = mysqli_query($connection, "select * from kategori");
        $dataarea = mysqli_query($connection, "select * from area");

                ?>
        <!-- php input akhir -->

        <html lang="en">

        <head>
            <title>Destinasi Wisata</title>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        </head>

        <!-- awal input -->
        <div class="row">
            <div class="col-sm-1">

            </div>

            <div class="col-sm-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Input Destinasi Wisata</h1>
                    </div>
                </div>

                <form method="POST">
                    <div class="form-group row">
                        <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodedestinasi" name="inputkode" placeholder="Kode Destinasi" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputnama" id="namadestinasi" placeholder="Nama Destinasi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Destinasi">
                        </div>
                    </div>

                    <!-- kategori -->
                    <div class="form-group row">
                        <label for="refkategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
                        <div class="col-sm-10">
                            <select id="kodekategori" class="form-control" name="kodekategori">

                                <?php while ($row = mysqli_fetch_array($datakategori)) {  ?>

                                    <option value="<?php echo $row["kategoriID"] ?>">
                                        <?php echo $row["kategoriID"] ?>
                                        <?php echo $row["kategoriNama"] ?>

                                    </option>

                                <?php  }  ?>

                            </select>
                        </div>
                    </div>

                    <!-- area -->
                    <div class="form-group row">
                        <label for="refkategori" class="col-sm-2 col-form-label">Area wisata</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kodearea" name="kodearea">


                                <?php while ($row = mysqli_fetch_array($dataarea)) {  ?>


                                    <option value="<?php echo $row['areaID'] ?>">
                                        <?php echo $row["areaID"] ?>
                                        <?php echo $row["areaNama"] ?>

                                    </option>

                                <?php  }  ?>

                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                            <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-sm-1">
            </div>
        </div>
        <!--penutup class row -->
        <!-- akhir input -->


        <!-- Memulai tampil data  -->
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Daftar Destinasi Wisata</h1>
                        <h2>Hasil Entri data pada Tabel Destinasi</h2>
                    </div>
                </div>
                <!-- penutup jumbotron -->

                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="search" class="col-sm-3">Nama Destinasi</label>
                        <div class="col-sm-6">
                            <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                            echo $_POST['search'];
                                                                                                        } ?>" placeholder="Cari Nama Destinasi">
                        </div>
                        <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="search">

                    </div>

                </form>



                <table class="table table-hover table-danger">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Destinasi Wisata</th>
                            <th>Alamat Destinasi Wisata</th>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Kode Area</th>
                            <th>Nama Area</th>
                            <th colspan="2" style="text-align: center;">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        if (isset($_POST["Kirim"])) {
                            $search = $_POST['search'];
                            $query = mysqli_query($connection, "select destinasi.*, kategori.kategoriID, kategori.kategoriNama, area.areaID, area.areaNama  from destinasi, kategori, area 
    where destinasiNama like '%" . $search . "%'
    and destinasi.kategoriID = kategori.kategoriID
    and destinasi.areaID = area.areaID ");
                        } else {
                            $query = mysqli_query($connection, "select destinasi.*, kategori.kategoriID, kategori.kategoriNama, area.areaID, area.areaNama  from destinasi, kategori, area 
where destinasi.kategoriID = kategori.kategoriID
and destinasi.areaID = area.areaID ");
                        }

                        $nomor = 1;
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['destinasiID']; ?></td>
                                <td><?php echo $row['destinasiNama']; ?></td>
                                <td><?php echo $row['destinasiAlamat']; ?></td>
                                <td><?php echo $row['kategoriID']; ?></td>
                                <td><?php echo $row['kategoriNama']; ?></td>
                                <td><?php echo $row['areaID']; ?></td>
                                <td><?php echo $row['areaNama']; ?></td>

                                <!-- untuk icon edit dan  delete -->
                                <td>
                                    <a href="destinasiedit.php?ubah=<?php echo $row["destinasiID"] ?>" class="btn btn-success btn-sm" title="EDIT">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                </td>

                                <td>
                                    <a href="destinasihapus.php?hapus=<?php echo $row["destinasiID"] ?>" class="btn btn-danger btn-sm" title="DELETE">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </a>
                                </td>

                                <!-- akhir icon edit dan delete -->


                            </tr>
                            <?php $nomor = $nomor + 1; ?>
                        <?php }


                        ?>
                    </tbody>

                </table>

            </div>


            <div class="col-sm-1"></div>

        </div>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#kodekategori').select2({
                    allowClear: true,
                    placeholder: "Pilih Kategori Wisata"
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#kodearea').select2({
                    allowClear: true,
                    placeholder: "Pilih Area Wisata"
                });
            });
        </script>

    </div>
</div>
<!-- penutup container fluid -->
<?php include "footer.php" ?>

<?php
mysqli_close($connection);
ob_end_flush();
?>

</html>