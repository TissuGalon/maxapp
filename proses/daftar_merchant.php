<?php
include '../koneksi.php';
session_start();

$namafilebaru = "";

if (isset($_POST['daftar'])) {
    $target_dir = "../img/merchant-image/";
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
            $response = $respone . " " . "Daftar merchant berhasil.";

            $namafile = htmlspecialchars(basename($_FILES["foto"]["name"]));

            $nama = $_POST['nama'];
            $lokasi = $_POST['alamat'];
            $latitude = $_POST['x'];
            $longtitude = $_POST['y'];
            $nohp = $_POST['nohp'];
            $deskripsi = $_POST['deskripsi'];

            $iduser = $_SESSION['iduser'];
            

            /* ------------------------------------- */
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

            $id_merchant = generateRandomString();

            $cekid = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$id_merchant'");
            if(mysqli_num_rows($cekid) > 0){
                $id_pembayaran = generateRandomString();
            }
            /* ------------------------------------- */


            $kueri = mysqli_query($conn, "INSERT INTO merchant (id_merchant, nama, lokasi, latitude, longtitude, nohp, avatar, text_bio) VALUES ('$id_merchant','$nama', '$lokasi', '$latitude', '$longtitude', '$nohp', '$namafilebaru', '$deskripsi')");
            $kueri2 = mysqli_query($conn, "UPDATE user SET id_merchant = '$id_merchant' WHERE id_user = '$iduser'");

            $_SESSION['toko'] = $id_merchant;

        } else {
            echo "Maaf, ada kesalahan saat meng upload file.";
            $response = $respone . " " . "Maaf, ada kesalahan saat meng upload file.";
        }
    }

    header("location:../daftar_merchant.php?response=" . $response . "&status=" . $uploadOk . "&id=" . $idproduk);


} ?>