<?php 
    include "includes/config.php";
    if(isset($_GET['hapusfoto']))
    {
        $kodeprov = $_GET['hapusfoto'];
        $hapusfoto = mysqli_query($connection, "DELETE  FROM provinsi
            WHERE provinsiID = '$kodeprov'");
      
      

        // mysqli_query($connection, "DELETE FROM pesawat
        //     WHERE pesawatID = '$fotokode'");
        // unlink('images/'.$namafile);

        echo "<script>alert('DATA TELAH DIHAPUS');
        document.location='provinsi.php'</script>";
    }
?>