<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="b17b4e8f3e1175e7" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap/css/style.css">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8RB0TD7RE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q8RB0TD7RE');
</script>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark p-2 text-bg-dark" >
        <div class="container">
            <a class="navbar-brand" href="index.php">FPHaikal Server</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=vidpro">Video Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=phopro">Photo Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=docctr">Document Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="blog/blog-view.php">Blog</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>  


    
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <?php 
    include 'libs.php';
    include 'pages/footer.php';
    include 'koneksi.php';
?>
</body>



  
</html>