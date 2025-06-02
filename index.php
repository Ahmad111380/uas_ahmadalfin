<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portofolio Ahmad Alfin Naja</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <div><strong>Portofolio</strong></div>
    <nav>
      <a href="kegiatan/table.php">Kegiatan</a>
      <a href="#beranda">Beranda</a>
      <a href="#tentang">Tentang Saya</a>
      <a href="#portofolio">Portofolio</a>
      <div class="dropdown">
        <button class="dropbtn">Lainnya</button>
        <div class="dropdown-content">
          <a href="https://www.instagram.com/ahmadalfinnaja" target="_blank">Instagram</a>
          <a href="https://www.facebook.com/RakaiWarak" target="_blank">Facebook</a>
        </div>
      </div>
    </nav>
  </header>

  <div class="container" id="beranda">
    <div class="left-column">
      <div class="intro card">
        <img src="saya.jpg" alt="Foto Profil" />
        <div>
          <h1>Halo, Saya Ahmad Alfin Naja</h1>
          <p>Mahasiswa Teknik Informatika dan Desainer Grafis</p>
        </div>
      </div>

      <div class="card" id="tentang">
        <h2>Tentang Saya</h2>
        <p>
          Saya adalah mahasiswa aktif Program Studi Teknik Informatika di Universitas Nahdlatul Ulama Sunan Giri. Saya memiliki keahlian dalam desain grafis menggunakan CorelDraw dan SketchUp Pro. Selain itu, saya juga aktif dalam pengembangan media promosi serta pembuatan konten kreatif untuk media sosial.
          <br><br>
          Saya terbiasa bekerja secara mandiri maupun dalam tim, terbuka terhadap masukan, dan selalu mengikuti perkembangan tren desain terbaru. Saat ini saya juga sedang mengembangkan bisnis ads manager di Facebook untuk membantu menjual produk UMKM maupun industri.
        </p>
      </div>

      <div class="card" id="portofolio">
        <h2>Portofolio</h2>
        <?php
        include 'koneksi.php';
        $result = mysqli_query($koneksi, "SELECT * FROM tambahdata");
        $no = 1;
        ?>
        
        <h3>Tambah Kegiatan</h3>
        <form action="tambah.php" method="POST">
          <div class="form-group">
            <label>No:</label>
            <input type="text" name="id" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Nama Kegiatan:</label>
            <input type="text" name="namakegiatan" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Waktu Kegiatan:</label>
            <textarea name="waktu" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kegiatan</th>
              <th>Waktu Kegiatan</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['namakegiatan']); ?></td>
                <td><?php echo htmlspecialchars($row['waktu']); ?></td>
                <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                <td class="aksi">
                  <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                  <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="card">
        <h2>Hubungi Saya</h2>
        <form id="contactForm" method="POST" action="mailto:ahmadalfinnaja@gmail.com" enctype="text/plain">
          <label for="name">Nama:</label><br />
          <input type="text" id="name" name="name" required /><br /><br />

          <label for="email">Email:</label><br />
          <input type="email" id="email" name="email" required /><br /><br />

          <label for="message">Pesan:</label><br />
          <textarea id="message" name="message" rows="4" required></textarea><br /><br />

          <input type="submit" value="Kirim Pesan" />
        </form>
      </div>
    </div>

    <div class="right-column">
      <div class="card">
        <h2>Opini</h2>
        <div class="opini-grid">
          <div class="opini-item">Desain bukan soal keren, tapi soal fungsi dan makna.</div>
          <div class="opini-item">Setiap proyek adalah peluang untuk belajar hal baru.</div>
          <div class="opini-item">Konsistensi lebih penting daripada kesempurnaan.</div>
          <div class="opini-item">Desain yang baik harus bisa menyampaikan pesan dengan jelas.</div>
          <div class="opini-item">Berpikir kreatif dimulai dari keberanian mencoba.</div>
          <div class="opini-item">Kolaborasi membuka pintu ide yang lebih luas.</div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    &copy; 2025 Ahmad Alfin Naja
  </footer>

  <script>
    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault();
      alert("Pesan berhasil dikirim!");
    });
  </script>
</body>
</html>
