<?php
// include 'database.php';
// $db_0054 = new Database();

// $aksi = $_GET['aksi'];

// if ($aksi == 'tambah') {

//     $db_0054->tambahData($_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $_POST['gambar']);
//     header("location:index.php?status=success");

// } elseif ($aksi == 'update'){
//     $db_0054->updateData($_POST['id'], $_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $_POST['gambar']);
//     header("location:index.php");
    
// } elseif ($aksi == 'hapus'){
//     $db_0054->hapusData($_GET['id']);
//     header("location:index.php");
// }

include 'database.php';
$db_0054 = new Database();

$aksi = $_GET['aksi'];

function uploadGambar() {
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $targetDir = "uploads/"; // Direktori untuk menyimpan gambar
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
        }

        $fileName = basename($_FILES['gambar']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png']; // Format yang diizinkan

        if (!in_array($fileExt, $allowedTypes)) {
            return false; // Tipe file tidak diizinkan
        }

        $fileNewName = uniqid() . '.' . $fileExt;
        $targetFile = $targetDir . $fileNewName;

        // Pindahkan file yang diupload ke direktori target
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            return $targetFile; // Mengembalikan path file gambar
        } else {
            return false; // Gagal upload
        }
    }
    return false;
}

if ($aksi == 'tambah') {
    $gambar = uploadGambar(); // Panggil fungsi upload gambar

    if ($gambar) {
        // Tambahkan data ke database bersama dengan path gambar
        $db_0054->tambahData($_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $gambar);
        header("location:index.php?status=success");
        exit();
    } else {
        header("location:index.php?status=error"); // Jika upload gambar gagal
        exit();
    }
}

elseif ($aksi == 'update') {
    $gambarLama = $_POST['gambar_lama']; // Gambar lama dari input tersembunyi
    $gambarBaru = uploadGambar(); // Upload gambar baru jika ada

    if ($gambarBaru) {
        // Jika ada gambar baru, gunakan gambar baru dan hapus gambar lama jika ada
        if (file_exists($gambarLama)) {
            unlink($gambarLama); // Hapus gambar lama dari server
        }
        $gambar = $gambarBaru;
    } else {
        // Jika tidak ada gambar baru, tetap gunakan gambar lama
        $gambar = $gambarLama;
    }

    $db_0054->updateData($_POST['id'], $_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $gambar);
    header("location:index.php?");
    exit();
}

elseif ($aksi == 'hapus') {
    // Ambil data gambar sebelum menghapus dari database
    $detail = $db_0054->editData($_GET['id']); // Ambil detail data berdasarkan ID
    $gambar = $detail[0]['gambar']; // Asumsikan dataUser berisi array, jadi ambil elemen pertama

    // Hapus data dari database
    $db_0054->hapusData($_GET['id']);

    if ($gambar && file_exists($gambar)) {
            unlink($gambar); // Menghapus file gambar dari server
    }

    header("location:index.php?");
    exit();
}



?>