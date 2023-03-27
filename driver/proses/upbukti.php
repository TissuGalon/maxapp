<?php
include '../../koneksi.php';
session_start();

$namafilebaru = "";

if (isset($_POST['ubah'])) {
    $target_dir = "../../img/bukti-kirim/";
    $temp = explode(".", $_FILES["foto"]["name"]);
    $namafilebaru = round(microtime(true)) . $_FILES["foto"]["name"];
    $target_file = $target_dir . $namafilebaru;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $id_pesanan = $_POST['id_pesanan'];

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

            $tglselesai = date("Y-m-d");
            $waktuselesai = date("H:i");

            $kueri = mysqli_query($conn, "UPDATE pesanan SET status_pesanan = 'selesai', bukti_kirim = '$namafilebaru', tgl_selesai = '$tglselesai' , waktu_selesai = '$waktuselesai', selesai = 'true' WHERE id_pesanan = '$id_pesanan'");
            $kueri2 = mysqli_query($conn, "UPDATE task_driver SET status = 'selesai', waktu_selesai = '$waktuselesai' WHERE id_pesanan = '$id_pesanan'");

        } else {
            echo "Maaf, ada kesalahan saat meng upload file.";
            $response = $respone . " " . "Maaf, ada kesalahan saat meng upload file.";
        }
    }

    header("location:../riwayat.php?response=" . $response . "&status=" . $uploadOk);


} ?>