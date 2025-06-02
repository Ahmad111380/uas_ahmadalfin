<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "Data tidak ditemukan.";
    exit;
}

$id = $_GET['id'];

// Ambil data dari database
$ambilData = mysqli_query($koneksi, "SELECT * FROM tambahdata WHERE id='$id'");
$data = mysqli_fetch_array($ambilData);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses update jika form disubmit
if (isset($_POST['simpan'])) {
    $NoBaru = $_POST['id'];
    $namakegiatan = $_POST['namakegiatan'];
    $waktu = $_POST['waktu'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($koneksi, "UPDATE tambahdata SET 
        id='$NoBaru',
        namakegiatan='$namakegiatan',
        waktu='$waktu',
        deskripsi='$deskripsi' 
        WHERE id='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kegiatan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 5px 10px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background-color: #4CAF50; color: white; border: none; }
        .btn-primary:hover { background-color: #45a049; }
        .btn-secondary { background-color: #607D8B; color: white; border: none; text-decoration: none; padding: 6px 12px; }
        .btn-secondary:hover { background-color: #546E7A; }
    </style>
</head>
<body>
    <h2>Edit Data Kegiatan</h2>
    <form method="POST">
        <div class="form-group">
            <label>No:</label>
            <input type="text" name="id" value="<?php echo $data['id']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Kegiatan:</label>
            <input type="text" name="namakegiatan" value="<?php echo $data['namakegiatan']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu Kegiatan:</label>
            <textarea name="waktu" class="form-control" required><?php echo $data['waktu']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required><?php echo $data['deskripsi']; ?></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
