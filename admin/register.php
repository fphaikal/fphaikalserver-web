<?php
include("../koneksi.php");

$login_id = "";
$email = "";
$name = "";
$username = "";
$password1 = "";
$password2 = "";
$sukses   = "";
$error    = "";

if(isset($_POST['submit'])) {
    $login_id = $_POST['login_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password'];

    if($login_id && $email && $name && $username && $password1 && $password2) {
        $sql1 = "insert into admin(login_id, email, name, username, password) values ('$login_id', '$email', '$name', '$username', md5('$password1')) ";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1) {
            header("location:fph-admin.php");
        } else {
            $error = "Gagal Membuat Akun";
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="bg-gradient-dark">
    <div class="container">
        <?php 
            if($error) {
        ?> 
            <div class="alert alert-warning mt-3" role="alert">
                <?php echo $error ?>
            </div>        
        <?php 
            }
        ?>

        <div class="card o-hidden border-0 shadow-lg my-5">            
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->                
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="loginform" method="POST" role="form" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                            id="name" name="name" value="<?php echo $name ?>" placeholder="First Name">                                
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                    id="email" name="email" value="<?php echo $email ?>" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                    id="username" name="username" value="<?php echo $username ?>" placeholder="Username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" value="<?php echo $password1 ?>" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        id="password" name="password" value="<?php echo $password2 ?>" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <select id="login_id" name="login_id" class="form-select form-select-md mb-3 rounded-5" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if($login_id == "1") echo "selected" ?> disabled>Admin</option>
                                    <option value="2" <?php if($login_id == "2") echo "selected" ?>>User</option>
                                </select>
                                <input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Submit"/>
                                <hr> 
                            </form>                             
                            <div class="text-center ">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>