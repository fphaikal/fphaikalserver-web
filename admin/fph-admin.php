<?php
include("inc_header.php");
?>
<?php 
    $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $tanggal = date("Ymd");
    $waktu = time();
    $bln=date("m");
    $tgl=date("d");
    $blan=date("Y-m");
    $thn=date("Y");
    $tglk=$tgl-1;
    $s = mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE ip='$ip' AND tanggal='$tanggal'");

    if($tglk=='1' | $tglk=='2' | $tglk=='3' | $tglk=='4' | $tglk=='5' | $tglk=='6' | $tglk=='7' | $tglk=='8' | $tglk=='9'){
        $kemarin=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$thn-$bln-0$tglk'");
    } else {
        $kemarin=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$thn-$bln-$tglk'");
    }
    $bulan=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal LIKE '%$blan%'");
    $bulan1=mysqli_num_rows($bulan); //
    $tahunini=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal LIKE '%$thn%'");
    $tahunini1=mysqli_num_rows($tahunini); //
    $pengunjung = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$tanggal' GROUP BY ip")); // Hari Ini
    $totalpengunjung = mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(hits) FROM tbvisit")); 
    $hits = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(hits) as hitstoday FROM tbvisit WHERE tanggal='$tanggal' GROUP BY tanggal")); //Hits Count
    $totalhits1 =mysqli_query($koneksi,"SELECT SUM(hits) FROM tbvisit");
    $test=mysqli_fetch_array($totalhits1);
    $totalhits=$test[0]; //
    $bataswaktu = time() - 900;
    $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE online > '$bataswaktu'")); //
    $kemarin1 = mysqli_num_rows($kemarin); //
?>

<?php            
    $no = "";
    $tampil = mysqli_query($koneksi, "SELECT login_id FROM admin WHERE login_id= 2;");
    $total_user = mysqli_num_rows($tampil);

    $tampildata    =mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_SESSION[admin_username]'");
    $data    =mysqli_fetch_array($tampildata);
?>
<head>
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->   
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <b><?php echo $data['name'] ?></b></h1>
</div>
<div class="row">
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/Carousel 1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Visitor Statistic</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card border-left-success shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Hits Pengunjung</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalhits ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="card border-left-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pengunjung Kemarin</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $kemarin1 ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card border-left-warning shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Pengunjung Bulan Ini</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $bulan1 ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="card border-left-danger shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Pengunjung Hari Ini</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $pengunjung ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Info Lain</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                            <div class="card border-left-info shadow h-100 p-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $total_user ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        <?php } ?>     
                    </div>
                       
                </div>
                  
            </div>
        </div>   
    </div>
</div>
</div>
</div>



<?php
include("inc_footer.php");
?>