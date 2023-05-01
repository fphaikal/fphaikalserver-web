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

<head>
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="align-items-center justify-content-between mb-4">
                <h1 class=" mb-0 text-gray-800">Profile</h1>
            </div>
        </div>            
    </div>
    
    <?php 
        $tampildata = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_SESSION[admin_username]'");
        $data       = mysqli_fetch_array($tampildata);
    ?>

    <div class="row mt-2">
        <div class="col-md-1"></div>
        <div class="col-md-5">            
            <h6><b>Name     : </b> <?php echo $data['name']; ?></h6>
            <hr>
            <h6><b>Username : </b>  <?php echo $data['username']; ?></h6>
            <hr>
            <h6><b>Email    : </b>  <?php echo $data['email']; ?></h6>
            <hr>
            <h6><b>Gender: </b>
                <?php 
                    if($data['gender'] == "laki") {
                        echo "Laki-Laki";
                    } else if($data['gender'] == "perempuan") {
                        echo "Perempuan";
                    } else {
                        echo "Tidak Ada";
                    }
                ?>
            </h6>
            <div class="ml-auto mt-4">
                <a href="edit-profile.php" class="btn btn-sm btn-dark">Edit Account</a>
            </div>   
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 ">    
            <div class="text-center">
                <?php             
                    if($data['gender'] == "laki") {
                ?>
                    <img src="img/undraw_profile_2.svg" alt="">
                <?php      
                    } else if ($data['gender'] == "perempuan") {
                ?>
                    <img src="img/undraw_profile_3.svg" alt="">
                <?php
                    } else {
                ?>
                    <img src="img/profile-default.svg" class="img-fluid" alt="">
                <?php
                    }            
                ?>    
            </div>          
            
        </div>
        <div class="col-md-1"></div>
    </div>
</div>    



<?php
include("inc_footer.php");
?>