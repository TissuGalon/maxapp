<?php
include '../koneksi.php';
session_start();

$namafilebaru = "";

if (isset($_POST['tambah'])) {
    $target_dir = "../img/product/";
    $temp = explode(".", $_FILES["foto"]["name"]);
    $namafilebaru = round(microtime(true)) . $_FILES["foto"]["name"];
    $target_file = $target_dir . $namafilebaru;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $response = "";

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        /* echo "File adalah gambar - " . $check["mime"] . "."; */
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $response = $respone . " " . "File bukan gambar.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 5000000) {
        echo "Ukuran file terlalu besar.";
        $response = $respone . " " . "Ukuran file terlalu besar.";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Hanya ekstensi JPG, JPEG, PNG & GIF yang di dukung.";
        $response = $respone . " " . "Hanya ekstensi JPG, JPEG, PNG & GIF yang di dukung.";
        $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $response = $respone . " " . "File gagal di upload.";
        echo "File gagal di upload.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah diupload.";
            $response = $response . " " . "Foto berhasil di ubah.";

            $namafile = htmlspecialchars(basename($_FILES["foto"]["name"]));
            
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $stock = $_POST['stock'];
            $jenis = $_POST['jenis'];
            $subjenis = $_POST['subjenis'];
            $deskripsi = $_POST['deskripsi'];

            $merchant = $_SESSION['toko'];

            /* CEK ID PRODUK */
            /* RANDOM STRING */
            function generateRandomString($length = 15) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[random_int(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            /* RANDOM STRING */

            $idproduk = generateRandomString();
            $cekid = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$idproduk'");
            if(mysqli_num_rows($cekid) > 0){
                $idproduk = generateRandomString();
                
            }
            /* CEK ID PRODUK */

            $kueri = mysqli_query($conn, "INSERT INTO produk (id_produk, nama_produk,harga,stock,jenis,sub_jenis,deskripsi,id_merchant,gambar) VALUES ('$idproduk','$nama','$harga','$stock','$jenis','$subjenis','$deskripsi', '$merchant', '$namafilebaru')");
            $response = $respone . " " . "Produk berhasil ditambahkan.";
            /* header("location:../myproduk.php?response=" . $response . "&status=" . $uploadOk); */
            echo "<script>window.location.href = '../myproduk.php?response=" . $response . "&status=" . $uploadOk . "'</script>";

        } else {
            echo "Maaf, ada kesalahan saat meng upload gambar.";
            $response = $respone . " " . "Maaf, ada kesalahan saat meng upload gambar.";
            /* header("location:../tambah_produk.php?response=" . $response . "&status=" . $uploadOk); */
            echo "<script>window.location.href = '../tambah_produk.php?response=" . $response . "&status=" . $uploadOk . "'</script>";
        }
    }



} ?>