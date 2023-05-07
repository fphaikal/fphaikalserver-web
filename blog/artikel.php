<?php
    include("koneksi.php");
    
    // Ambil ID artikel dari URL
    $id = $_GET['id'];
    
    // Query untuk mengambil artikel berdasarkan ID
    $sql = "SELECT * FROM artikel WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    
    // Cek apakah artikel ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Artikel tidak ditemukan";
        exit;
    }
?>
<?php
include("header.php");  
?>

<head>
    <title><?php echo $row['judul']; ?></title>
</head>
<body>
<section class="p-5 text-bg-light text-center"> 
        <div class="container">
            <div class="align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2"><b><?php echo $row['judul']; ?></b></h1>
                    <p><?php echo $row['author']; ?> | Diperbarui: <?php echo $row['update_at']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5 text-dark"> 
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <div class="align-items-center justify-content-between">
                        <div>
                            <p wrap="soft" ><?php echo nl2br($row['isi']) ?></p>  
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
</body>

<?php
include("footer.php");  
?>