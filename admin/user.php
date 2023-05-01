<?php
include("inc_header.php");
if (!in_array("user", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}   
?>

<h1>Welcome, User</h1>

<?php
include("inc_footer.php");
?>