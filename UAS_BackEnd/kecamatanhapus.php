<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto']))
    {
        $kodekec = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "DELETE  FROM kecamatan
            WHERE kecamatanID = '$kodekec'");
      
      

        // mysqli_query($connection, "DELETE FROM pesawat
        //     WHERE pesawatID = '$fotokode'");
        // unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='kecamatan.php'</script>";
    }
?>