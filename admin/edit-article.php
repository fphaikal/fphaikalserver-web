<?php
include("inc_header.php");
if (!in_array("user", $_SESSION['admin_akses'])) { ?>
    <div class="container">
        <div class="alert alert-warning" role="alert">
            Kamu Tidak Punya Akses!
        </div>    
    </div>
    
<?php
    include("inc_footer.php");
    exit(); }  
?>

<?php
$judul = "";
$isi = "";
// Ambil ID artikel dari URL
$id = $_GET['id'];

// Ambil data dari formulir jika ada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    // Query untuk mengupdate artikel di database
    $sql = "UPDATE artikel SET judul='$judul', isi='$isi', update_at=NOW() WHERE id=$id";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "Sukses";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Query untuk mengambil artikel berdasarkan ID
$sql = "SELECT * FROM artikel WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

// Cek apakah artikel ditemukan
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
}

?>

<head>
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="align-items-center justify-content-between mb-4">
                <h1 class=" mb-0 text-gray-800">Edit Artikel</h1>
            </div>
        </div>            
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card p-3 mb-5 shadow">
                <form id="loginform" method="POST" role="form" class="user">                        
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input id="judul" name="judul" value="<?php echo $row['judul'] ?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Judul">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Masukkan Isi Artikel</label>
                        <textarea rows="15" cols="10" wrap="soft" id="isi" name="isi" class="form-control"><?php echo $row['isi'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit"/>    
                    </div>
                </form>    
            </div>        
        </div>
    </div>
        
</div>

<?php
include("inc_footer.php");
?>