<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $merk_mobil = $_POST['merk_mobil'];
    $jenis_service = $_POST['jenis_service'];
    $tanggal_service = $_POST['tanggal_service'];

    $sql = "INSERT INTO service_mobil (nama_pelanggan, merk_mobil, jenis_service, tanggal_service) VALUES ('$nama_pelanggan', '$merk_mobil', '$jenis_service', '$tanggal_service')";
    $result = $koneksi->query($sql);

    if ($result) {
        echo "<p>Service mobil berhasil ditambahkan.</p>";
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error: " . $koneksi->error . "</p>";
    }
}
?>