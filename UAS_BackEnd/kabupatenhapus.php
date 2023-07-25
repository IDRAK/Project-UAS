<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto']))
    {
        $kodekab = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "DELETE  FROM kabupaten
            WHERE kabupatenID = '$kodekab'");
      
      

        // mysqli_query($connection, "DELETE FROM pesawat
        //     WHERE pesawatID = '$fotokode'");
        // unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='kabupaten.php'</script>";
    }
?>