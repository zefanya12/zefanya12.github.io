<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $sql = "SELECT * FROM service_mobil WHERE id = $id";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data service mobil tidak ditemukan.";
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $merk_mobil = $_POST['merk_mobil;'];
    $jenis_service = $_POST['jenis_service'];
    $tanggal_service = $_POST['tanggal_service'];

    $sql = "UPDATE service_mobil SET nama_pelanggan='$nama_pelanggan', merk_mobil='$merk_mobil', jenis_service='$jenis_service', tanggal_service='$tanggal_service' WHERE id=$id";
    $result = $koneksi->query($sql);

    if ($result) {
        echo "<p>Data servis mobil berhasil diperbarui.</p>";
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error: " . $koneksi->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Service Mobil</h1>
    
    <form action="update_service.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required>

        <label for="merk_motor">Merk Mobil:</label>
        <input type="text" id="merk_motor" name="merk_mobil" value="<?php echo $row['merk_mobil']; ?>" required>

        <label for="jenis_service">Jenis Service:</label>
        <input type="text" id="jenis_service" name="jenis_service" value="<?php echo $row['jenis_service']; ?>" required>

        <label for="tanggal_service">Tanggal Service:</label>
        <input type="date" id="tanggal_service" name="tanggal_service" value="<?php echo $row['tanggal_service']; ?>" required>

        <button type="submit">Update Service Mobil</button>
    </form>

</body>
</html>