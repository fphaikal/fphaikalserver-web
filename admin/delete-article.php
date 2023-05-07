<?php
    // Include file config.php untuk koneksi ke database
    include("koneksi.php");
    
    // Ambil ID artikel dari URL
    $id = $_GET['id'];
    
    // Query untuk menghapus artikel dari database
    $sql = "DELETE FROM artikel WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: list-article.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
?>
