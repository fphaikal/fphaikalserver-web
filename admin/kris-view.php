<?php
include("inc_header.php");
if (!in_array("user", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}   


?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kritik & Saran</h1>
    </div>
    <div class="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>

            <?php
                if(isset($_GET['op'])) {
                    $op = $_GET['op'];
                } else {
                    $op = "";
                }
                if($op == 'delete') {
                    $id = $_GET['id'];
                    $sql1 = "delete from kris where id = '$id'";
                    $q1 = mysqli_query($koneksi, $sql1);
                    if($q1) {
                        $sukses = "Berhasil Hapus Data";
                    } else {
                        $error = "Gagal Menghapus Data";
                    }
                }

                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM kris ORDER BY id ");
                while($data = mysqli_fetch_array($tampil)) :
            ?>

            <tbody>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['pesan'] ?></td>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <td>
                            <a href="kris-view.php?op=delete&id=<?php echo $data['id'] ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button> </a>
                        </td>
                    <?php } ?>
                </tr>                    
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<?php
include("inc_footer.php");
?>