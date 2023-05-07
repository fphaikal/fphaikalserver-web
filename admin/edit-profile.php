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
$login_id = "";
$name = "";
$username = "";
$email = "";
$password = "";
$gender = "";
$sukses   = "";
$error    = "";

    $sql1 = "SELECT * FROM admin WHERE username='$_SESSION[admin_username]'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $name = $r1['name'];
    $username = $r1['username'];
    $email = $r1['email'];
    $gender = $r1['gender'];
    $password = $r1['password'];
    $login_id = $r1['login_id'];

    if($name == '') {
        $error = "Data tidak ditemukan"; 
    }


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    if($login_id && $name && $username && $email && $gender && $password) {
            $sql1       = "update admin set name='$name', login_id='$login_id', username='$username', email='$email', gender='$gender', password=md5('$password') where username='$_SESSION[admin_username]'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } 
    } else {
        $error = "Silahkan masukkan semua data";
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
                <h1 class=" mb-0 text-gray-800">Edit Profile</h1>
            </div>
        </div>            
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="editform" class="card shadow mb-4">
                <div class="card-header">
                    Edit Akun
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
                        <div class="row">
                            <div class="col-md-3">
                                <select id="gender" name="gender" class="form-select rounded-2" aria-label="Default select example">
                                    <option selected>Gender</option>
                                    <option value="laki" <?php if($gender == "laki") echo "selected" ?>>Laki-Laki</option>
                                    <option value="perempuan" <?php if($gender == "perempuan") echo "selected" ?>>Perempuan</option>
                                </select>        
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mt-3">
                                <input type="submit" name="submit" class="btn btn-success" value="Edit"/>  
                                <a href="profile.php" class="btn btn-secondary">Cancel</a>  
                            </div>                                
                        </div>                    
                    </form>                    
                </div>
            </div>
        </div>
    </div>
        
</div>

<?php
include("inc_footer.php");
?>