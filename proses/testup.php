<?php
include '../koneksi.php';
session_start();


if (isset($_POST['ubah'])) {
    $target_dir = "../img/user-image/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
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
        && $imageFileType != "gif" && $imageFileType != "webp"
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
            $response = $respone . " " . "Foto berhasil di ubah.";


            $namafile = htmlspecialchars(basename($_FILES["foto"]["name"]));
            $iduser = $_SESSION['iduser'];
            $kueri = mysqli_query($conn, "UPDATE user SET foto='$namafile' WHERE id_user='$iduser'");
        } else {
            echo "Maaf, ada kesalahan saat meng upload file.";
            $response = $respone . " " . "Maaf, ada kesalahan saat meng upload file.";
        }
    }

    header("location:../upfoto.php?response=" . $response . "&status=" . $uploadOk);


} ?>