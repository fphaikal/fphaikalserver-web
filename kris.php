<?php 
    include './koneksi.php';

    if(isset($_POST['submit'])) {

        $simpan = mysqli_query($koneksi, "INSERT INTO kris(email,pesan)
                                          VALUES ('$_POST[temail]',
                                                  '$_POST[tpesan]')");

        if($simpan) {
            echo   "<script>
                        alert('Simpan data sukses!');
                        document.location='index.php?page=kris';
                    </script>";
        } else {
            echo   "<script>
            alert('Simpan data gagal!');
            document.location='index.php?page=kris';
        </script>";
        }
 
    }
        
    

?>