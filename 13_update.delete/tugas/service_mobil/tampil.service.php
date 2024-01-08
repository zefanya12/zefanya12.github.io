<?php
include('koneksi.php');

$sql = "SELECT * FROM service_mobil";
$result = $koneksi->query($sql);

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nama Pelanggan</th>
        <th>Merk Mobil</th>
        <th>Jenis Service</th>
        <th>Tanggal Service</th>
        <th>Aksi</th> <!-- Kolom baru untuk tombol aksi -->
      </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_pelanggan']}</td>
                <td>{$row['merk_mobil']}</td>
                <td>{$row['jenis_service']}</td>
                <td>{$row['tanggal_service']}</td>
                <td>
                    <a href='update_service.php?id={$row['id']}'>Update</a>
                    <a href='hapus_service.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data service mobil.</td></tr>";
}

echo "</table>";

$koneksi->close();
?>