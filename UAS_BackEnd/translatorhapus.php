<?php 
ob_start();
session_start();
include "includes/config.php";
include "header.php";
if(isset($_GET['hapusfoto']))
{
    $fotokode = $_GET['hapusfoto'];
    $hapusfoto = mysqli_query($connection, "SELECT * from translator
    where translatorFoto = '$fotokode'");

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['translatorFoto'];

    mysqli_query($connection, "DELETE from translator 
    where translatorFoto = '$fotokode'");

    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='translator.php'</script>";
}
include "footer.php";

mysqli_close($connection);
ob_end_flush();
?>