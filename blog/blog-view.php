<?php
include("header.php");  
?>
<?php
$tampil = mysqli_query($koneksi, "SELECT * FROM artikel");
$data = mysqli_fetch_array($tampil);

$angka = 1;
$paragraf = $data['isi'];

?>
<head>
    <title>Blog | FPHaikal</title>
</head>
<body>
    <section class="p-5 text-bg-light text-center"> 
        <div class="container">
            <div class="align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2"><b>Blog</b></h1>
                    <p>FPHaikal</p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5 text-dark"> 
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id DESC");
                        while($data = mysqli_fetch_array($tampil)) {
                    
                        $paragraf = $data["isi"];

                            // pecah paragraf menjadi array kata
                            $kata = explode(" ", $paragraf);

                            // ambil sejumlah kata yang diinginkan
                            $jumlahKata = 25;
                            $kataBaru = array_slice($kata, 0, $jumlahKata);

                            // gabungkan kata-kata menjadi paragraf baru
                            $paragrafBaru = implode(" ", $kataBaru) . "...";

                            // tampilkan paragraf pada tag p
                            
                    ?>
                    <div class="card shadow mb-3 p-1">                    
                        <a href="../blog/artikel.php?id=<?php echo $data['id']; ?>" class="card-body">
                            <h4><?php echo $data['judul'] ?></h4>
                            <p id="paragraf"><?php echo $paragrafBaru; ?></p>
                            <p><?php echo $data['author'] ?> | <?php echo $data['update_at'] ?></p>    
                        </a>                                          
                    </div>
                <?php } ?>
                </div>                              
            </div>
        </div>
    </section>
</body>

<?php
include("footer.php");  
?>