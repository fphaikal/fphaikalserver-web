<?php
    include("inc_header.php");
    if (!in_array("user", $_SESSION['admin_akses'])) {
        echo "Kamu tidak punya akses";
        include("inc_footer.php");
        exit();
    } 
?>
<?php 
    $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='$_SESSION[admin_username]'");
    $tdata = mysqli_fetch_array($data);

$judul = "";
$error = "";
$sukses = "";

if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $id_user = $tdata['username'];

    if($judul && $id_user) {
        $sql1 = "INSERT INTO todo(judul, id_user) values ('$judul', '$id_user')";
        $q1 = mysqli_query($koneksi, $sql1); 

        if($q1) {
            $sukses = "Data Berhasil Dimasukkan";
        } else {
            $error = "Gagal Memasukkan Data Baru";
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}

if(isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from todo where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1) {
        $sukses = "Berhasil Hapus Data";
    } else {
        $error = "Gagal Menghapus Data";
    }
}

if(isset($_GET['done'])){
    $status = 'close';

    if($_GET['status'] == 'open'){
        $status = 'close';
    }else{
        $status = 'open';
    }

    $q_update = "update todo set taskstatus = '".$status."' where id = '".$_GET['done']."' ";
    $run_q_update = mysqli_query($koneksi, $q_update);
}
?>
<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">To-Do List</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
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
                <form action="" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul ?>" placeholder="Apa yang Ingin Kamu Lakukan?">
                        <label for="floatingInput">Apa yang Ingin Kamu Lakukan?</label>
                    </div>
                    <input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Submit"/>    
                </form>
                
            </div>
        </div>              

        <div class="container shadow mt-3 mb-4 p-2 rounded-3 bg-white">
            <?php  
                $id_user = $_SESSION['admin_username'];          
                $ttodo = mysqli_query($koneksi, "SELECT * FROM todo WHERE id_user='$id_user'");
                while($data = mysqli_fetch_array($ttodo)):                 
            ?>
            <div class="card mb-2">
                <div class="task-item <?= $data['taskstatus'] == 'close' ? 'done':'' ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="window.location.href = '?done=<?= $data['id'] ?>&status=<?= $data['taskstatus'] ?>'" <?= $data['taskstatus'] == 'close' ? 'checked':'' ?>>
                                    <h5 class=""><?php echo $data['judul'] ?></h5>
                                    
                                </div>
                            </div>
                             
                            <div class="col-md-1">
                                <a href="?op=delete&id=<?php echo $data['id'] ?>">
                                    <button class="btn btn-sm"><i class="fa-solid fa-circle-xmark fa-2xl"></i></button> 
                                </a>                                 
                            </div>                        
                        </div>                  
                    </div> 
                    <div class="card-footer">
                        <small>Dibuat: <?php echo $data['date_time'] ?></small>
                    </div>
                </div>
            </div>                                
            <?php endwhile; ?>
                
        </div>
        
    </div>
    <div class="col-md-3"></div>
</div>

<?php
include("inc_footer.php");
?>