<?php
include("inc_header.php");
if (!in_array("admin", $_SESSION['admin_akses'])) { ?>
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
$login_id = "";
$name = "";
$username = "";
$email = "";
$password = "";
$sukses   = "";
$error    = "";

if(isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from admin where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $name = $r1['name'];
    $username = $r1['username'];
    $email = $r1['email'];
    $password = $r1['password'];
    $login_id = $r1['login_id'];

    if($name == '') {
        $error = "Data tidak ditemukan"; 
    }
}

if($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from admin where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1) {
        $sukses = "Berhasil Hapus Data";
    } else {
        $error = "Gagal Menghapus Data";
    }
}

if(isset($_POST['submit'])) {
    $login_id = $_POST['login_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($login_id && $name && $username && $email && $password) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update admin set name='$name', login_id='$login_id', username='$username', email='$email', password=md5('$password') where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else {
            $sql1 = "insert into admin(login_id, name, username, email, password) values ('$login_id','$name','$username', '$email', md5('$password')) ";
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
}

?>

<head>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>

        <div class="ml-auto">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal" >Add Account</a>
        </div>    
    </div>
    
    <div id="editform" class="card shadow mb-4">
            <div class="card-header">
                Data Akun
            </div>
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
                        <th>Role</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT login_id, id, name, username, email, password FROM admin");
                    while($data = mysqli_fetch_array($tampil)) :
                
                ?>

                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php 
                                if($data['login_id'] ==  "1") {
                                    echo "<p>Admin</p>";
                                } else {
                                    echo "<p>User</p>";
                                }
                            ?>
                        </td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['password'] ?></td>                    
                        <td>
                            <a href="edit-user.php?op=edit&id=<?php echo $data['id'] ?>"><button class="btn btn-warning">Edit</button> </a>
                            <a href="edit-user.php?op=delete&id=<?php echo $data['id'] ?>"><button  class="btn btn-danger">Delete</button> </a>                       
                        </td>
                    </tr>                    
                </tbody>
                <?php endwhile; ?>
            </table>                       
            </div>
        </div>
    <div class="">
        

        <div id="editform" class="card shadow mb-4">
            <div class="card-header">
                Edit Akun
            </div>
            <div class="card-body">                                    
                <form id="loginform" method="POST" role="form" class="user">                        
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                                id="name" name="name" value="<?php echo $name ?>" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                                id="username" name="username" value="<?php echo $username ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user"
                                id="email" name="email" value="<?php echo $email ?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input id="password" type="text" class="form-control form-control-user" 
                            name="password" value="" placeholder="Password">
                    </div>
                    <select id="login_id" name="login_id" class="form-select rounded-2" aria-label="Default select example">
                        <option selected>Role</option>
                        <option value="1" <?php if($login_id == "1") echo "selected" ?>>Admin</option>
                        <option value="2" <?php if($login_id == "2") echo "selected" ?>>User</option>
                    </select>
                    <div class="row">
                        <div class="mt-3">
                            <input type="submit" name="submit" class="btn btn-success" value="Edit"/>  
                            <a href="edit-user.php" class="btn btn-secondary">Cancel</a>  
                        </div>                                
                    </div>                    
                </form>                    
            </div>
        </div>                        
    </div>
</div>

<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">                  

                    <p>Isikan data di bawah ini dengan benar.</p>
                    
                    <form id="loginform" method="POST" role="form" class="user">                        
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                    id="name" name="name" value="<?php echo $name ?>" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                    id="username" name="username" value="<?php echo $username ?>" placeholder="Enter Your Username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user"
                                    id="email" name="email" value="<?php echo $email ?>" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-control-user" 
                                    name="password" value="<?php echo $password ?>" placeholder="Enter Password">
                        </div> 
                        <select id="login_id" name="login_id" class="form-select" aria-label="Default select example">
                            <option selected>Select Role</option>
                            <option value="1" <?php if($login_id == "1") echo "selected" ?>>Admin</option>
                            <option value="2" <?php if($login_id == "2") echo "selected" ?>>User</option>
                        </select>
                        <div class="form-group mt-3">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="submit" class="btn btn-success" value="Submit"/>    
                        </div>
                    </form>                              
                </div>                
            </div>
        </div>
</div>

<script>
    
</script>

<?php
include("inc_footer.php");
?>