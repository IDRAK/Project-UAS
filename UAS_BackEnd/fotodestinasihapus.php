<?php 
ob_start();
session_start();
include "includes/config.php";
include "header.php";
if(isset($_GET['hapusfoto']))
{
    $fotokode = $_GET['hapusfoto'];
    $hapusfoto = mysqli_query($connection, "SELECT * from fotoDestinasi
    where fotoID = '$fotokode'");

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['fotoFile'];

    mysqli_query($connection, "DELETE from fotoDestinasi 
    where fotoID = '$fotokode'");

    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='fotoDestinasi.php'</script>";
}
include "footer.php";

mysqli_close($connection);
ob_end_flush();
?>