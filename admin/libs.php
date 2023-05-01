<?php

if(isset($_GET['page'])) {

    $page = $_GET['page'];
    switch ($page) {

        case 'login' :
            include 'login.php';
            break; 
        case 'logout' :
            include 'logout.php';
            break;
        case 'home' :
            include 'fph-admin.php';
            break; 
        case 'kris' :
            include 'kris-view.html';
            break;
    }

} else{
    include 'fph-admin.php';
}

?>