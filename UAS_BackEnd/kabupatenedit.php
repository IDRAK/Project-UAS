<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabupaten</title>
    <link rel="relstylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/cp.png">

</head>

<?php 

    include "includes/config.php";
    if(isset($_POST["batal"]))
    {
        header("location:kabupaten.php");
    }

    if(isset($_POST['ubah']))
    {
        $kodekab = $_POST['inputkode'];
        $namakab = $_POST['inputnama'];
        $provinsiID = $_POST['inputID'];

        if(!empty($kodekab)){

        
        mysqli_query($connection, "UPDATE kabupaten set kabupatenID='$kodekab',kabupatenNama='$namakab',provinsiID = '$provinsiID'
        where kabupatenID = '$kodekab'");

        header("location:kabupaten.php");
        }
        
    }
    $datakategori = mysqli_query($connection, "select * from provinsi");
    $kodekab1 = $_GET["ubafoto"];
    $editkab = mysqli_query($connection,"SELECT * from kabupaten
    where kabupatenID = '$kodekab1'");
    
    $rowedit = mysqli_fetch_array($editkab);

?>


<body>
<?php
    include "header.php";
?>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Edit Form Kabupaten</h1>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="kodekabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kodekabupaten" name="inputkode" value="<?php echo $rowedit["kabupatenID"]?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namakabupaten" name="inputnama" value="<?php echo $rowedit["kabupatenNama"]?>">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="provinsiID" class="col-sm-2 col-form-label">Provinsi ID</label>
            <div class="col-sm-10">
            <select id="provinsiID" class="form-control" name="inputID">

<?php while ($row = mysqli_fetch_array($datakategori)) {  ?>

    <option value="<?php echo $row["provinsiID"] ?>">
        <?php echo $row["provinsiID"] ?>
        <?php echo $row["provinsiNama"] ?>

    </option>

<?php  }  ?>

</select>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" name="ubah" class="btn btn-primary" value="Ubah">
                <input type="submit" name="batal" class="btn btn-secondary" value="Batal">
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
                <h1 class="display-4">Daftar hasil Edit Kabupaten</h1>
            </div>
        </div>



    <table class="table table-hover table-danger">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Kabupaten</th>
                <th>Nama Kabupaten</th>
                <th>Kode Pos</th>
                <th colspan="2" style="text-align: center">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php $query = mysqli_query($connection, "select * from kabupaten");
            $nomor = 1;
            while($row = mysqli_fetch_array($query))
            { ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row['kabupatenID']?></td>
                    <td><?php echo $row['kabupatenNama']?></td>
                    <td><?php echo $row['provinsiID']?></td>
                    

                    <td>
                        <a href="kabupatenedit.php?ubafoto=<?php echo $row['kabupatenID']?>" class="btn btn-success btn-sm" title="EDIT">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
                        </a>
                    </td>        

                    <td>
                        <a href="kabupatenhapus.php?hapusfoto=<?php echo $row['kabupatenID']?>" class="btn btn-danger btn-sm" title="DELETE">
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
<?php
    include "footer.php";
?>
</body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"></script>
</html>