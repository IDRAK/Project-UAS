<!DOCTYPE html>

<?php 
ob_start();
session_start();
    include "includes/config.php";

    if(isset($_POST['Simpan']))
    {
        if (isset($_REQUEST['inputid']))
        {
            $areaID = $_REQUEST['inputid'];
        }


        $areaNama = $_POST['inputnama'];
        $areaWilayah = $_POST['inputwil'];
        $areaKeterangan = $_POST['inputket'];
        $kecamatanID = $_POST['inputkecid'];
        
        
        mysqli_query($connection, "insert into area values ('$areaID', '$areaNama', '$areaWilayah', '$areaKeterangan', '$kecamatanID')");
        header("location:area.php");
        

    }
    $datakategori = mysqli_query($connection, "select * from kecamatan");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/cp.png">
</head>
<body>

<?php
    include "header.php";
?>


<div class="row">
<div class="col-sm-1">
    </div>

    <div class="col-sm-10">

    <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Input Form Untuk Area</h1>
                
            </div>
        </div> <!-- penutup jumbotron -->


  <form method="POST">
  <div class="form-group row">
    <label for="areaid" class="col-sm-2 col-form-label">Area ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="areaid" name="inputid" placeholder="Area ID" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputnama" class="col-sm-2 col-form-label">Area Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnama" id="areaNama" placeholder="Area Nama">
    </div>
  </div>

  <div class="form-group row">
    <label for="areaWilayah" class="col-sm-2 col-form-label">Area Wilayah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputwil" id="areaWilayah" placeholder="Area Wilayah">
    </div>
  </div>

  <div class="form-group row">
    <label for="areaKeterangan" class="col-sm-2 col-form-label">Area Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputket" id="areaKeterangan" placeholder="Area Keterangan">
    </div>
  </div>

  <div class="form-group row">
    <label for="kecamatanid" class="col-sm-2 col-form-label">Kecamatan ID</label>
    <div class="col-sm-10">
    <select id="kodekategori" class="form-control" name="inputkecid">

<?php while ($row = mysqli_fetch_array($datakategori)) {  ?>

    <option value="<?php echo $row["kecamatanID"] ?>">
        <?php echo $row["kecamatanID"] ?>
        <?php echo $row["kecamatanNama"] ?>

    </option>

<?php  }  ?>

</select>
    </div>
  </div>

  


  <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
    <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
    </div>
  </div>
  </form>
    </div>

    <div class="col-sm-1">
    </div>
    </div> <!-- penutup class row-->


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Daftar Hasil Entri Area</h1>
                <h2>Hasil Entry data pada Tabel</h2>
            </div>
        </div> <!-- penutup jumbotron -->

    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Nama Area</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" 
                value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Area">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
    </form>

        <table class="table table-hover table-success">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Area ID</th>
                    <th>Area Nama</th>
                    <th>Area Wilayah</th>
                    <th>Area Keterangan</th>
                    <th>Kecamatan ID</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select area.*, kecamatan.kecamatanNama from area, kecamatan where areaNama like'%".$search."%' or areaWilayah like'%".$search."%' or areaKeterangan like'%".$search."%'" );
            }else
                {
                $query = mysqli_query($connection, "select area.*, kecamatan.kecamatanNama from area, kecamatan where area.kecamatanID = kecamatan.kecamatanID ");
                }
                
                

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['areaID'];?></td>
                        <td><?php echo $row['areaNama'];?></td>
                        <td><?php echo $row['areaWilayah'];?></td>
                        <td><?php echo $row['areaKeterangan'];?></td>
                        <td><?php echo $row['kecamatanID'];?></td>                    
                    </tr>
                <?php $nomor = $nomor + 1;?>
                <?php } ?>


            </tbody>
        </table>



    </div>
    <div class="col-sm-1"></div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php
    include "footer.php";
?>
<?php
mysqli_close($connection);
ob_end_flush();
?>
</body>
</html>

