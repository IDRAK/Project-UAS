<?php 
include "includes/config.php";
if(isset($_GET['hapus']))
{
    $kodekategori = $_GET["hapus"];
    mysqli_query($connection, "DELETE FROM kategori 
    WHERE kategoriID = '$kodekategori'");

    echo "<script>alert ('DATA BERHASIL DI HAPUS');
        document.location='kategori.php'
    </script>";
}

?>