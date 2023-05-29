<?php
include("inc_header.php");  
?>

<?php 
$tampildata    =mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_SESSION[admin_username]'");
$data    =mysqli_fetch_array($tampildata);

$judul = "";
$isi = "";
$gambar = "";
$error = "";
$sukses = "";

if(isset($_POST['submit'])) {
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $author = $data['name'];
        $id_user = $data['username'];

        $sql1 = "insert into artikel(judul, isi, author, id_user) values ('$judul','$isi', '$author', '$id_user')";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1) {
            $sukses = "Data Berhasil Dimasukkan";
        } else {
            $error = "Gagal Memasukkan Data Baru";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
}
?>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Article</h1>
            </div>
        </div>        
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card p-3 shadow">
                <?php 
                    if($error) {
                ?> 
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error ?>
                    </div>        
                <?php 
                }
                ?>

                <?php 
                    if($sukses) {
                ?>        
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>  
                <?php 
                    }
                ?>    
            <form id="loginform" method="POST" role="form" class="user">                        
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul</label>
                    <input id="judul" name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Masukkan Isi Artikel</label>
                    <textarea rows="5" cols="50" wrap="soft" name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>                
                <div class="form-group mt-3">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit"/>    
                </div>
            </form>    
        </div>        
    </div>
</div>




<?php
    include("inc_footer.php");
?>