<!DOCTYPE html>

<?php 
    include "includes/config.php";

    if(isset($_POST['Simpan']))
    {
        if (isset($_REQUEST['inputid']))
        {
            $kecamatanID = $_REQUEST['inputid'];
        }


        $kecamatanNama = $_POST['inputnama'];
        $kabupatenID = $_POST['inputkabid'];
        
        
        mysqli_query($connection, "insert into kecamatan values ('$kecamatanID', '$kecamatanNama', '$kabupatenID')");
        header("location:kecamatan.php");
    }
        $datakabupaten=mysqli_query($connection,"select * from kabupaten");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kecamatan</title>
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
                <h1 class="display-4">Input Form Untuk Kecamatan</h1>
                
            </div>
        </div> <!-- penutup jumbotron -->


  <form method="POST">
  <div class="form-group row">
    <label for="kecamatanid" class="col-sm-2 col-form-label">Kode Kecamatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kecamatanid" name="inputid" placeholder="Kode Kecamatan" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="kecamatanNama" class="col-sm-2 col-form-label">Nama Kecamatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnama" id="kecamatanNama" placeholder="Nama Kecamatan">
    </div>
  </div>

  <div class="form-group row">
    <label for="kabupatenid" class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-10">
      <select class="form-control" name="inputkabid" id="kabupatenid">
          <?php while ($row=mysqli_fetch_array($datakabupaten))
          {
            ?>
            <option value = "<?php echo $row["kabupatenID"]?>">
            <?php echo $row["kabupatenID"]?>
            <?php echo $row["kabupatenNama"]?>
            </option>
            <?php } ?>
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
                <h1 class="display-4">Daftar Kecamatan</h1>
                <h2>Hasil Entry data pada Tabel</h2>
            </div>
        </div> <!-- penutup jumbotron -->

    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Nama Kecamatan</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" 
                value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Kecamatan">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
    </form>

        <table class="table table-hover table-success">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Kecamatan</th>
                    <th>Nama Kecamatan</th>
                    <th>Kode Kabupaten</th>
                    <th colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select kecamatan.*, kabupaten.kabupatenID, kabupaten.kabupatennama from kecamatan,kabupaten where kecamatanNama like'%".$search."%' and kecamatan.kabupatenID=kabupaten.kabupatenID" );
            }else
                {
                $query = mysqli_query($connection, "select kecamatan.*, kabupaten.kabupatenID, kabupaten.kabupatennama from kecamatan,kabupaten  where kecamatan.kabupatenID=kabupaten.kabupatenID");
                }
                
                

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['kecamatanID'];?></td>
                        <td><?php echo $row['kecamatanNama'];?></td>
                        <td><?php echo $row['kabupatenID'];?></td>
                        <td>
                        <a href="kecamatanedit.php?ubafoto=<?php echo $row['kecamatanID']?>" class="btn btn-success btn-sm" title="EDIT">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </a>
                        </td>

                        <td>
                        <a href="kecamatanhapus.php?hapusfoto=<?php echo $row['kecamatanID']?>" class="btn btn-danger btn-sm" title="DELETE">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </a>
                    </td>               
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

</body>
</html>

    