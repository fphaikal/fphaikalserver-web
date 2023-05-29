<?php

    if (isset($_POST['submit'])) {
        //Include file koneksi, untuk koneksikan ke database
        include '../koneksi.php';
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $ekstensi_diperbolehkan	= array('png','jpg');
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];
            
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $gambar = $_FILES["gambar"]["name"];
            $author = $data['name'];
            $id_user = $data['username'];
            
            $sql1 = "insert into artikel(judul, isi, author, id_user) values ('$judul','$isi', '$author', '$id_user')";
            $q1 = mysqli_query($koneksi, $sql1);
            

            if (!empty($gambar)){
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    
                    //Mengupload gambar
                    move_uploaded_file($file_tmp, 'gambar/'.$gambar);

                    $sql="insert into gambar (gambar) values ('$gambar')";

                    $simpan_bank=mysqli_query($kon,$sql);

                    if ($simpan_bank) {
                        header("Location:index.php?add=berhasil");
                    }
                    else {
                        header("Location:index.php?add=gagal");
                    }
                    
                }
            }else {
                $gambar="bank_default.png";
            }
        }

    }
?>