<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $namakegiatan = mysqli_real_escape_string($koneksi, $_POST['namakegiatan']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    // Cek apakah id sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM tambahdata WHERE id = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.php?status=gagal&pesan=No sudah terdaftar");
        exit();
    }
    
    // Query tambah data
    $query = "INSERT INTO tambahdata (id, namakegiatan, waktu,deskripsi) VALUES ('$id', '$namakegiatan', '$waktu', '$deskripsi')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
} else {
    header("Location: index.php");
}
?>