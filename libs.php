<?php

if(isset($_GET['page'])) {

    $page = $_GET['page'];
    switch ($page) {

        case 'home' :
            include 'pages/home.html';
            break; 
        case 'vidpro' :
            include 'pages/vidpro.html';
            break;
        case 'phopro' :
            include 'pages/phopro.html';
            break; 
        case 'docctr' :
            include 'pages/docctr.html';
            break; 
        case 'about' :
            include 'pages/about.html';
            break;
        case 'kris' :
            include 'pages/kritik&saran.php';
            break;
        

        // Bagian Video Project
        case 'sejama' :
            include 'pages/_vidpro/sejarah_mataram_kuno.html';
            break;
        case 'ppdbsmtiyk' :
            include 'pages/_vidpro/ppdb_smtiyk.html';
            break;
        case 'kauman' :
            include 'pages/_vidpro/masjid_kauman.html';
            break;

        // Bagian Document Center
        case 'dipin' :
            include 'pages/_docctr/dibalik_pintu.html';
            break; 
        case 'sekeceh' :
            include 'pages/_docctr/sekeceh.html';
            break; 
        case 'selada' :
            include 'pages/_docctr/selada.html';
            break; 
    }

} else{
    include 'pages/home.html';
}

?>