<?php
// Panggil file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tb_mahasiswa
$query = "SELECT * FROM tambahdata";
$result = mysqli_query($koneksi, $query);



// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>No</th><th>Nama Kegiatan</th><th>Waktu Kegiatan</th><th>Deskripsi</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['namakegiatan'] . "</td>";
        echo "<td>" . $row['waktu'] . "</td>";
        echo "<td>" . $row['deskripsi'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>
