<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Destinasi</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" >
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/cp.png">
</head>

<?php 
    ob_start();
    session_start();
    include "includes/config.php";
    include "header.php";
    if(isset($_POST['Simpan']))
    {
        $kodefoto = $_POST['inputkode'];
        $namafoto = $_POST['inputnama'];
        $kodedestinasi = $_POST['kodedestinasi'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        $ektensifile = pathinfo($nama, PATHINFO_EXTENSION);

        // periksa ekstension file harus JPG atau jpg
        if(($ektensifile == "jpg") or ($ektensifile == "JPG"))
            {
                move_uploaded_file($file_tmp, 'images/'.$nama);
                // unggah file ke folder images
                mysqli_query($connection, "insert into fotoDestinasi value ('$kodefoto','$namafoto','$kodedestinasi','$nama')");
                header("location:fotoDestinasi.php");
            }
    }

    $datadestinasi = mysqli_query($connection, "Select * from destinasi");

?>



<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h1 class="display-4">Input Photo Destinasi Wisata</h1>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
         <div class="form-group row">
            <label for="kodefoto" class="col-sm-2 col-from-label">Kode Photo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kodefoto" name="inputkode"
                placeholder="kode Photo" maxlength="4">
            </div>
         </div>


         <div class="form-group row">
            <label for="namafoto" class="col-sm-2 col-from-label">Nama Photo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namafoto" name="inputnama"
                placeholder="Nama Photo">
            </div>
         </div>

         <div class="form-group row">
            <label for="namadestinasi" class="col-sm-2 col-from-label">Nama Destinasi</label>
            <div class="col-sm-10">
             <select class="form-control" id="namadestinasi" name="kodedestinasi">
                 <?php while($row = mysqli_fetch_array($datadestinasi))
                 {?>
                        <option value="<?php echo $row["destinasiID"]?>">
                            <?php echo $row["destinasiID"]?>
                            <?php echo $row["destinasiNama"]?>
                        </option>

                 <?php } ?>

             </select>
            </div>
         </div>

         <div class="form-group row">
            <label for="file" class="col-sm-2 col-from-label">Photo Wisata</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="file">
                <p class="help-block">Field ini di gunakan untuk unggah file (format .jpg)</p>
            </div>
         </div>
         
         <div class="form-group row">
             <div class="col-sm-2"></div>
             <div class="col-sm-10">
                 <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
                 <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
             </div>

         </div>

        

        </form>
    </div>

 <div class="col-sm-1"></div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Daftar Photo Destinasi Wisata</h1>
            </div>
        </div> 
        <table class="table table-hover table-danger">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Photo</th>
                <th>Nama Photo Wisata</th>
                <th>Kode Destinasi</th>
                <th>Photo Destinasi</th>
                <th colspan="2" style="text-align: center;">Action</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $query = mysqli_query($connection, "select * from fotoDestinasi");
            $nomor = 1;
            while ($row = mysqli_fetch_array($query))
            { ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row['fotoID'];?></td>
                    <td><?php echo $row['fotoNama'];?></td>
                    <td><?php echo $row['destinasiID'];?></td>
                    <td>
                        <?php if(is_file("images/".$row['fotoFile']))
                        {?>
                            <img src="images/<?php echo $row['fotoFile']?>" width="80">

                        <?php } else 
                            echo "<img src='images/noimages.png' width='80'>"                        
                        ?> 
                    </td>

                    <td>
                        <a href="fotodestinasiedit.php?ubahfoto=<?php echo $row['fotoID']?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>

                    <td>
                    <a href="fotodestinasihapus.php?hapusfoto=<?php echo $row['fotoID']?>" class="btn btn-danger btn-sm" title="DELETE">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                     <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                     </svg>
                    </a>
                    </td>
                </tr>
            <?php $nomor = $nomor + 1;?>
            <?php }
            ?>

        </tbody>

    </table>

    </div>
    <div class="col-sm-1"></div>
</div>


<?php 
mysqli_close($connection);
ob_end_flush();
?>

<?php include "footer.php" ?>
</body>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</
</html>