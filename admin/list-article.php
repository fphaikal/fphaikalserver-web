<?php
include("inc_header.php"); 
?>

<?php
$sukses   = "";
$error    = "";

if(isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from artikel where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1) {
        $sukses = "Berhasil Hapus Data";
    } else {
        $error = "Gagal Menghapus Data";
    }
}

?>

<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Article</h1>
        <div class="ml-auto">
            <a href="add-article.php" class="btn btn-primary" >Add Article</a>
        </div>    
    </div>
    
    <div id="editform" class="card shadow mb-4">
            
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
                <table class="table table-bordered">
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>                        
                    </tr>
                </thead>

                <?php
                    $no = 1;
                    $id_user = $_SESSION['admin_username']; 
                    $tampil = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_user='$id_user'");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>

                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>                        
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['author'] ?></td>
                        <td ><?= $data['tanggal'] ?></td>
                        
                        <td>
                            <a target="_blank" href="../blog/artikel.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm mb-1">Go To Page</a>
                            <a href="edit-article.php?id=<?php echo $data['id']; ?>"><button class="btn btn-warning btn-sm mb-1">Edit</button> </a>
                            <a href="list-article.php?op=delete&id=<?php echo $data['id'] ?>"><button  class="btn btn-danger btn-sm">Delete</button> </a>                       
                        </td>
                    </tr>                    
                </tbody>
                <?php endwhile; ?>
            </table>                       
            </div>
        </div>
</div>


<script>
    
</script>

<?php
include("inc_footer.php");
?>